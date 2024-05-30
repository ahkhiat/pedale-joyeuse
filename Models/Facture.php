<?php

class Facture extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Facture();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_all_factures()
    {

        try {
            $requete = $this->bd->prepare('SELECT f.id, date, prix_ht, prix_ttc, c.nom AS client_nom, c.prenom AS client_prenom, 
                                           u.nom AS user_nom, u.prenom AS user_prenom
                                           FROM facture f
                                           JOIN clients c ON f.id_client = c.id
                                           JOIN user u ON f.id_user = u.id
                                           ORDER BY date DESC
                                           ');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_facture_show()
    {
        try {
            $requete = $this->bd->prepare('SELECT f.id, date, prix_ht, prix_ttc, 
                                           c.nom AS client_nom, 
                                           c.prenom AS client_prenom, 
                                           u.nom AS user_nom, 
                                           u.prenom AS user_prenom, 
                                           c.adresse1, c.adresse2, c.code_postal, 
                                           c.ville, c.email, c.telephone,
                                           prix_ttc - prix_ht AS total_tva
                                           FROM facture f
                                           JOIN clients c ON f.id_client = c.id
                                           JOIN user u ON f.id_user = u.id
                                           WHERE f.id = :fid
                                           ');
            
            $requete->execute(array(':fid'=>$_POST['fid']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_lignes_facture_show()
    {
        try {
            $requete = $this->bd->prepare('SELECT l.quantite, l.id_produit, l.id_facture,
                                            p.name, p.reference, p.price_ht,
                                            l.quantite * p.price_ht AS total_ht
                                           FROM ligne_facture l 
                                           JOIN produits p
                                           ON l.id_produit = p.id
                                           WHERE id_facture = :fid
                                           GROUP BY l.quantite, l.id_produit, l.id_facture, p.name, p.reference, p.price_ht;');

            $requete->execute(array(':fid'=>$_POST['fid']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function set_facture_add_request()
    {

        try {
            $requete = $this->bd->prepare('INSERT INTO facture (id, date, prix_ht, prix_ttc, id_client, id_user)
            VALUES (NULL, :dt, :pht, :pttc, :idc, :idp)
                                           ');
            $requete->execute(array(':dt' => $_POST['date'], ':pht' => $_POST['totalht'], ':pttc' => $_POST['totalttc'], 
            ':idc' => $_POST['client'], ':idp' => $_POST['user_id']));

            $facture_id = $this->bd->lastInsertId();

            foreach ($_POST['ligne'] as $ligne) {
                
                $requeteLigne = $this->bd->prepare('INSERT INTO ligne_facture (id_facture, id_produit, quantite)
                                                    VALUES (:id_facture, :id_produit, :quantite)');
                $requeteLigne->execute(array(
                    ':id_facture' => $facture_id,
                    ':id_produit' => $ligne['produit'],
                    ':quantite' => $ligne['quantite'],
                ));
            }
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    /* ----------------------------- Ventes du mois par VENDEUR ----------------------------- */
    public function get_ventes_mois()
    {

        try {
            $requete = $this->bd->prepare('SELECT f.id, date, prix_ht, prix_ttc, c.nom AS client_nom, c.prenom AS client_prenom,
                                           u.nom AS user_nom, u.prenom AS user_prenom
                                           FROM facture f
                                           JOIN clients c ON f.id_client = c.id
                                           JOIN user u ON f.id_user = u.id
                                           WHERE u.id = :pid
                                           AND f.date >= DATE_FORMAT(CURRENT_DATE(), "%Y-%m-01")
                                           ORDER BY date DESC
                                           ');
            $requete->execute(array(':pid' => $_SESSION['id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_ventes_mois_total()
    {

        try {
            $requete = $this->bd->prepare('SELECT SUM(prix_ht) AS total_ht, 
                                            SUM(prix_ttc) AS total_ttc 
                                           FROM facture f
                                           JOIN user u ON f.id_user = u.id
                                           WHERE u.id = :pid
                                           AND f.date >= DATE_FORMAT(CURRENT_DATE(), "%Y-%m-01")
                                           ORDER BY date DESC
                                           ');
            $requete->execute(array(':pid' => $_SESSION['id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_ventes_mois_nombre()
    {

        try {
            $requete = $this->bd->prepare('SELECT COUNT(*)
                                           FROM facture f
                                           JOIN user u ON f.id_user = u.id
                                           WHERE u.id = :pid
                                           AND f.date >= DATE_FORMAT(CURRENT_DATE(), "%Y-%m-01")
                                           ');
            $requete->execute(array(':pid' => $_SESSION['id']));
            $count = $requete->fetchColumn();
            return $count;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
    /* ------------------------------- Ventes YTD par VENDEUR------------------------------- */
    public function get_ventes_ytd_nombre()
    {

        try {
            $requete = $this->bd->prepare('SELECT COUNT(*)
                                            FROM facture f
                                            JOIN user u ON f.id_user = u.id
                                            WHERE u.id = :pid
                                            AND f.date >= CONCAT(YEAR(CURRENT_DATE()), "-01-01")
                                           ');
            $requete->execute(array(':pid' => $_SESSION['id']));
            $count = $requete->fetchColumn();
            return $count;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
    public function get_ventes_ytd()
    {

        try {
            $requete = $this->bd->prepare('SELECT f.id, date, prix_ht, prix_ttc, c.nom AS client_nom, c.prenom AS client_prenom,
                                           u.nom AS user_nom, u.prenom AS user_prenom
                                           FROM facture f
                                           JOIN clients c ON f.id_client = c.id
                                           JOIN user u ON f.id_user = u.id
                                           WHERE u.id = :pid
                                           AND f.date >= CONCAT(YEAR(CURRENT_DATE()), "-01-01")
                                           ORDER BY date DESC
                                           ');
            $requete->execute(array(':pid' => $_SESSION['id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_ventes_ytd_total()
    {

        try {
            $requete = $this->bd->prepare('SELECT SUM(prix_ht) AS total_ht, 
                                            SUM(prix_ttc) AS total_ttc 
                                           FROM facture f
                                           JOIN user u ON f.id_user = u.id
                                           WHERE u.id = :pid
                                           AND f.date >= CONCAT(YEAR(CURRENT_DATE()), "-01-01")
                                           ORDER BY date DESC
                                           ');
            $requete->execute(array(':pid' => $_SESSION['id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    

}

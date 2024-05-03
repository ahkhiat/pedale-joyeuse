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

    public function set_facture_add_request()
    {

        try {
            $requete = $this->bd->prepare('INSERT INTO facture (id, date, prix_ht, prix_ttc, id_client, id_user)
            VALUES (NULL, :dt, :pht, :pttc, :idc, :idp)
                                           ');
            $requete->execute(array(':dt' => $_POST['date'], ':pht' => $_POST['totalht'], ':pttc' => $_POST['totalttc'], 
            ':idc' => $_POST['client'], ':idp' => $_SESSION['id']));

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

    public function get_ventes_mois()
    {

        try {
            $requete = $this->bd->prepare('SELECT f.id, date, prix_ht, prix_ttc, c.nom AS client_nom, c.prenom AS client_prenom,
                                           u.nom AS user_nom, u.prenom AS user_prenom
                                           FROM facture f
                                           JOIN clients c ON f.id_client = c.id
                                           JOIN user u ON f.id_user = u.id
                                           WHERE u.id = :pid
                                           ORDER BY date DESC
                                           ');
            $requete->execute(array(':pid' => $_SESSION['id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    

}

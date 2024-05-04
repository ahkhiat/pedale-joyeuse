<?php

class Produit extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Produit();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_all_produits()
    {

        try {
            $requete = $this->bd->prepare('SELECT p.id, p.name, p.reference, p.price_ht, p.stock, p.alerte, t.taux,
                                            ROUND(p.price_ht * (1 + t.taux / 100), 2) AS price_ttc
                                           FROM produits p
                                           JOIN tva t ON p.id_tva = t.id');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_all_produits_json()
    {

        try {
            $requete = $this->bd->prepare('SELECT p.id, p.name, p.reference, p.price_ht, p.stock, p.alerte, t.taux 
                                           FROM produits p
                                           JOIN tva t ON p.id_tva = t.id');
            $requete->execute();

            $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
            $produits_json = json_encode($resultats);

            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $produits_json;
    }
    public function get_tva()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM tva');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function set_produit_add_request()
    {
        try {
            $requete = $this->bd->prepare('INSERT INTO produits (id, name, reference, price_ht, stock, alerte, id_tva) 
            VALUES(NULL, :nme, :ref, :pht, :sto, :alert, :itva)');
            $requete->execute(array(
                ':nme' => $_POST['name'],
                ':ref' => $_POST['reference'],
                ':pht' => $_POST['price_ht'],
                ':sto' => $_POST['stock'],
                ':alert' => $_POST['alerte'],
                ':itva' => $_POST['id_tva']
            ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }


}
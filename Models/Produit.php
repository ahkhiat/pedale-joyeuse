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
            $requete = $this->bd->prepare('SELECT * FROM produits');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_all_produits_json()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM produits');
            $requete->execute();

            $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
            $produits_json = json_encode($resultats);

            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $produits_json;
    }
}
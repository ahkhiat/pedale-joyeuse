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
            $requete = $this->bd->prepare('SELECT f.id, date, prix_ht, prix_ttc, c.nom AS client_nom, c.prenom AS client_prenom, p.nom AS personnel_nom
                                           FROM facture f
                                           JOIN clients c ON f.id_clients = c.id
                                           JOIN personnel p ON f.id_personnel = p.id
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
            $requete = $this->bd->prepare('INSERT INTO facture (id, date, prix_ht, prix_ttc, id_clients, id_personnel)
            VALUES (NULL, :dt, :pht, :pttc, :idc, :idp)
                                           ');
            $requete->execute(array(':dt' => $_POST['date'], ':pht' => $_POST['pht'], ':pttc' => $_POST['pttc'], 
            ':idc' => $_POST['client'], ':idp' => $_POST['personnel']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    

    

}
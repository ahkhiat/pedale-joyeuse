<?php

class Client extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Client();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_all_clients()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM clients');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function set_client_add()
    {
        try {
            $requete = $this->bd->prepare('INSERT INTO clients (id, nom, prenom, adresse1, adresse2, code_postal, ville, email, telephone) 
            VALUES(NULL, :nom, :prenom, :ad1, :ad2, :cp, :ville, :email, :tel)');
            $requete->execute(array(
                ':nom' => $_POST['nom'],
                ':prenom' => $_POST['prenom'],
                ':ad1' => $_POST['adresse1'],
                ':ad2' => $_POST['adresse2'],
                ':cp' => $_POST['code_postal'],
                ':ville' => $_POST['ville'],
                ':email' => $_POST['email'],
                ':tel' => $_POST['telephone']
            ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    

}

<?php

require_once(dirname(__FILE__) . '/../Utils/functions.php');

class Security extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Security();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

public function get_login()
{ 
    try { // email is formatted with validData (trim, stripslashes & htmlspecialchars)
        $email = validData($_POST['email']);
        // select the email if exists
        $requete = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
        $requete->execute(array(':email' => $email));
        // if the email exists
        if($requete->rowCount() > 0) {
            $user = $requete->fetch(PDO::FETCH_OBJ); // we store the result of SELECT in $user
            $password_hash = $user->pswd; // hashed password is stored in $password_hash
            $password = $_POST['password']; // unhashed password   
            if (password_verify($password, $password_hash)) {
                // php can compare hashed & unhashed pswd
                return $user;
            } else {
                // passwords don't match, so the pswd entered is incorrect
                echo "<script>alert('Mot de passe incorrect !');</script>";
                return false;
            }
        } else {
            // if the email doesn't exists
            echo "<script>alert('Adresse email non enregistrée. Veuillez vous inscrire !');</script>";
            return false;
        }
    } catch (PDOException $e) {
        // PDO errors management
        die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
    } 
}

public function get_user_registration_valid()
{   // data is formatted with validData (trim, stripslashes & htmlspecialchars )
    $email = validData($_POST['email']);
    $password = validData(password_hash($_POST['password'], PASSWORD_DEFAULT));
    $nom = validData($_POST['nom']);
    $prenom = validData($_POST['prenom']);
    try {
        // Check if email already exists in DB
        $requete_verification = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
        $requete_verification->execute(array(':email' => $email));
        
        if ($requete_verification->rowCount() > 0) {
            // email already exists
        echo "<script>alert('Cet email est déjà utilisé. Veuillez choisir un autre email.');</script>";
            return null; // Stop the process
        } else {
            // Email doesn't exists, we can create a user
            //'vendeur' is the default role
            $role = "vendeur";
            $requete_insertion = $this->bd->prepare('INSERT INTO user (id, email, roles, pswd, prenom, nom) 
                VALUES(NULL, :e, :rl, :pswd, :prenom, :nom)');
            $requete_insertion->execute(array(
                ':e' => $email,
                ':rl' => $role,
                ':pswd' => $password,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ));
            return $requete_insertion->fetchAll(PDO::FETCH_OBJ);
        }
    } catch (PDOException $e) {
        // PDO errors management
        die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
    }  
}



}
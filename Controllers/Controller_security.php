<?php

class Controller_security extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

// ......................connection.......................

    public function action_user_connection()
    {
        $this->render('user_connection');
    }

//...............login......................

    public function action_login()

    {
        $m=Security::get_model();

        $data = ['user'=>$m->get_login()];

        $this->render("login",$data);
        
    }

//.............................disconnection...............................

    public function action_disconnection()
    {
        $this->render('disconnection');
    }
// ...........make registration.............
    public function action_user_registration()
    {
        $this->render('user_registration');
    }

//.........................registration valid.............................

    public function action_user_registration_valid()
    {   
        if(isset($_POST['submit_registration']))
        {   // check if variables are not empty
            if (!empty($_POST['nom']) && 
                !empty($_POST['prenom']) && 
                !empty($_POST['email']) && 
                !empty($_POST['password']))
                {   // check password length 
                    if(strlen($_POST['password']) < 11) {
                        $message = " ";
                        echo "<script>alert('Votre mot de passe est trop court.');</script>";
                        }
                    $data=''; 
                    if(empty($message)) {
                    // Registration is OK. 
                        $email = $_POST['email'];
                        // php email format validation
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $message = 'L\'adresse e-mail n\'est pas valide.';
                            $this->action_error($message);
                        }
                        // password regex validation
                        $password = $_POST['password'];
                        if (!preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*[a-zA-Z]).{11,}$/', $password)) {
                            $message = 'Votre mot de passe doit contenir au moins une lettre majuscule, un caractère spécial et avoir une longueur d\'au moins 11 caractères.';
                            $this->action_error($message);
                        } // email & password are OK, we call the Model to register the user
                        $m = Security::get_model();
                        $data = ['identification'=>$m->get_user_registration_valid()];
                            if($data){
                                $email = $_POST['email'];
                                $data = ['user'=>$m->get_login()];
                            }
                    } else {
                    echo $message;
                    }
            } else {
                echo "<script>alert('Veuillez compléter tous les champs !');</script>";
            }
        }
        $this->render('login', $data);
    }

    
}
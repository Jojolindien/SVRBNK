<?php 
 header("Access-Control-Allow-Origin: *");
require "./controllers/back/Securite.class.php";
require "./models/back/admin.modelManager.php";

$login = '';
$password = '';

$data = json_decode(file_get_contents("php://input"));


class AdminController{

    private $adminManager;

    public function __construct(){
        $this->adminManager = new AdminManager;
    }

    public function getPageLogin() {
        require_once "views/login.view.php";
    }

    


    public function connexion() {
        
        if(!empty($data->login) && !empty($data->password)){
            $login=Securite::secureHTML($data->login);
            $password=Securite::secureHTML($data->password);
            if($this->adminManager->isConnexionValid($login,$password)){
                echo "pass word ok";
                // $_SESSION['access'] = "admin";
                // header('Location: '.URL."back/admin");
                // header('Location: http://localhost:3000/');

            } else {
                echo "pass word NON conforme";
                // header('Location: '.URL."back/login");
            }
        } else  {
            echo "aucun identifiant ou mot de passe";
            // header('Location: '.URL."back/login");
        }
    }

    public function getAccueilAdmin(){
        if(Securite::verifAccessSession()){
            require "views/accueilAdmin.view.php";
        }else header('Location: '.URL."back/login");
        
    }

    public function deconnexion() {
        session_destroy();
        header('Location: '.URL."back/login");
    }

}
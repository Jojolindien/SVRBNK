<?php 

session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/front/API.controller.php";
require_once "controllers/back/Admin.controller.php";
$apiController = new APIController;
$adminController= new AdminController;

try{
    if(empty($_GET['page'])){
        throw new Exception ("La page est inexistante : empty page");
    }else {
        $url= explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));
        // echo "<pre>";
        // print_r($url);
        // echo "<pre>";
        // echo "la page demandée est : ".$_GET['page'];
        if(empty($url[0]) || empty($url[1])) throw new Exception ("la page n'existe pas : il faut 2 /... : exemple /garcons/toto");
        switch ($url[0]){
            case "front" : 
                switch ($url[1]){
                    case "customers" : $apiController->getCustomers();
                    break;
                    case "customer" : 
                        if (empty($url[2])) throw new Exception ("page inexistante : il faut un id client : exemple /garcons/2");
                        $apiController->getCustomerById($url[2]);
                    break;
                    case "accounts" : $apiController->getAccounts();;
                    break;
                    case "loans" : $apiController->getLoans();;
                    break;
                    default : throw new Exception ("aucune page correpondante en front/... ?");
                }
            break;
            case "back" :  
                switch ($url[1]){
                    case "login" : $adminController->getPageLogin();
                    break;
                    case "connexion" : $adminController->connexion();
                    break;
                    case "admin" : $adminController->getAccueilAdmin();
                    break;
                    case "deconnexion" : $adminController->deconnexion();
                    break;

                    default : throw new Exception ("aucune page correpondante en back/... ?");
                }
            break;
            default : throw new Exception ("aucune page correpondante : front ou back obligatoire");

        }
    }   
}catch(Exception $e){
    $msg=$e->getMessage();
    echo $msg." => error catched";
}

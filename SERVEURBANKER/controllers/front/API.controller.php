<?php
// require = va chercher.
//NB on part toujours chercher depuis le fichier index
//once car va le chercher une seule fois.
require_once "models/API.modelManager.php";
require_once "models/Model.php";

class APIController {

    
    private $apiModelManager;

    // au moment de l'instanciation de APIController => j'instancie nécessairement le modele Manager
    public function __construct(){
        $this->apiModelManager = new APIModelManager();
    }

    //PARTIE SUR LES CUSTOMER ET CUSTOMERS____________________________________________________________________
    public function test () {
        echo "<div>test</div>";
    }

    public function getCustomers () {
        $customers = $this->apiModelManager->getDBCustomers();
        $tabResultat = $this->formatDataLignesCustomers($customers);
        Model::sendJSON($tabResultat);
        // echo "<pre>";
        // print_r($tabResultat);
        // echo "</pre>";
    }

    public function getCustomerById ($customerId) {
        $lignescustomer = $this->apiModelManager->getDBCustomerById($customerId);
        $tabResultat = $this->formatDataLignesCustomers($lignescustomer);
        Model::sendJSON($tabResultat);
        // echo "<pre>";
        // print_r($tabResultat);
        // echo "</pre>";
    }

    private function formatDataLignesCustomers($lignes){

        $tab = [];
        
        foreach($lignes as $ligne){
            if(!array_key_exists($ligne['customer_id'],$tab)){
                //on nomme l'indice comme on veut, ici avec la ligne customer_id
                $tab[$ligne['customer_id']] = 
                    [
                        "id" => $ligne['customer_id'],
                        "nom" => $ligne['customer_name'],
                        "prénom" => $ligne['customer_first_name'],
                        "notation" => $ligne['account_grade'],
                        "anciennetéClient" => $ligne['customer_seniority'],
                        "ageClient" => $ligne['customer_age'],
                        "adresse" => [
                            "idAdresse" => $ligne['addresse_id'],
                            "rue" => $ligne['addresse_street'],
                            "numéro" => $ligne['addresse_street_number'],
                            "ville" => $ligne['addresse_city'],
                            "codePostal" => $ligne['addresse_zip_code'],
                            "pays" => $ligne['addresse_country'],
                        ],
                        "budget" => [
                            "idBudget" => $ligne['budget_id'],
                            "salaire" => $ligne['budget_salary'],
                            "foncier" => $ligne['budget_property_income'],
                            "dividende" => $ligne['budget_dividend'],
                            "impot" => $ligne['budget_income_tax'],
                            "loyer" => $ligne['budget_rent'],
                        ],
                        "profession" => [
                            "idProfession" => $ligne['profession_id'],
                            "employer" => $ligne['profession_employer'],
                            "contrat" => $ligne['profession_contract'],
                            "anciennetéEmploi" => $ligne['profession_seniority'],
                        ]
                    ];   
            }
            $tab[$ligne['customer_id']]['compte'][] = [
                "idCompte" => $ligne['account_id'],
                "intitulé" => $ligne['account_title'],
            ];
            $tab[$ligne['customer_id']]['crédit_conso'][] = [
                "idCréditConso" => $ligne['consumer_loan_id'],
                "initialCréditConso" => $ligne['consumer_loan_initial'],
                "encoursCréditConso" => $ligne['consumer_loan_consumer_loan_outstanding'],
                "mensualitéCréditConso" => $ligne['consumer_loan_monthly'],
                "comptePayeurCréditConso" => $ligne['consumer_loan_account_id']	
            ];
            $tab[$ligne['customer_id']]['crédit_immo'][] = [
                "idCréditImmo" => $ligne['mortgage_id'],
                "initialCréditImmo" => $ligne['mortgage_initial'],
                "encoursCréditImmo" => $ligne['mortgage_outstanding'],
                "mensualitéCréditImmo" => $ligne['mortgage_monthly'],
                "comptePayeurCréditImmo" => $ligne['mortgage_account_id']	

            ];
        }

        return $tab;
    }


    //PARTIE SUR LES LOANS _____________________________________________________________________
    
    //traitement des données des crédits
    private function formatDataLignesLoans($lignes){

        $tab = [];
        
        foreach($lignes as $ligne){
            if(!array_key_exists($ligne['account_id'],$tab)){
                $tab[$ligne['account_id']] = [
                    "idCompte" => $ligne['account_id'],
                    "intitulé" => $ligne['account_title'],
                    // "ancienneté" => $ligne['account_seniority'],
                    // "notation" => $ligne['account_grade'],
                ];
            }
            $tab[$ligne['account_id']]['créditConso'][$ligne['consumer_loan_id']] = [
                "idCréditConso" => $ligne['consumer_loan_id'],
                "initialCréditConso" => $ligne['consumer_loan_initial'],
                "encoursCréditConso" => $ligne['consumer_loan_consumer_loan_outstanding'],
                "mensualitéCréditConso" => $ligne['consumer_loan_monthly'],
                "comptePayeurCréditConso" => $ligne['consumer_loan_account_id']
            ];
            $tab[$ligne['account_id']]['créditImmo'][$ligne['mortgage_id']] = [
                "idCréditImmo" => $ligne['mortgage_id'],
                "initialCréditImmo" => $ligne['mortgage_initial'],
                "encoursCréditConso" => $ligne['mortgage_outstanding'],
                "mensualitéCréditImmo" => $ligne['mortgage_monthly'],
                "comptePayeurCréditImmo" => $ligne['mortgage_account_id']
            ];
        }
        return $tab;
    }

    public function getLoans () {
        $loans= $this->apiModelManager->getDBLoans();
        $tabResultat = $this->formatDataLignesLoans($loans);
        Model::sendJSON($tabResultat);
            // echo "<pre>";
            // print_r($loans);
            // echo "</pre>";
    }

    public function getAccounts () {
        $accounts= $this->apiModelManager->getDBAccounts();
        Model::sendJSON($accounts);
        // echo "<pre>";
        // print_r($accounts);
        // echo "</pre>";
    }
}
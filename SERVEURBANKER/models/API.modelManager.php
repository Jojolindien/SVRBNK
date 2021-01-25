<?php  

require_once "models/Model.php";

class APIModelManager extends Model {
    public function getDBCustomers() {
        $req="SELECT * 
        from customer c 

        inner join addresse ad on ad.addresse_id=c.customer_addresse_id
        inner join profession p on p.profession_id=c.customer_profession_id
        inner join budget b on b.budget_id=c.customer_budget_id

        inner join account_customer a_c on a_c.customer_id=c.customer_id
        inner join account ac on ac.account_id=a_c.account_id
        
        left join consumer_loan cl on cl.consumer_loan_account_id=ac.account_id
        left join mortgage m on m.mortgage_account_id=ac.account_id
        ";
        $stmt= $this->getBdd()->prepare($req);
        $stmt->execute();
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $customers;
    }

    public function getDBCustomerById($customerId) {
        $req="SELECT * 
        from customer c 
        inner join account_customer a_c on a_c.customer_id=c.customer_id
        inner join account ac on ac.account_id=a_c.account_id

        inner join addresse ad on ad.addresse_id=c.customer_addresse_id
        inner join profession p on p.profession_id=c.customer_profession_id
        inner join budget b on b.budget_id=c.customer_budget_id
        
        left join consumer_loan cl on cl.consumer_loan_account_id=ac.account_id
        left join mortgage m on m.mortgage_account_id=ac.account_id
        
        WHERE c.customer_id= :idCustomer
        ";
        $stmt= $this->getBdd()->prepare($req);
        $stmt->bindValue(":idCustomer",$customerId,PDO::PARAM_INT);
        $stmt->execute();
        $lignescustomer = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $lignescustomer;
    }

    public function getDBLoans() {
        $req="SELECT * 
        from account ac 
        left join consumer_loan cl on cl.consumer_loan_account_id=ac.account_id
        left join mortgage m on m.mortgage_account_id=ac.account_id
        ";
        $stmt= $this->getBdd()->prepare($req);
        $stmt->execute();
        $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $accounts;
    }

    public function getDBAccounts() {
        $req="SELECT * 
        from account
        ";
        $stmt= $this->getBdd()->prepare($req);
        $stmt->execute();
        $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $accounts;
    }

}
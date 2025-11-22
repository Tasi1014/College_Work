<?php
 class Account {
    private $balance =0; //private can only be changed by class method

    public function deposit ($amount){
        if($amount>0){
            $this->balance+=$amount;
        }
    }

    public function getBalance(){
        return $this->balance; //public method to safely access private data
    }
 }

 $acc= new Account();$acc->deposit(500);
 
 echo "Current Balance: ".$acc->getBalance();
 ?>
<?php

class BankAccount {
    private $AccNo;
    private $Balance = 10000;

    public function getBalance() {
        return $this->Balance;
    } 

    public function setBalance($amt) {
        if($amt > 0){
            $this->Balance += $amt;
        }
    }
}

// Create object
$bank = new BankAccount();

// Get balance
echo "Balance: " . $bank->getBalance();

$bank->setBalance(50000);
echo "<br> Balance: " . $bank->getBalance();

?>

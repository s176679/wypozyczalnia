<?php

namespace Wypozyczalnia\TestBundle\Helper\Journal;

class Entry {
    private $company_name;
    private $start_date;
    private $purchase_price;
    private $quantity;
    private $end_date;
    private $selling_price;
    
    private $result;
    
    function __construct(array $row) {
        foreach($row as $key=>$val){
            $this->$key = $val;
        }
    }

    public function getCompanyName() {
        return $this->company_name;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getPurchasePrice() {
        return $this->purchase_price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

}

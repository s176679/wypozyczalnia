<?php

namespace Wypozyczalnia\TestBundle\Helper\Journal;

class Journal {
    
    static function getHistoryAsArray(){
        return array(
            array(
                'company_name' => 'Ziarno Prawdy',
                'start_date' => new \DateTime('2012-03-03 00:00:00'),
                'purchase_price' => 20.53,
                'quantity' => 15,
            ),
            array(
                'company_name' => 'Psy',
                'start_date' => new \DateTime('2013-01-13 00:00:00'),
                'purchase_price' => 7.30,
                'quantity' => 120,
            )
        );
    }
    
    static function getHistoryAsObjects(){
        $objArr = array();
        foreach(static::getHistoryAsArray() as $row){
            $objArr[] = new Entry($row);
        }
        
        return $objArr;
    }
    
}

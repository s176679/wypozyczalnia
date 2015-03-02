<?php

namespace Wypozyczalnia\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Wypozyczalnia\TestBundle\Helper\Journal\Journal;
/**
 * @Route("/wypozyczalnia")
 */
class WypozyczalniaController extends Controller {
    
    

    /**
    * @Route(
     *      "/",
     *      name="wypozyczalnia_glowna"
     * )
    *
    * @Template  
    */
    public function indexAction(){
        return array(
            'history' => Journal::getHistoryAsObjects()
            //'history' => array()
        );
    }

    /**
    * @Route("/panel-uzytkownika")
    * 
    * @Template
    */
    public function userAction(){
        return array();        
    }

    /**
    * @Route("/koszyk")
    * 
    * @Template
    */   
    public function shopAction(){
        return array();        
    }  
    /**
    * @Route("/recenzja")
    * 
    * @Template
    */ 
    public function opinionAction(){
        return array();        
    }

    /**
    * @Route(
     * "/kontakt",
     * name="wypozyczalnia_kontakt"
     * )
    * 
    * @Template
    */    
    public function contactAction(){
        return array();        
    }    
   }
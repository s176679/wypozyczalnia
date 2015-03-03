<?php

namespace Wypozyczalnia\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Wypozyczalnia\TestBundle\Helper\Journal\Journal;
use Wypozyczalnia\TestBundle\Helper\DataProvider;
//use Wypozyczalnia\TestBundle\Form\Type\RegisterType;
//use Wypozyczalnia\TestBundle\Entity\Register;

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
    * @Route(
     * "/recenzja",
     * name="wypozyczalnia_recenzje"
     * )
    * 
    * @Template
    */ 
    public function opinionAction(){
        return array(
            'comments' => DataProvider::getOpinion()
            
        );        
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
    
        /**
    * @Route(
     * "/rejestracja",
     * name="wypozyczalnia_rejestracja"
     * )
    * 
    * @Template
    */
    public function registerAction(Request $Request){
        
       $form = $this->createFormBuilder()
                ->add('name', 'text',array(
                    'label'=>'Imię i nazwisko'
                ))
                ->add('email', 'email',array(
                    'label'=>'Adres E-Mail'
                ))
                ->add('plec', 'choice', array(
                    'label'=> 'Płeć',
                    'choices' => array(
                        'M' => 'Mężczyzna',
                        'F' => 'Kobieta'
                    ),
                    'expanded' => true 
                ))
                ->add('birthday', 'birthday', array(
                    'label'=>'Data urodzenia',
                    'empty_value' => '--',
                    'empty_data' => NULL
                ))
                ->add('country', 'country',array(
                    'empty_value' => "Poland"
                ))
                ->add('save','submit')
                ->getForm();
        
       
       $form->handleRequest($Request);
       
       if($form->isValid()){
           $formData = $form->getData();
       }
       
        return array(
            'form' => $form->createView()
        );        
    }
    
   }
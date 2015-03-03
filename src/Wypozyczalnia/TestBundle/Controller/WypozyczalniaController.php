<?php

namespace Wypozyczalnia\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Wypozyczalnia\TestBundle\Helper\Journal\Journal;
use Wypozyczalnia\TestBundle\Helper\DataProvider;
use Wypozyczalnia\TestBundle\Entity\Register;
use Wypozyczalnia\TestBundle\Form\Type\RegisterType;

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
        

      $Register = new Register();

        $Session = $this->get('session');
        
        if(!$Session->has('registered')){
        
            $form = $this->createForm(new RegisterType(), $Register);

            $form->handleRequest($Request);

            if($Request->isMethod('POST')){
                if($form->isValid()){

                    
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($Register);
                    $em->flush();

                    $msgBody = $this->renderView('WypozyczalniaTestBundle:Email:base.html.twig', array(
                        'name' => $Register->getName()
                    ));

                    $message = \Swift_Message::newInstance()
                                        ->setSubject('Potwierdzenie rejestracji')
                                        ->setFrom(array('d.pawlikpkr@gmail.com' => 'Wypozyczalia'))
                                        ->setTo(array($Register->getEmail() => $Register->getName()))
                                        ->setBody($msgBody, 'text/html');

                    $this->get('mailer')->send($message);

                    $Session->getFlashBag()->add('success', 'Twoje zgłoszenie zostało zapisane!');
                   // $this->get('edu_notification')->addSuccess('Twoje zgłoszenie zostało zapisane!');
                    //$Session->set('registered', true);

                  //  return $this->redirect($this->generateUrl('wypozyczalnia_rejestracja'));
                }else{
                    $Session->getFlashBag()->add('danger', 'Popraw błędy formularza.');
                   // $this->get('edu_notification')->addError('Popraw błędy formularza.');
                }
            }
        }
        
        
        return array(
            'form' => isset($form) ? $form->createView() : NULL,
        );
    
    }
    
    
    
    
   }
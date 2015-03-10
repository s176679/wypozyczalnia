<?php

namespace Wypozyczalnia\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Wypozyczalnia\TestBundle\Helper\Journal\Journal;
use Wypozyczalnia\TestBundle\Helper\DataProvider;
use Wypozyczalnia\TestBundle\Entity\Register;
use Wypozyczalnia\TestBundle\Entity\Opinions;
use Wypozyczalnia\TestBundle\Entity\Films;
use Wypozyczalnia\TestBundle\Form\Type\RegisterType;



use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * @Route("/")
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
        
        $Repozytorium = $this->getDoctrine()->getRepository('WypozyczalniaTestBundle:Films');
        $rows = $Repozytorium->findAll();
        return array(
            'rows' => $rows
        );
    }
    
    /**
    * @Route(
     *      "/komentarz/{id}",
     *      name="wypozyczalnia_komentarz"
     * )
    *
    * @Template  
    */
    public function opinionsAction($id, Request $Request){
        
        $form = $this->createFormBuilder()
                ->add('opinion', 'textarea')
                ->add('name', 'text')
                ->add('zatwierdz', 'submit')
                ->getForm();
        
        $Session = $this->get('session');
        
        $Opinions = new Opinions();               
        
        if($Request->isMethod('POST')) {
            
            $form->handleRequest($Request);
            $formData = $form->get('opinion')->getData();
            $formData2 = $form->get('name')->getData();
            $Opinions->setName($formData)
                ->setOpinion($formData2);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Opinions);
            $em->flush();
        }
        
        return array(
            'id' => $id,
            'form' => $form->createView()
        );
    }

    /**
    * @Route(
     *      "/filmy/{id}",
     *      name="wypozyczalnia_film_details"
     * )
    *
    * @Template  
    */    
    public function detailsAction($id){
        
        $Repozytorium = $this->getDoctrine()->getRepository('WypozyczalniaTestBundle:Films');
        $Register = $Repozytorium->find($id);
        
        if(NULL== $Register){
            throw $this->createNotFoundException('UPS... Nie znaleziono filmu');
        }else{
       
        return array(
            'register' => $Register
        );
        }
    }
    /**
    * @Route(
    * "/panel-uzytkownika",
    * name="wypozyczalnia_panel_uzytkownika"
    * )
    * @Template
    */
    public function userAction(){
//       
//        $Register = new Register();
//        $session = $this->getRequest()->getSession();
//                  // $em = $this->getDoctrine()->getManager();
//                    //$em->persist($Register);
//        $em = $this->getDoctrine()->getEntityManager();
//        $repository = $em->getRepository('WypozyczalniaTestBundle:Register');
//     //   $repository = new Register();
//        if ($request->getMethod() == 'POST') {
//            $session->clear();
//            $username = $request->get('name');
//            $password = $request->get('password');
//            $remember = $request->get('remember');
//            $user = $repository->findOneBy(array('name' => $username, 'password' => $password));
//           // return $this->render('WypozyczalniaTestBundle:Wypozyczalnia:user.html.twig', array('name' => $username->));
//            if ($user) {
//                if ($remember == 'remember-me') {
//                    $login = new Register();
//                    $login->setName($name);
//                    $login->setPassword($password);
//                    $session->set('login', $login);
//                }
//                return $this->render('WypozyczalniaTestBundle:Wypozyczalnia:user.html.twig', array('name' => $user->getName()));
//            } else {
//                return $this->render('WypozyczalniaTestBundle:Wypozyczalnia:user.html.twig', array('name' => 'Niepoprawny Login'));
//            }
//        } else {
//            if ($session->has('login')) {
//                $login = $session->get('login');
//                $username = $login->getName();
//                $password = $login->getPassword();
//                $user = $repository->findOneBy(array('name' => $username, 'password' => $password));
//                if ($user) {
//                    // cialo tego co user zobaczy u nas to beda jego zamowienia
////                    $page = $request->get('page');
////                    $count_per_page = 50;
////                    $total_count = $this->getTotalCountries();
////                    $total_pages=ceil($total_count/$count_per_page);
////
////                    if(!is_numeric($page)){
////                        $page=1;
////                    }
////                    else{
////                        $page=floor($page);
////                    }
////                    if($total_count<=$count_per_page){
////                        $page=1;
////                    }
////                    if(($page*$count_per_page)>$total_count){
////                        $page=$total_pages;
////                    }
////                    $offset=0;
////                    if($page>1){
////                        $offset = $count_per_page * ($page-1);
////                    }
////                     $em = $this->getDoctrine()->getEntityManager();
////                    $ctryQuery = $em->createQueryBuilder()
////                            ->select('c')
////                            ->from('LoginLoginBundle:Country', 'c')
////                            ->setFirstResult($offset)
////                            ->setMaxResults($count_per_page);
////                    $ctryFinalQuery = $ctryQuery->getQuery();
////
////                    $countries = $ctryFinalQuery->getArrayResult();
////                    return $this->render('LoginLoginBundle:Default:welcome.html.twig', array('name' => $user->getFirstName(),'countries'=>$countries,'total_pages'=>$total_pages,'current_page'=> $page));
//                }
//            }
//            return $this->render('WypozyczalniaTestBundle:Wypozyczalnia:user.html.twig');
//        }
        
        
$username = 'name';
$password = 'password';
$em = $this->getDoctrine()->getEntityManager();
$repository = $em->getRepository('WypozyczalniaTestBundle:Register');
$user = $repository->findOneBy(array('name' => $username, 'password' => $password));
            if ($user) {
                return $this->render('WypozyczalniaTestBundle:Wypozyczalnia:user.html.twig', array('name' => $user->getName()));
            } else {
                return $this->render('WypozyczalniaTestBundle:Wypozyczalnia:user.html.twig', array('name' => 'Niepoprawny Login'));
            }
       
        
        
        
    }
        
        
        


// return array();        
  
    /**
    * @Route("/panel-logowania")
    * 
    * @Template
    */   
    public function logpanelAction(){
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

                    $Session->getFlashBag()->add('success', 'Twoje konto zostało stworzone, możesz się zalgować');
                   // $this->get('edu_notification')->addSuccess('Twoje zgłoszenie zostało zapisane!');
                    $Session->set('registered', true);

                    return $this->redirect($this->generateUrl('wypozyczalnia_rejestracja'));
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
        
    /**
     * @Route("/Login", name="wypozyczalnia_login")
     * @Template
     * User log up - Open to public
     * Authenticates users to the system
     */
    public function loginAction()
    {
        return $this->render('wypozyczalniaTestBundle:Wypozyczalnia:login.html.twig');
    }

    }
    
    
    

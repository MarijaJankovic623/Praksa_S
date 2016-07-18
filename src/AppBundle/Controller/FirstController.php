<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Podsetnik;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FirstController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('notifikator/index.html.twig');
    }


    /**
     * @Route("/registration", name="registration")
     */
    public function registrationAction()
    {
        return $this->render('notifikator/registration.html.twig');
    }


    /**
     * @Route("/Login", name="login")
     */
    public function loginAction(Request $request)
    {
        
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'notifikator/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error' => $error
            )
        );
    }

    /**
     * @Route("/reminders", name="reminders")
     */
    public function remindersAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $korisnik = $this->getUser();

        $podsetnici = $this->getDoctrine()->getRepository('AppBundle:Podsetnik')->findByidKorisnik($korisnik);

        return $this->render('notifikator/reminders.html.twig',
            array(
                'podsetnici' => $podsetnici
            ));
    }


    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id)
    {

        $podsetnik = $this->getDoctrine()->getRepository('AppBundle:Podsetnik')->findOneByidPodsetnik($id);

        if($this->getUser()->getIdKorisnik() == $podsetnik->getIdKorisnik()->getIdKorisnik()){

            $em = $this->getDoctrine()->getManager();
            $em->remove($podsetnik);
            $em->flush();

        }

        return $this->redirectToRoute('reminders',Array(), 301);
    }


    /**
     * @Route("add", name="add")
     */
    public function addAction()
    {
        return $this->render('notifikator/addreminder.html.twig');
        
        
    }

    /**
     * @Route("makeNew", name="makeNew")
     */
        
    public function makeNewAction(Request $request)
    {

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $korisnik = $this->getUser();

        $podsetnik = new Podsetnik();
        $podsetnik->setNaziv($request->request->get('naziv'));
        $podsetnik->setIdKorisnik($korisnik);

        $podsetnik->setOpis($request->request->get("opis"));

        $podsetnik->setVreme($request->request->get("sati").":".$request->request->get("minuti"));

        $days = $request->request->get('day');


        foreach ($days as $dayId => $day)
            if($day) $podsetnik->setDay($dayId);



        $em = $this->getDoctrine()->getManager();
        $em->persist($podsetnik);
        $em->flush();

        return $this->redirectToRoute('reminders',Array(), 301);
    }

}

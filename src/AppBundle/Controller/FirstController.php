<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Podsetnik;
use AppBundle\Entity\Reminder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\User;


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
     * @Route("registration", name="registration")
     */
    public function registrationAction(Request $request)
    {

        $user = new \AppBundle\Entity\User();

        $form = $this->createFormBuilder($user)
            ->setAction($this->generateUrl('registration'))
            ->add('username')
            ->add('password')
            ->add('email')
            ->add('register', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);

            $password = $user->getPassword();
            $password = $encoder->encodePassword($password, $user->getSalt());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('notifikator/registration.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/Login", name="login")
     */
    public function loginAction(Request $request)
    {

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        if ($error)
            var_dump($error->getMessage());

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


        $podsetnici =  $korisnik->getReminders();

        return $this->render('notifikator/reminders.html.twig',
            array(
                'reminders' => $podsetnici
            ));
    }


    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id)
    {
        $podsetnik = $this->getDoctrine()->getRepository('AppBundle:Reminder')->findOneByid($id);
        if ($podsetnik) {
            if ($this->getUser()->getId() == $podsetnik->getUser()->getId()) {

                $em = $this->getDoctrine()->getManager();

                $em->remove($podsetnik);
                $em->flush();

            }
        }

        return $this->redirectToRoute('reminders', Array(), 301);
    }
    

    /**
     * @Route("addreminder", name="addreminder")
     */
    public function addReminderAction(Request $request)
    {

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }


        $reminder = new Reminder();

        $form = $this->createFormBuilder($reminder,array('required'=> false))
            ->setAction($this->generateUrl('addreminder'))
            ->add('name')
            ->add('description')
            ->add('hours',NumberType::class)
            ->add('minutes',NumberType::class)
            ->add('mon',CheckboxType::class)
            ->add('tue',CheckboxType::class)
            ->add('wed',CheckboxType::class)
            ->add('thu',CheckboxType::class)
            ->add('fri',CheckboxType::class)
            ->add('sat',CheckboxType::class)
            ->add('sun',CheckboxType::class)
            ->add('add', SubmitType::class)
            ->getForm();


        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $reminder->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($reminder);
            $em->flush();

            return $this->redirectToRoute('reminders', Array(), 301);
        }

        return $this->render('notifikator/addreminder.html.twig', array(
            'form' => $form->createView(),
        ));


    }
}

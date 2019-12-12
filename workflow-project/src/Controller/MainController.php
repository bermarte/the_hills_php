<?php

namespace App\Controller;

use App\Form\SaveUserNameType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MainController extends AbstractController
{
    /**
     * @Route("/index", name="main")
     */
    public function index()
    {



        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
   //other routes

    /**
     * @Route("/user_name", name="user_name")
     */
    public function write_name(Request $request, UserPasswordEncoderInterface $passwordEncoder){

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $current_user = $this->getDoctrine()->getRepository(User::class)
            ->findOneBy(['id' => $user->getId()]);
        //pass email in the form
        /*
        $current_user->getEmail();
        $current_user->setName("aldo");
        */

        $form = $this->createForm(SaveUserNameType::class, $current_user, [
            'action' => $this->generateUrl('user_name')

        ]);
        //handle request
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            //var_dump($current_user); die();
            //save new password
            $current_user->setPassword(
                $passwordEncoder->encodePassword(
                    $current_user,
                    $form->get('plainPassword')->getData()
                )
            );

            //saving to db

            $en = $this->getDoctrine()->getManager();
            $en->persist($user);
            $en->flush();

            $this->get('session')->getFlashBag()->add('notice', array('type' => 'success', 'title' => 'Success!', 'message' => 'user data updated'));
            return $this->redirectToRoute("main");
        }


        return $this->render('form-data/form-data.html.twig', [
            'form_user_name' => $form->createView()
        ]);
    }
}

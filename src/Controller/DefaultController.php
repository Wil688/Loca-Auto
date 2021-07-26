<?php

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
        /**
        * @Route("/home", name="home")
        */
        public function index(): Response
        {
            return $this->render('home.html.twig');
        }

        /**
        * @Route("/admin", name="admin")
        */
        public function admin()
        {
            $users = $this->getDoctrine()->getRepository(User::class)->findBy(
                [],
                //['lastUpdateDate' => 'DESC']
            );
        
            $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        
            return $this->render('default/admin.html.twig', [
                //'car' => $car,
                'users' => $users
            ]);

            $this->denyAccessUnlessGranted('ROLE_ADMIN');

        }
        
}

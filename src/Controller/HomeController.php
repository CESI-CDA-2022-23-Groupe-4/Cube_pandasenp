<?php

namespace App\Controller;

use App\Constants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'error' => null,
            'navbar_routes' => Constants::navbar_routes,
            'page_title' => 'Home',
            'controller_name' => 'HomeController',
        ]);
    }
}

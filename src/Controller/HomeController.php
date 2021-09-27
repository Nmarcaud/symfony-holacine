<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Doctrine\Orm\EntityManagerConfig\EntityListenersConfig;

class HomeController extends AbstractController
{

    private EntityManagerInterface $em;

	public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $films = $this->em->getRepository(Film::class)->findAll();

        return $this->render('home/index.html.twig', [
            'films' => $films
        ]);
    }
}

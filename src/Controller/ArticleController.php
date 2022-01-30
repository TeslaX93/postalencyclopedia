<?php

namespace App\Controller;

use App\Services\TerritoryService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private TerritoryService $territoryService;

    public function __construct(TerritoryService $territoryService) {
        $this->territoryService = $territoryService;
    }

    /**
     * @Route("/{_locale}/country/{slug}", name="article", requirements={"_locale": "%app.supported_locales%"})
     * @param string $slug
     * @return Response
     */
    public function index(string $slug): Response
    {
        dd($this->territoryService->getCountryInfos('pl'));
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Territory;
use App\Repository\TerritoryRepository;
use App\Services\TerritoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomepageController extends AbstractController
{

    private TerritoryService $territoryService;

    private TranslatorInterface $translator;

    public function __construct(TerritoryService $territoryService, TranslatorInterface $translator)
    {
        $this->territoryService = $territoryService;
        $this->translator = $translator;
    }

    /**
     * @Route("/", name="unlocalised_homepage")
     * @param      Request $request
     * @return     Response
     */
    public function index(Request $request): Response
    {
        if ($this->getUser()) {
            $locale = $this->getUser()->getLocale();
        } else {
            $locale = $request->getLocale();
        }

        $acceptedLocale = explode("|", $this->getParameter('app.supported_locales'));

        if (in_array($locale, $acceptedLocale)) {
            return $this->redirectToRoute('homepage', ['_locale' => $locale]);
        } else {
            return $this->redirectToRoute('homepage', ['_locale' => 'en']);
        }
    }

    /**
     * @Route("/{_locale}/home", name="homepage", requirements={"_locale": "%app.supported_locales%"})
     * @param                    Request $request
     * @return                   Response
     */
    public function homepage(Request $request): Response
    {
        $countries = $this->territoryService->getTerritories();

        return $this->render(
            'homepage/index.html.twig', [
            'territories' => $countries,
            ]
        );
    }

    public function search(): Response
    {
        $results = [];

        return $this->render(
            'homepage/search.html.twig', [
            'results' => $results
            ]
        );
    }
}

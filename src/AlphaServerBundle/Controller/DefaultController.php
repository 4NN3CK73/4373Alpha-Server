<?php

namespace AlphaServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $gameEngine = $this->get('alpha_server.game_engine');
        $nextTurn = $gameEngine->nextTurn();

        return $this->render('AlphaServerBundle:Default:index.html.twig', ['name' => $nextTurn]);
    }
}

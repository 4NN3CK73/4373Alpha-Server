<?php

namespace Anneck\Game\AlphaServerBundle\Controller;

use Anneck\Game\Action\ScoreOnePoint;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * The DefaultController.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @param $name
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        $this->get('alphaserver.testgame')->addAction(new ScoreOnePoint());

        $this->get('alphaserver.testgame')->run();

        return $this->render('AnneckGameAlphaServerBundle:Default:index.html.twig', ['name' => $name]);
    }
}

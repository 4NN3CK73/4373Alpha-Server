<?php

namespace Anneck\Game\AlphaServerBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * The TestGameController.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGameController extends FOSRestController
{
    /**
     * @View()
     */
    public function indexAction()
    {
        $runResult = $this->get('alphaserver.testgame')->run();

        return $runResult;
    }
    /**
     * @View()
     */
    public function runAction()
    {

        $runResult = $this->get('alphaserver.testgame')->run();

        if($runResult) {
            return $this->get('alphaserver.testgame')->getGameResult();
        }
        return $runResult;
    }
}

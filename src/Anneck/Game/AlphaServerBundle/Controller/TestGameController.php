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
    const ALPHASERVER_TESTGAME = 'alphaserver.testgame';

    /**
     * @View()
     */
    public function indexAction()
    {
        $runResult = $this->get(self::ALPHASERVER_TESTGAME)->run();

        return $runResult;
    }
    /**
     * @View()
     */
    public function runAction()
    {
        $runResult = $this->get(self::ALPHASERVER_TESTGAME)->run();

        if ($runResult) {
            return $this->get(self::ALPHASERVER_TESTGAME)->getGameResult();
        }

        return $runResult;
    }
}

<?php

namespace Anneck\Game\AlphaServerBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * The TestGameController.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGameController extends Controller
{
    const ALPHASERVER_TESTGAME = 'alphaserver.testgame';

    /**
     * @View()
     */
    public function indexAction()
    {
        $runResult = $this->get(static::ALPHASERVER_TESTGAME)->run();

        return ['Result' => $runResult];
    }
    /**
     * @View()
     */
    public function runAction()
    {
        $runResult = $this->get(static::ALPHASERVER_TESTGAME)->run();

        if ($runResult) {
            $gameResult = $this->get(static::ALPHASERVER_TESTGAME)->getGameResult();
        }

        return ['Result' => $gameResult];
    }
}

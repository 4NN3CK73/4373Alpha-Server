<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 12:56 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Features\ActionRegisterFeatureTrait;
use Anneck\Game\Features\CreditsFeatureInterface;
use Anneck\Game\Features\CreditsFeatureTrait;
use Anneck\Game\Features\ItemRegisterFeatureTrait;
use Anneck\Game\Features\PlayerItemRegisterFeatureInterface;
use Anneck\Game\Features\PlayerItemRegisterFeatureTrait;
use Anneck\Game\Features\SingleScoreFeatureInterface;
use Anneck\Game\Features\SingleScoreFeatureTrait;
use Anneck\Game\Features\TurnBasedFeatureInterface;
use Anneck\Game\Features\TurnBasedFeatureTrait;
use Anneck\Game\Register\Register;

/**
 * The TestGame is as of now just a developer playground.
 * It uses various xyzFeatureTraits to implements game feature interfaces.
 *
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGame extends AbstractGame implements GameInterface, TurnBasedFeatureInterface, PlayerItemRegisterFeatureInterface, SingleScoreFeatureInterface, CreditsFeatureInterface
{
    /*
     * Implementing ActionRegisterFeatureInterface
     */
    use ActionRegisterFeatureTrait;

    /*
     * Implementing CreditsFeatureInterface
     */
    use CreditsFeatureTrait;

    /*
     * Implementing ItemRegisterFeatureInterface
     */
    use ItemRegisterFeatureTrait;

    /*
     * Implementing SingleScoreFeatureInterface
     */
    use SingleScoreFeatureTrait;

    /*
     * Implementing TurnBasedFeatureInterface
     */
    use TurnBasedFeatureTrait;

    /*
     * Implementing PlayerItemRegisterFeatureInterface
     */
    use PlayerItemRegisterFeatureTrait;

    /**
     * Creates the TestGame.
     */
    public function __construct()
    {
        $this->logger = new GameLogger();
        $this->register = new Register();
        $this->logger->addInfo(
            'Created TestGame'
        );
    }

    /**
     * Safes the game.
     *
     * @return bool true|false
     */
    public function safe()
    {
        $this->logger->addInfo(
            'safe('.$this->safeGame.')'
        );
        // TODO: Implement safe() method.
        return true;
    }
}

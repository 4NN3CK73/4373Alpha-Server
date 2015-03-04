<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 03.03.15, 13:36 by 4nn3ck
 * ************************************************************************
 */

namespace AlphaServerBundle\Services;

use Anneck\Game\Configuration\ConfigurationFactory;
use Anneck\Game\GameActionQueue;
use Anneck\Game\Meta\Action\Item\DefaultItemAction;
use Anneck\Game\Worlds\GameWorld;
use Monolog\Logger;

class GameEngine
{
    private $mailer, $logger;

    public function __construct(\Swift_Mailer $mailer, Logger $logger)
    {
        $this->logger = $logger;
        $this->mailer = $mailer;
    }

    public function nextTurn()
    {
        $this->logger->addNotice('Called nextTurn()');

        $this->run();

        return 'GameEngine';
    }

    /**
     * @todo: implement this method ..
     */
    private function run()
    {
        $this->logger->addInfo('Run() started!');
        // Get the game world (and lock it? )
        $this->logger->addInfo('Get the GameWorld ...');
        $gameWorld = new GameWorld();
        $gameWorld = $gameWorld->configure(ConfigurationFactory::getInstance('DefaultWorld'));
        // Get the players action queue
        $this->logger->addInfo('Get the player action queue ...');
        $actionQ = new GameActionQueue();
        $actionQ->addAction(new DefaultItemAction('Hallo!'));
        // Run all player actions on the game world ->
        $this->logger->addInfo('Running all actions on game world ... ');
        // ... this will mutate the game world ...
        $gameWorld = $gameWorld->change($actionQ);
        // Write a safeGame e.g. safe the game-world-state
        $this->logger->addInfo('Safe the game world state ... ');

        // ... and release the 'lock' on the game world ... hmm.. do we need to lock it at all?
        $this->logger->addInfo('Run() finished!');
    }
}

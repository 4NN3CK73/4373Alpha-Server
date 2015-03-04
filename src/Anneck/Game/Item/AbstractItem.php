<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 12:44 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game\Item;


use Anneck\Game\Action\ItemActionInterface;
use Anneck\Game\GameInterface;
use Anneck\Game\GameLogger;

abstract class AbstractItem implements ItemInterface {

    private $game;
    private $name;
    private $logger;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    protected function getGame()
    {
        return $this->game;
    }

    public function __construct(GameInterface $game)
    {
        $this->game = $game;
        $this->logger = new GameLogger();
    }

    public function applyAction(ItemActionInterface $action)
    {
        if($this->getAvailableActions()->contains($action)) {
            $this->logger->addInfo('ApplyAction ' . $action . ' on ' . $this);
            $action->applyOn($this->getGame());
        }

    }

    public function __toString()
    {
        return $this->getName();
    }
}
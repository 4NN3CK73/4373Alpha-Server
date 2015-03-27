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

use Anneck\Game\ActionInterface;
use Anneck\Game\Exception\GameException;
use Anneck\Game\Exception\GameFeatureMissingException;
use Anneck\Game\Features\ItemRegisterFeature;
use Anneck\Game\GameInterface;
use Anneck\Game\GameLogger;
use Anneck\Game\ItemInterface;
use Doctrine\Common\Collections\Collection;

/**
 * The AbstractItem.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
abstract class AbstractItem implements ItemInterface
{
    /**
     * @var GameInterface
     */
    private $game;

    /**
     * @var string
     */
    private $name;

    /**
     * @var GameLogger
     */
    private $logger;

    /**
     * @param GameInterface $game
     */
    public function __construct($itemName, GameInterface $game = null)
    {
        $this->name = $itemName;
        $this->game = $game;
        $this->logger = new GameLogger();
    }

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
    public function getUses()
    {
        if (!$this->game instanceof ItemRegisterFeature) {
            throw new GameFeatureMissingException(
                'Get uses of Item', 'ItemRegisterFeature', $this->game
            );
        }

        return $this->game->getItemData($this)->get('Uses');
    }

    /**
     * @param ActionInterface $action
     *
     * @return bool|void
     *
     * @throws GameException
     */
    public function applyAction(ActionInterface $action)
    {
        if (is_null($this->getGame())) {
            throw new GameException('Game can not be null!');
        }

        if ($this->isActionAvailable($action)) {
            $this->logger->addInfo('ApplyAction '.$action.' on '.$this);
            $action->applyOn($this->getGame());
        } else {
            $this->logger->addWarning('Action: '.$action.' is not one of '.
                implode(
                    ', ',
                    $this->getAvailableActions()->toArray()
                )
            );
        }
    }

    /**
     * Returns the meta data of the item.
     *
     * @return Collection
     *
     * @throws GameFeatureMissingException
     */
    public function getMetaData()
    {
        if (!$this->game instanceof ItemRegisterFeature) {
            throw new GameFeatureMissingException(
                'GetMetaData from Item', 'ItemRegisterFeature', $this->game
            );
        }

        return $this->game->getItemData($this);
    }

    /**
     * @return mixed
     */
    protected function getGame()
    {
        return $this->game;
    }

    /**
     * @param ActionInterface $action
     *
     * @return bool
     */
    private function isActionAvailable(ActionInterface $action)
    {
        $actionIter = $this->getAvailableActions()->getIterator();
        foreach ($actionIter as $availAction) {
            if ($action->equals($availAction)) {
                return true;
            }
        }

        return false;
    }

    /**
     * One default toString implementation ...
     *
     * @return string the shortName of the class.
     */
    public function __toString()
    {
        $reClass = new \ReflectionClass($this);

        return $reClass->getShortName();
    }
}

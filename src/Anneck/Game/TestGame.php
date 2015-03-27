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

use Anneck\Game\Features\CreditsFeature;
use Anneck\Game\Features\PlayerItemRegisterFeature;
use Anneck\Game\Features\SingleScoreFeature;
use Anneck\Game\Features\TurnBasedFeature;
use Anneck\Game\Player\Player;
use Anneck\Game\Register\Register;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * The TestGame is as of now just a developer playground.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGame implements GameInterface, TurnBasedFeature, PlayerItemRegisterFeature, SingleScoreFeature, CreditsFeature
{
    /**
     * @var WorldInterface
     */
    private $world;
    /**
     * @var Register
     */
    private $register;
    /**
     * @var
     */
    private $safeGame;
    /**
     * @var int
     */
    private $score  = 0;
    /**
     * @var float
     */
    private $credits = 500.00;
    /**
     * @var int
     */
    private $turn   = 0;
    /**
     * @var GameLogger
     */
    private $logger;
    /**
     * @var Player
     */
    private $player;

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
     * @return WorldInterface
     */
    public function getWorld()
    {
        $this->logger->addInfo('getWorld_'.$this->world);

        return $this->world;
    }

    /**
     * @param WorldInterface $world
     */
    public function setWorld(WorldInterface $world)
    {
        $this->logger->addInfo('setWorld: '.$world);
        $this->world = $world;
    }

    /**
     * @param RegisterInterface $register
     *
     * @return mixed|void
     */
    public function setRegister(RegisterInterface $register)
    {
        $this->logger->addInfo('setRegister: '.$register);
        $this->register = $register;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        $this->logger->addInfo('getScore: '.$this->score);

        return $this->score;
    }

    /**
     * @param $points
     *
     * @return int
     */
    public function addScore($points)
    {
        $this->logger->addInfo('addScore: '.$this->score);
        $this->score += $points;

        return $this->score;
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed|void
     */
    public function addItemToRegister(ItemInterface $gameItem)
    {
        $this->logger->addInfo('addItemToRegister: '.$gameItem);
        $this->register->registerItem($gameItem);
    }

    /**
     * Adds a game action to the game.
     *
     * @param ActionInterface $gameAction
     * @param                 $maxUses
     * @param                 $coolDown
     *
     * @return mixed
     */
    public function addActionToRegister(ActionInterface $gameAction, $maxUses, $coolDown)
    {
        $this->logger->addInfo(
            sprintf('Add [%s] uses: %s cooldown: %s to register.', $gameAction, $maxUses, $coolDown)
        );
        $this->register->registerAction($gameAction, $maxUses, $coolDown);
    }

    /**
     * @param ActionInterface $action
     * @param DateTime        $dateTime
     *
     * @return bool
     */
    public function registerActionUsage(ActionInterface $action, DateTime $dateTime)
    {
        $this->logger->addInfo('registerActionUsage: '.$action->hashcode());

        return $this->register->registerActionUsage($action, $dateTime);
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed|void
     */
    public function updateItem(ItemInterface $gameItem, array $itemData)
    {
        $this->logger->addInfo('updateItem: '.$gameItem);
        $this->register->updateItem($gameItem, $itemData);
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return Collection
     */
    public function getItemData(ItemInterface $gameItem)
    {
        return $this->register->getItemData($gameItem);
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return mixed|void
     */
    public function removeItem(ItemInterface $gameItem)
    {
        $this->logger->addInfo('removeItem:'.$gameItem);
        $this->register->removeItem($gameItem);
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

    /**
     *
     */
    public function nextTurn()
    {
        $this->turn++;
        $this->logger->addInfo('nextTurn('.$this->turn.')');
    }

    /**
     * @return int
     */
    public function getTurn()
    {
        return $this->turn;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return __CLASS__;
    }

    /**
     * Returns the player of the game.
     *
     * @return Player the current player of the game.
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set the game player.
     *
     * @param Player $player
     */
    public function setPlayer(Player $player)
    {
        $this->player = $player;
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return bool
     */
    public function hasItem(ItemInterface $gameItem)
    {
        return $this->register->hasItem($gameItem);
    }

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function hasAction(ActionInterface $gameAction)
    {
        return $this->register->hasAction($gameAction);
    }

    /**
     * @param ItemInterface $gameItem
     *
     * @return ItemInterface
     */
    public function getItem(ItemInterface $gameItem)
    {
        return $this->register->getRegistryData()->get($gameItem->getName());
    }

    /**
     * Returns a collection of items in the register for the specified player.
     *
     * @param Player $player the player to search for in the register.
     *
     * @return Collection a collection of items.
     */
    public function getPlayerItems(Player $player)
    {
        $returnItems = new ArrayCollection();

        // Get all items ...
        $allIter = $this->register->getRegistryData()->getIterator();

        /** @var ItemInterface $item */
        foreach ($allIter as $item) {
            if ($item instanceof ItemInterface) {
                // get Item data ...
                $iData = $this->register->getItemData($item);
                // Only add if player name matches ...
                if ($iData->get('Player') === $player->getName()) {
                    $returnItems->add($item);
                }
            }
        }

        return $returnItems;
    }

    /**
     * Returns a collection of all items in the register.
     *
     * @return Collection a collection of all items.
     */
    public function getItems()
    {
        return $this->filterBy('ItemInterface');
    }

    /**
     * @return mixed
     */
    public function getActions()
    {
        return $this->filterBy('ActionInterface');
    }

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function getAction(ActionInterface $gameAction)
    {
        return $this->register->getRegistryData()->get($gameAction->hashcode());
    }

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function getActionData(ActionInterface $gameAction)
    {
        return $this->register->getRegistryData()->get($gameAction->hashcode());
    }

    /**
     * @param $creditsToAdd
     */
    public function addCredits($creditsToAdd)
    {
        $testDebit = ($this->credits + $creditsToAdd);
        GameLogger::addToGameLog('TestDebit: '.$testDebit.', creditsToAdd: '.$this->getCredits());
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @return ArrayCollection
     */
    private function filterBy($instanceString)
    {
        // We need to filter since we have item data in the register too.
        $returnCol = new ArrayCollection();
        foreach ($this->register->getRegistryData() as $data) {
            if ($data instanceof $instanceString) {
                $returnCol->add($data);
            }
        }

        return $returnCol;
    }
}

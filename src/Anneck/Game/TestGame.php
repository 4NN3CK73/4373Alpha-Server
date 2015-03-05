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

use Anneck\Game\Action\CreateShopProduct;
use Anneck\Game\Item\ItemInterface;
use Anneck\Game\Item\Shop;
use Anneck\Game\World\WorldInterface;

class TestGame implements GameInterface {

    /**
     * @var WorldInterface
     */
    private $world;
    /**
     * @var Register
     */
    private $register;
    private $safeGame;
    private $score  = 0;
    private $turn   = 0;
    private $logger;

    public function __construct()
    {
        $this->logger = new GameLogger();
    }

    public function getWorld()
    {
        $this->logger->addInfo('getWorld_' . $this->world);
        return $this->world;
    }

    public function setWorld(WorldInterface $world)
    {
        $this->logger->addInfo('setWorld_' . $world);
        $this->world = $world;
    }

    public function setRegister(RegisterInterface $register)
    {
        $this->logger->addInfo('setRegister:' . $register);
        $this->register = $register;
    }

    public function getScore()
    {
        $this->logger->addInfo('getScore:' . $this->score);
        return $this->score;
    }

    public function addScore($points)
    {
        $this->logger->addInfo('addScore:' . $this->score);
        $this->score += $points;
    }

    public function addItemToRegister(ItemInterface $gameItem)
    {
        $this->logger->addInfo('addItemToRegister:' . $gameItem);
        $this->register->registerItem($gameItem);
    }

    public function updateItem(ItemInterface $gameItem)
    {
        $this->logger->addInfo('updateItem:' . $gameItem);
        $this->register->updateItem($gameItem);
    }

    public function removeItem(ItemInterface $gameItem)
    {
        $this->logger->addInfo('removeItem:' . $gameItem);
        $this->register->removeItem($gameItem);
    }

    public function safe()
    {
        $this->logger->addInfo('safe()');
        // TODO: Implement safe() method.
    }

    public function nextTurn()
    {
        $this->logger->addInfo('nextTurn()');
        // testing ...
        $shopItem = new Shop($this);
        $createProductUsingShopItem = new CreateShopProduct($this->register);

        $shopItem->applyAction($createProductUsingShopItem);
        $this->turn++;
        $this->logger->addInfo('nextTurn()-END');
    }

    public function getTurn()
    {
        return $this->turn;
    }

    function __toString()
    {
        return __CLASS__;
    }


}
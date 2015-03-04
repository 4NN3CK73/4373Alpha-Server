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
        $this->logger->addError('foo');
    }

    public function setWorld(WorldInterface $world)
    {
        $this->logger->addInfo('setWorld' . $world);
        $this->world = $world;
    }

    public function getWorld()
    {
        return $this->world;
    }

    public function setRegister(RegisterInterface $register)
    {
        $this->register = $register;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function addScore($points)
    {
        $this->score += $points;
    }

    public function addItemToRegister(ItemInterface $gameItem)
    {
        $this->register->registerItem($gameItem);
    }

    public function updateItem(ItemInterface $gameItem)
    {
        $this->register->updateItem($gameItem);
    }

    public function removeItem(ItemInterface $gameItem)
    {
        $this->register->removeItem($gameItem);
    }

    public function safe()
    {
        // TODO: Implement safe() method.
    }

    public function nextTurn()
    {
        // testing ...
        $shopItem = new Shop($this);
        $createProductUsingShopItem = new CreateShopProduct($this->register);

        $shopItem->applyAction($createProductUsingShopItem);
        $this->turn++;
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
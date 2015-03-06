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


/**
 * The TestGame is as of now just a developer playground.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGame implements GameInterface
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
     * @var int
     */
    private $turn   = 0;
    /**
     * @var GameLogger
     */
    private $logger;

    /**
     * Creates the TestGame.
     */
    public function __construct()
    {
        $this->logger = new GameLogger();
        $this->register = new Register();
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
        $this->logger->addInfo('setWorld_'.$world);
        $this->world = $world;
    }

    /**
     * @param RegisterInterface $register
     */
    public function setRegister(RegisterInterface $register)
    {
        $this->logger->addInfo('setRegister:'.$register);
        $this->register = $register;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        $this->logger->addInfo('getScore:'.$this->score);

        return $this->score;
    }

    /**
     * @param $points
     */
    public function addScore($points)
    {
        $this->logger->addInfo('addScore:'.$this->score);
        $this->score += $points;
    }

    /**
     * @param ItemInterface $gameItem
     */
    public function addItemToRegister(ItemInterface $gameItem)
    {
        $this->logger->addInfo('addItemToRegister:'.$gameItem);
        $this->register->registerItem($gameItem);
    }

    /**
     * @param ItemInterface $gameItem
     */
    public function updateItem(ItemInterface $gameItem)
    {
        $this->logger->addInfo('updateItem:'.$gameItem);
        $this->register->updateItem($gameItem);
    }

    /**
     * @param ItemInterface $gameItem
     */
    public function removeItem(ItemInterface $gameItem)
    {
        $this->logger->addInfo('removeItem:'.$gameItem);
        $this->register->removeItem($gameItem);
    }

    /**
     *
     */
    public function safe()
    {
        $this->logger->addInfo('safe()');
        // TODO: Implement safe() method.
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
}

<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.03.15, 12:34 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Player\Player;
use Anneck\Game\Register\Register;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The AbstractGame implements common features for world, register, safe game's and the player and provides utility
 * methods to it's subclasses.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
abstract class AbstractGame
{
    /**
     * @var WorldInterface
     */
    protected $world;
    /**
     * @var Register
     */
    protected $register;
    /**
     * @var
     */
    protected $safeGame;
    /**
     * @var GameLogger
     */
    protected $logger;
    /**
     * @var Player
     */
    protected $player;

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
     * Returns the name of the game (FQCN).
     *
     * @return string the name of the game.
     */
    public function __toString()
    {
        $refClass = new \ReflectionClass($this);

        return $refClass->getName();
    }

    /**
     * Helper method which returns a collection of registered data matching the instanceString.
     *
     * @param $instanceString
     *
     * @return ArrayCollection
     */
    protected function filterBy($instanceString)
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
}

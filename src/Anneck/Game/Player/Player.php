<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 16.03.15, 08:10 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Player;

/**
 * The Player is the special user which play's a game.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class Player
{
    private $name;

    private $credits = 5000.00;

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param mixed $credits
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    /**
     * Creates a new player with a name.
     *
     * @param $playerName string name of the player.
     */
    public function __construct($playerName)
    {
        $this->name = $playerName;
    }

    /**
     * Returns the name of the player.
     *
     * @return string the name of the player.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the the string representation of the player.
     *
     * @return string the string representation of the player.
     */
    public function __toString()
    {
        $refClass = new \ReflectionClass($this);

        return '['.$refClass->getShortName().']:'.$this->name;
    }
}

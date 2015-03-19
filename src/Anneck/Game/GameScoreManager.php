<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 16.03.15, 11:49 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Player\Player;

/**
 * The GameScoreManager keeps track of scores by player.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class GameScoreManager
{
    /**
     * @param Player $player
     * @param int    $score
     */
    public function addScore(Player $player, $score)
    {
        // todo: implement score safe ...
        GameLogger::addToGameLog('ScoreManager addScore '.$score.' to player '.$player);
    }
}

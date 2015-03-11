<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 10.03.15, 08:02 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

/**
 * The interface SingleScoreGameInterace adds the feature to track a single int based score in the game.
 *
 * @todo    Write PHPDoc for this interface!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface SingleScoreGameInterace
{
    /**
     * @return int
     */
    public function getScore();

    /**
     * @param $points
     *
     * @return int
     */
    public function addScore($points);
}

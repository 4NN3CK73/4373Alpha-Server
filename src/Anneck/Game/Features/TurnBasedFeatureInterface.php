<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 10.03.15, 07:52 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

/**
 * The interface TurnBasedGameInterface adds the feature of a "turn" to the game which advances the game.
 *
 * @todo    Write PHPDoc for this interface!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface TurnBasedFeatureInterface
{
    /**
     * @return mixed
     */
    public function nextTurn();

    /**
     * @return mixed
     */
    public function getTurn();
}

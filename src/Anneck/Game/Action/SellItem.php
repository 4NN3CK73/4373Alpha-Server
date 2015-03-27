<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 16.03.15, 17:14 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Action;

use Anneck\Game\Exception\GameFeatureMissingException;
use Anneck\Game\Features\ItemRegisterFeatureInterface;
use Anneck\Game\GameInterface;

/**
 * The SellItem.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class SellItem extends AbstractAction
{
    /**
     * @param $itemUUID
     * @param $credits
     */
    public function __construct($itemUUID, $credits)
    {
    }

    /**
     * Applies itself to a running game.
     *
     * @param GameInterface $game the game to change.
     *
     * @return mixed
     * @throws GameFeatureMissingException
     */
    public function applyOn(GameInterface $game)
    {
        if (!$game instanceof ItemRegisterFeatureInterface) {
            throw new GameFeatureMissingException('ApplyON requires ', 'ItemRegisterFeature', $game);
        }
    }
}

<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 12:03 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Action;

use Anneck\Game\GameInterface;

class ScoreOnePoint extends AbstractItemAction
{
    public function applyOn(GameInterface $game)
    {
        $game->addScore(1);

        return true;
    }

    public function __toString()
    {
        $reClass = new \ReflectionClass($this);

        return $reClass->getShortName();
    }
}

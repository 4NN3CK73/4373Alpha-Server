<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 11:56 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\GameInterface;

interface ActionInterface
{
    public function applyOn(GameInterface $game);
    public function __toString();
}

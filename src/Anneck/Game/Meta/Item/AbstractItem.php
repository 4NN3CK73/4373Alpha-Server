<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.02.15, 11:20 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Meta\Item;

use Anneck\Game\Meta\ActionInterface;
use Anneck\Game\Meta\ItemInterface;
use Doctrine\Common\Collections\ArrayCollection;

abstract class AbstractItem implements ItemInterface
{
    /**
     * Private executeAction helper to validate if incoming action class is of the correct type.
     *
     * The method checks the action parameter for implementing interfaces.
     *
     * @param $action
     *
     * @return bool
     */
    protected function validateActionType(ActionInterface $action, ArrayCollection $validTypes)
    {
        // I know its a one line conditional, but I like it.
        return $validTypes->contains($action->getType()) ? true : false;
    }
}

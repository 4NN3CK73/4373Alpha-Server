<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 05.03.15, 16:01 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Action;

use Anneck\Game\ActionInterface;
use Anneck\Game\Exception\GameException;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The ActionQueue is a Collection which only allows ActionInterface to be added.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class ActionQueue extends ArrayCollection
{
    /**
     * Overloading add Method, enforcing delegation to addAction(ActionInterface).
     *
     * @param mixed $element to be delegated.
     *
     * @return bool|void
     *
     * @throws GameException
     */
    public function add($element)
    {
        // Only accept ActionInterface ...
        if ($element instanceof ActionInterface) {
            return parent::add($element);
        }
        // Error state, lets compile a nice error message ...
        if (is_object($element)) {
            $refClass = new \ReflectionClass($element);
            $interfaceNames = implode(', ', $refClass->getInterfaceNames());
            throw new GameException('Expected ActionInterface but got element implementing: '.$interfaceNames);
        }
        throw new GameException('Expected ActionInterface but got something non object like! :( ');
    }

}

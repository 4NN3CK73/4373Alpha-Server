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
use Anneck\Game\GameLogger;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The ActionQueue is a Collection which only allows ActionInterface to be added.
 *
 * @todo: Maybe this needs to be a linked list?
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
        $log = new GameLogger();
        // Only accept ActionInterface ...
        if ($element instanceof ActionInterface) {
            $log->addDebug('ActionQueue: add('.$element.')!');

            return parent::add($element);
        }
        // Everything else is triggers exception and is logged.
        $log->addWarning('ActionQueue: failed to add! Not an ActionInterace!');
        throw new GameException('ActionQueue: failed to add! Not an ActionInterace!');
    }
}

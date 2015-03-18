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
use Monolog\Logger;

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
    const FAILED_TO_ADD_NOT_AN_ACTION = 'ActionQueue: failed to add! Not an ActionInterface!';

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
            return $this->addAction($element);
        }
        // Everything else is triggers exception and is logged.
        GameLogger::addToGameLog(
            static::FAILED_TO_ADD_NOT_AN_ACTION,
            Logger::WARNING);
        throw new GameException(static::FAILED_TO_ADD_NOT_AN_ACTION);
    }

    /**
     * @param ActionInterface $action
     *
     * @return bool
     */
    public function addAction(ActionInterface $action)
    {
        GameLogger::addToGameLog('ActionQueue: add('.$action.')!');

        return parent::add($action);
    }
}

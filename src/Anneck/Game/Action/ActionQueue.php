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
     * @param mixed $element
     */
    public function add($element)
    {
        $this->addAction($element);
    }

    /**
     * @param ActionInterface $action
     */
    public function addAction(ActionInterface $action)
    {
        $this->add($action);
    }
}

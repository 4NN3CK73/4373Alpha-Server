<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 03.03.15, 18:03 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game;

use Anneck\Game\Meta\ActionInterface;
use Doctrine\Common\Collections\ArrayCollection;

class GameActionQueue implements ActionQueueInterface
{

    private $actionC;

    public function __construct()
    {
        $this->actionC = new ArrayCollection();
    }

    public function addAction(ActionInterface $action)
    {
        $this->actionC->add($action);
    }

    /**
     * @return ArrayCollection of actions
     */
    public function getActionQueue()
    {
        return $this->actionC;
    }
}
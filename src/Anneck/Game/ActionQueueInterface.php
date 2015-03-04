<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 03.03.15, 18:54 by 4nn3ck
 * ************************************************************************
 */
namespace Anneck\Game;

use Anneck\Game\Meta\ActionInterface;
use Doctrine\Common\Collections\ArrayCollection;

interface ActionQueueInterface
{
    public function addAction(ActionInterface $action);

    /**
     * @return ArrayCollection the actions in a array collection
     */
    public function getActionQueue();
}
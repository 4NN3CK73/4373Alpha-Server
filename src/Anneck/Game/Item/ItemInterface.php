<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 11:25 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game\Item;

use Anneck\Game\Action\ItemActionInterface;

/**
 * The interface ItemInterface describes a game item on which a distinct collection of available actions can be applied.
 *
 * The ItemInterface is used together with ItemActionInterface.
 *
 *
 * @package Anneck\Game\Item
 */
interface ItemInterface {

    /**
     * @return 
     */
    public function getAvailableActions();
    public function applyAction(ItemActionInterface $action);

    public function getName();
    public function __toString();
}
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

interface ItemInterface {

    public function getAvailableActions();
    public function applyAction(ItemActionInterface $action);
    public function getName();
}
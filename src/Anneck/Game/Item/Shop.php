<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 12:19 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game\Item;


use Doctrine\Common\Collections\ArrayCollection;
use Anneck\Game\Action\CreateShopProduct;
use Anneck\Game\Action\ItemActionInterface;
use Anneck\Game\Action\ScoreOnePoint;
use Anneck\Game\GameInterface;

class Shop extends AbstractItem {

    public function getAvailableActions()
    {
        $actionList = new ArrayCollection();
        $actionList->add(new ScoreOnePoint());
        $actionList->add(new CreateShopProduct());
        return $actionList;
    }


}
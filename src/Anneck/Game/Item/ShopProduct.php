<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 12:43 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Item;

use Anneck\Game\Action\ScoreOnePoint;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The ShopProduct.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class ShopProduct extends AbstractItem
{
    /**
     * @return ArrayCollection
     */
    public function getAvailableActions()
    {
        $actionList = new ArrayCollection();
        $actionList->add(new ScoreOnePoint());

        return $actionList;
    }
}

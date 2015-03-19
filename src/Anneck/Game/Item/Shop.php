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

use Anneck\Game\Action\CreateItem;
use Anneck\Game\GameInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The Shop.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class Shop extends AbstractItem
{
    private $actionList;
    /**
     * @param               $itemName
     * @param GameInterface $game
     */
    public function __construct($itemName, GameInterface $game = null)
    {
        parent::__construct($itemName, $game);

        $this->actionList = new ArrayCollection();
        $this->actionList->add(new CreateItem('ShopProduct'));
    }

    /**
     * @return ArrayCollection
     */
    public function getAvailableActions()
    {
        return $this->actionList;
    }
}

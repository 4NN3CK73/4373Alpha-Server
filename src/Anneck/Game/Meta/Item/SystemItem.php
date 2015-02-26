<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 26.02.15, 14:57 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Meta\Item;

use Anneck\Game\Meta\ActionInterface;
use Anneck\Game\Meta\ItemInterface;

/**
 * Class SystemItem.
 */
class SystemItem implements ItemInterface
{
    /**
     * @param ActionInterface $actionInterface
     *
     * @return mixed|void
     */
    public function executeAction(ActionInterface $actionInterface)
    {
        $actionInterface->execute();
    }
}

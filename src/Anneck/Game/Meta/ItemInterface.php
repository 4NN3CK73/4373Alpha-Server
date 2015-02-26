<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 26.02.15, 14:53 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Meta;

/**
 * Class ItemInterface.
 */
interface ItemInterface
{
    /**
     * @param ActionInterface $action
     *
     * @return mixed
     */
    public function executeAction(ActionInterface $action);
}

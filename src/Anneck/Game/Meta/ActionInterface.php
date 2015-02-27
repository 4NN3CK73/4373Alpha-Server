<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 26.02.15, 14:54 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Meta;

/**
 * Interface ItemActionInterface.
 */
interface ActionInterface
{
    /**
     * Executes itself.
     *
     * @return boolean true|false
     */
    public function execute();

    /**
     * Identifies it's action type.
     *
     * @return mixed
     */
    public function getType();
}

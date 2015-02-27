<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 26.02.15, 15:01 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Meta\Action\System;

use Anneck\Game\Logger\WorldLog;
use Anneck\Game\Meta\Action\ActionTypes;
use Anneck\Game\Meta\ActionInterface;

class DefaultSystemAction implements ActionInterface
{
    private $worldLog;

    public function __construct()
    {
        $this->worldLog = new WorldLog();
    }

    /**
     * Executes itself.
     *
     * @return boolean true|false
     */
    public function execute()
    {
        $this->worldLog->addNotice('Called execute on '.__CLASS__);

        return true;
    }

    /**
     * Identifies it's action type.
     *
     * @return mixed
     */
    public function getType()
    {
        return ActionTypes::SYSTEM;
    }

    /**
     * The string representation of this class.
     *
     * @return string The string representation of this class
     */
    public function __toString()
    {
        return __CLASS__;
    }
}

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

namespace Anneck\Game\Meta\Action\Item;

use Anneck\Game\Meta\Action\AbstractAction;
use Anneck\Game\Meta\Action\ActionTypes;

/**
 * The class DefaultItemAction as of now just serves to enable integration test's.
 */
class DefaultItemAction extends AbstractAction
{
    /**
     * @param string $actionName
     */
    public function __construct($actionName = 'DefaultItemAction')
    {
        parent::__construct($actionName);
    }

    /**
     * Executes itself.
     *
     * @return boolean true|false
     */
    public function execute()
    {
        $this->worldLog->addNotice('Called execute on '.$this);

        return true;
    }

    /**
     * Identifies it's action type.
     *
     * @return mixed
     */
    public function getType()
    {
        return ActionTypes::ITEM;
    }
}
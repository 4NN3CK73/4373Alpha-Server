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
use Anneck\Game\Worlds\DefaultWorld;

/**
 * The class DefaultItemAction as of now just serves to enable integration test's.
 */
class DefaultItemAction extends AbstractAction
{
    private $world;
    /**
     * @param string $actionName
     */
    public function __construct($actionName = 'DefaultItemAction')
    {
        parent::__construct($actionName);
        $this->world = new DefaultWorld();
    }

    /**
     * Executes itself.
     *
     * @return boolean true|false
     */
    public function execute()
    {

        $this->worldLog->addNotice('Called execute on ' . $this . ' changing world: ' . $this->world);

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

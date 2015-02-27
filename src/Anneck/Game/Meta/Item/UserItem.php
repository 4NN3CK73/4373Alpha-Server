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

use Anneck\Game\Logger\WorldLog;
use Anneck\Game\Meta\Action\ActionTypes;
use Anneck\Game\Meta\ActionInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The class SystemItem consumes SystemItemActions
 */
class UserItem extends AbstractItem
{
    private $logger;
    private $validActionTypes;

    public function __construct()
    {
        $this->logger = new WorldLog();
        $this->validActionTypes = new ArrayCollection([ActionTypes::USER]);
    }

    /**
     * @param ActionInterface $action
     *
     * @return mixed|void
     */
    public function executeAction(ActionInterface $action)
    {
        $actionResult = null;
        if ($this->validateActionType($action, $this->validActionTypes)) {
            $actionResult = $action->execute();
        } else {
            $this->logger->addWarning(
                sprintf('TYPE DOES NOT MATCH! The ITEM %s failed to execute ACTION %s it\'s TYPE: %s does not match!',
                    __CLASS__,
                    $action,
                    $action->getType()
                )
            );
        }

        return $actionResult;
    }

}

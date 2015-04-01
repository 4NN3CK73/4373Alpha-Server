<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.03.15, 12:42 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

use Anneck\Game\ActionInterface;
use DateTime;

trait ActionRegisterFeatureTrait
{
    /**
     * Adds a game action to the game.
     *
     * @param ActionInterface $gameAction
     * @param                 $maxUses
     * @param                 $coolDown
     *
     * @return mixed
     */
    public function addActionToRegister(ActionInterface $gameAction, $maxUses, $coolDown)
    {
        $this->logger->addInfo(
            sprintf('Add [%s] uses: %s cooldown: %s to register.', $gameAction, $maxUses, $coolDown)
        );
        $this->register->registerAction($gameAction, $maxUses, $coolDown);
    }

    /**
     * @param ActionInterface $action
     * @param DateTime        $dateTime
     *
     * @return bool
     */
    public function registerActionUsage(ActionInterface $action, DateTime $dateTime)
    {
        $this->logger->addInfo('registerActionUsage: '.$action->hashcode());

        return $this->register->registerActionUsage($action, $dateTime);
    }

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function hasAction(ActionInterface $gameAction)
    {
        return $this->register->hasAction($gameAction);
    }

    /**
     * @return mixed
     */
    public function getActions()
    {
        return $this->filterBy('ActionInterface');
    }

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function getAction(ActionInterface $gameAction)
    {
        return $this->register->getRegistryData()->get($gameAction->hashcode());
    }

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function getActionData(ActionInterface $gameAction)
    {
        return $this->register->getRegistryData()->get($gameAction->hashcode());
    }
}

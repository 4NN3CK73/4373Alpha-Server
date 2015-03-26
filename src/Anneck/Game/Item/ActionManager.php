<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 24.03.15, 14:31 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Item;

use Anneck\Game\ActionInterface;
use Anneck\Game\Exception\GameException;
use Anneck\Game\Exception\GameFeatureMissingException;
use Anneck\Game\Features\ItemRegisterFeature;
use Anneck\Game\GameInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The ActionManager stores actions and their usages including number of, date-time, etc.
 * It serves every item class as a helper and uses the register in the provided game to access the meta data properties
 * of the item.
 *
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class ActionManager extends ArrayCollection
{
    const ACTION_KEY = 'Action';
    const MAXIMUM_USES_KEY = 'MaximumUses';
    const COOLDOWN_TIME_KEY = 'CooldownTime';

    /**
     * @var GameInterface
     */
    private $game;

    /**
     * Creates the ActionManager with a Game who has the ItemRegisterFeature implemented.
     *
     * @param GameInterface $gameToUse the game to use.
     *
     * @throws GameFeatureMissingException if the game is missing a feature.
     */
    public function __construct(GameInterface $gameToUse)
    {
        if (!$gameToUse instanceof ItemRegisterFeature) {
            throw new GameFeatureMissingException('The ActionManager could not be created!', 'ItemRegisterFeature', $gameToUse);
        }

        $this->game = $gameToUse;
    }

    /**
     * Dont use this method, use addAction instead!
     *
     * @param mixed $value
     *
     * @return bool
     *
     * @throws GameException
     */
    public function add($value)
    {
        if (!$value instanceof ActionInterface) {
            throw new GameException('ActionManager add() requires ActionInterface!');
        }
        // This will insert the default maximumUses for the specified action!
        return $this->addGameAction($value);
    }

    /**
     * Adds the action into the manager's internal data storage.
     *
     * @param ActionInterface $action      the action to add.
     * @param string          $maximumUses the number of uses for the item
     * @param string          $coolDown    the cron-tab like string to indicate cool down times, default "5s".
     *
     * @return bool true if added successfully.
     */
    public function addGameAction(ActionInterface $action, $maximumUses = '*', $coolDown = '5s')
    {
        $actionUseData = [
            static::ACTION_KEY => $action,
            static::MAXIMUM_USES_KEY => $maximumUses,
            static::COOLDOWN_TIME_KEY => $coolDown,
        ];

        return parent::add($actionUseData);
    }

    /**
     * @return ArrayCollection
     */
    public function getUsableActionList()
    {
        $useableActions = new ArrayCollection();
/*
        if($this->game->hasItem($this)) {
            // we are in the register ...
            $itemData = $this->game->getItemData($this);
            $uses = $itemData->get('Uses');

        }
*/
        return $useableActions;
    }

    /**
     * @return ArrayCollection
     */
    public function getActionCollection()
    {
        $actionList = new ArrayCollection();
        foreach ($this->getIterator() as $actionUseData) {
            $action = $actionUseData[static::ACTION_KEY];

            $actionList->add($action);
        }

        return $actionList;
    }
}

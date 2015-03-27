<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.03.15, 10:11 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

use Anneck\Game\ActionInterface;
use DateTime;

/**
 * The ActionRegisterFeature
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface ActionRegisterFeature
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
    public function addActionToRegister(ActionInterface $gameAction, $maxUses, $coolDown);

    /**
     * @param ActionInterface $gameAction
     * @param DateTime        $param
     *
     * @return mixed
     */
    public function registerActionUsage(ActionInterface $gameAction, DateTime $param);

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function hasAction(ActionInterface $gameAction);

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function getAction(ActionInterface $gameAction);

    /**
     * @param ActionInterface $gameAction
     *
     * @return mixed
     */
    public function getActionData(ActionInterface $gameAction);

    /**
     * @return mixed
     */
    public function getActions();

}
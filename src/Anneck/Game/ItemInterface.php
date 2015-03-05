<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 11:25 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

use Doctrine\Common\Collections\Collection;

/**
 * The ItemInterface is a game item on which a distinct collection of available actions can be applied.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface ItemInterface
{
    /**
     * The available item actions.
     *
     * @return Collection of ItemActionInterface objects.
     */
    public function getAvailableActions();

    /**
     * Executes the ItemActionInterface changing the world.
     *
     * @param ActionInterface $action the action to use.
     *
     * @return boolean true if the action was applied, false otherwise.
     */
    public function applyAction(ActionInterface $action);

    /**
     * Returns the name of the item.
     *
     * @return string the name of the item.
     */
    public function getName();

    /**
     * Returns the string representation of this class.
     *
     * @return string the string representation of this class.
     */
    public function __toString();
}

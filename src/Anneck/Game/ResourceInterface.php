<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 11:46 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game;

/**
 * The ResourceInterface is used by the game during game actions who create new item's.
 * Resources can be incompatible with each other, this enables or disables certain resource combinations during item
 * creation. The compatibility of resources is defined in the WorldConfiguration.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface ResourceInterface
{
    /**
     * Checks if resources are compatible.
     *
     * @param ResourceInterface $resource to compare.
     *
     * @return boolean true if resources are compatible, else false.
     */
    public function isCompatible(ResourceInterface $resource);

    /**
     * Returns the string representation of the resource.
     *
     * @return string the string representation of the resource.
     */
    public function __toString();
}

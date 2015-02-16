<?php
/* ***********************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game;

/**
 * A (Game)Configuration is used as a READ ONLY container carrying a key/value collection.
 *
 * The implementations of this class MUST NOT allow access to its internal data.
 *
 *
 */
interface Configuration
{
    /**
     * Returns all configuration key's.
     *
     * @return array of configuration key's;
     */
    public function getConfigurationKeys();

    /**
     * Returns the configuration as a collection.
     *
     * @return mixed
     */
    public function getConfiguration();

    public function hasConfigurationKey($key);

}
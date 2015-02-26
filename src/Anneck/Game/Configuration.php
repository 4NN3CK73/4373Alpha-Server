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
 * The (Game) Configuration interface is used as a delegate container carrying a key/value collection.
 *
 * A Configuration is supposed to be immutable and should only change in the constructor.
 *
 * The implementations of this class MUST NOT allow access to its internal data.
 *
 * Please use @ConfigurationRoot and extend it.
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

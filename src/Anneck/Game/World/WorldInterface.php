<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 11:22 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\World;

use Anneck\Game\Configuration\ConfigurationInterface;
use Anneck\Game\Item\ResourceInterface;

/**
 * The WorldInterface holds continents and resources according to its configuration used by the game.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface WorldInterface
{
    /**
     * Configures the world using a ConfigurationInterface and returns the configured world.
     *
     * @param ConfigurationInterface $configuration the configuration to use.
     *
     * @return WorldInterface the configured world.
     */
    public function configure(ConfigurationInterface $configuration);

    /**
     * @todo: implement this idea
     *
     * @param $worldName
     *
     * @return mixed
     */
    public function createByName($worldName);

    /**
     * Each world contains continents which in turn contain specific resources used in the game.
     *
     * @todo: implement this idea
     *
     * @return mixed
     */
    public function getContinents();

    /**
     * @todo: implement this idea
     *
     * @param ResourceInterface $itemResource
     *
     * @return mixed
     */
    public function isResourceAvailableIn(ResourceInterface $itemResource);

    /**
     * Returns the name of the world.
     *
     * @return string the name of the world.
     */
    public function getName();

    /**
     * A string representation of the world.
     *
     * @return string the world string
     */
    public function __toString();
}

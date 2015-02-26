<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 17.02.15, 11:20 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Configuration;

use Anneck\Game\Configuration;
use Anneck\Game\Exception\GameException;
use Exception;

/**
 * The Class ConfigurationFactory uses the factory pattern to create
 * xyzConfiguration classes.
 */
class ConfigurationFactory
{
    /**
     * Use getInstance()!
     */
    protected function __construct()
    {
    }

    /**
     * Creates a new instance of Configuration specified by the class name.
     *
     * @param $configurationClass string of the configuration class name.
     *
     * @return Configuration the configuration class matching.
     *
     * @throws GameException if the creation of the configuration class failed.
     */
    public static function getInstance($configurationClass)
    {
        $fqcn = 'Anneck\Game\Configuration\\'.$configurationClass.'Configuration';

        try {
            $instance = new $fqcn();
        } catch (Exception $createException) {
            throw new GameException(
                sprintf('Failed to create %s. %s', $configurationClass, $createException->getMessage()),
                'GC0002'
            );
        }

        return $instance;
    }
}

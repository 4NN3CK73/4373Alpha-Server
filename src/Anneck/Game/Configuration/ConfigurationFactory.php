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

class ConfigurationFactory
{

    protected function __construct()
    {

    }

    public static function getInstance($configurationClass)
    {
        $fqcn = 'Anneck\Game\Configuration\\' . $configurationClass . 'Configuration';

        try {
            $instance = new $fqcn();
        } catch (Exception $createException) {
            throw new GameException(
                sprintf('Failed to create %s. %s', $configurationClass, $createException->getMessage()),
                'GC0002'
            );

        }

        if ($instance instanceof Configuration) {
            return $instance;
        } else {
            throw new GameException(
                sprintf('%s is not an instance of Configuration', $instance),
                'GC0001'
            );
        }


    }

}
<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 13:12 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Anneck\Game\ConfigurationInterface;

/**
 * The WorldConfiguration.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class WorldConfiguration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('WorldConfiguration');

        $rootNode->
            children()->
                arrayNode('world')->
                    children()->
                        scalarNode('name')
                            ->defaultValue('default')
                        ->end()
                    ->end()
            ->end();

        return $treeBuilder;
    }

    /**
     * One default toString implementation ...
     *
     * @return string the shortName of the class.
     */
    public function __toString()
    {
        $reClass = new \ReflectionClass($this);

        return $reClass->getShortName();
    }
}

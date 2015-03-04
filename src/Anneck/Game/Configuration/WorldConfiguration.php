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
use Symfony\Component\Config\Definition\Processor;

class WorldConfiguration implements ConfigurationInterface {
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

}
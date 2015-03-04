<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 13:05 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game\World;


use Doctrine\Common\Collections\ArrayCollection;
use Anneck\Game\Configuration\WorldConfiguration;
use Anneck\Game\Configuration\ConfigurationInterface;
use Anneck\Game\Item\ResourceInterface;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Yaml\Yaml;

class DefaultWorld implements WorldInterface {

    private $config;
    private $name;

    public function configure(ConfigurationInterface $configuration)
    {
        // First we load the treeBuild
        $this->config = $configuration->getConfigTreeBuilder();
        $processor = new Processor();
        $reflectionClass = new \ReflectionClass($this);
        $className = $reflectionClass->getShortName();
        $configSpec = Yaml::parse(
            file_get_contents(
                __DIR__ . '/../Configuration/' . $className . '.yml'
            )
        );
        $configSpecs = [$configSpec];
        // then we process the configuration ...
        $processedConfiguration = $processor->processConfiguration(
            $configuration,
            $configSpecs
        );
        $this->config = $processedConfiguration;
        // and we return it ...
        return $processedConfiguration;
    }

    public function createByName($worldName)
    {
        $this->name = $worldName;
        return $this;
    }

    public function getContinents()
    {
        return new ArrayCollection();
    }

    public function isResourceAvailableIn(ResourceInterface $itemResource)
    {
        return false;
    }

    public function getName()
    {
        return $this->name;
    }

    function __toString()
    {
        return __CLASS__;
    }


}
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

use Anneck\Game\Configuration\ConfigurationInterface;
use Anneck\Game\Item\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Yaml\Yaml;

/**
 * The DefaultWorld
 *
 * @package Anneck\Game\World
 * @todo    Write PHPDoc for this class!
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class DefaultWorld implements WorldInterface {

    /**
     * @var
     */
    private $config;
    /**
     * @var
     */
    private $name;

    /**
     * @param ConfigurationInterface $configuration
     *
     * @return array
     */
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

    /**
     * @param $worldName
     *
     * @return $this
     */
    public function createByName($worldName)
    {
        $this->name = $worldName;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getContinents()
    {
        return new ArrayCollection();
    }

    /**
     * @param ResourceInterface $itemResource
     *
     * @return bool
     */
    public function isResourceAvailableIn(ResourceInterface $itemResource)
    {
        return false;
    }

    /**
     * The world plus its name ...
     * @return string the shortName of the class.
     */
    public function __toString()
    {
        $reClass = new \ReflectionClass($this);
        return $reClass->getShortName() . '(' . $this->getName() . ')';
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
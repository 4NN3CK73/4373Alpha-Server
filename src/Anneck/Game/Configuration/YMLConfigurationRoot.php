<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 23.02.15, 13:29 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Configuration;

use Anneck\Game\Exception\GameException;
use Doctrine\Common\Collections\ArrayCollection;
use ReflectionClass;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;

/**
 * The abstract class YMLConfigurationRoot implements the default way of loading a WorldConfiguration
 * from a YAML file.
 */
abstract class YMLConfigurationRoot extends ConfigurationRoot implements YMLConfiguration
{
    const YAML_CONFIGURATION_ROOT = __DIR__;

    public function __construct()
    {
        parent::__construct();
        $this->loadConfiguration();
    }

    /**
     *
     */
    public function loadConfiguration()
    {
        $fileName = (new \ReflectionClass($this))->getShortName();
        $fileSuffix = '.yml';
        $fqfn = self::YAML_CONFIGURATION_ROOT.'/'.$fileName.$fileSuffix;

        if (!file_exists($fqfn)) {
            throw new GameException('Configuration YML file '.$fqfn.' does not exist!', 0000);
        }
        $yaml = new Parser();

        try {
            $arrayValue = $yaml->parse(
                file_get_contents(
                    $fqfn // the fully qualified file name
                )
            );

            $this->addConfiguration(new ArrayCollection($arrayValue));
        } catch (ParseException $parseException) {
            throw new GameException(
                sprintf('Failed to load Configuration %s, parser error: %s', $fqfn, $parseException->getMessage()),
                0000
            );
        }
    }
}

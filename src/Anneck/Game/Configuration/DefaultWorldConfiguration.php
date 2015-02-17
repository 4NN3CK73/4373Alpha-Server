<?php
/*************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 * Created 03.02.15 at 12:45 by 4nn3ck
 * ***********************************************************************
 */
namespace Anneck\Game\Configuration;

use Anneck\Game\Configuration;
use Anneck\Game\Continent\DefaultContinent;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * The class DefaultWorldConfiguration is just a placeholder during dev.
 *
 * @package Anneck\Game\Configuration
 */
class DefaultWorldConfiguration extends ConfigurationRoot
{

    public function __construct()
    {
        parent::__construct();
        $this->getConfiguration()->set('CONTINENTS', new ArrayCollection([
            'ContinentDefault-1' => new DefaultContinent(new DefaultContinentConfiguration()),
            'ContinentDefault-2' => new DefaultContinent(new DefaultContinentConfiguration()),
            'ContinentDefault-3' => new DefaultContinent(new DefaultContinentConfiguration())
        ]));
    }

}
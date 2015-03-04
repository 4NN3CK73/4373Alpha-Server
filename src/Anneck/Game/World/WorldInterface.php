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


use Anneck\Game\Item\ItemInterface;
use Anneck\Game\Item\ResourceInterface;
use Anneck\Game\Configuration\ConfigurationInterface;

interface WorldInterface {

    public function configure(ConfigurationInterface $configuration);
    public function createByName($worldName);

    public function getContinents();
    public function isResourceAvailableIn(ResourceInterface $itemResource);

    public function getName();
}
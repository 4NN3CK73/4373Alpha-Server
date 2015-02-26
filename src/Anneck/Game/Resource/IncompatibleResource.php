<?php
/* ***********************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

namespace Anneck\Game\Resource;

use Anneck\Game\Resource;

/**
 * The class IncompatibleResource is used for testing purposes only.
 * It defaults to be incompatible! Nothing more to it :)
 * If you find another use for this class, please document it here, thank you. :).
 */
class IncompatibleResource implements Resource
{
    private $resourceName = '__INCOMPATIBLE__';

    /**
     * @param string $resourceName
     */
    public function __construct($resourceName = '__INCOMPATIBLE__')
    {
        $this->resourceName = $resourceName;
    }

    /**
     * @param Resource $anotherResource
     *
     * @return bool false - its always incompatible
     */
    public function isCompatible(Resource $anotherResource)
    {
        return false;
    }

    public function getResourceType()
    {
        return $this->resourceName;
    }
}

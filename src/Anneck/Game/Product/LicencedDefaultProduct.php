<?php
/* ***********************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ***********************************************************************
 */

 

namespace Anneck\Game\Product;

use Anneck\Game\License;
use Anneck\Game\Product;
use Anneck\Game\Resource;
use Anneck\Manufacture\ProductFactory;

/**
 * The class LicencedDefaultProduct ...
 * @ToDo: Define the purpose of the class with "separation of concerns" in mind.
 *
 */
class LicencedDefaultProduct extends DefaultProduct implements LicencedProduct
{
    public function addResource(Resource $resource)
    {
        parent::addResource($resource);
    }

    public function addLicence(License $license)
    {
        // TODO: Implement addLicence() method.
    }

    public function build(ProductFactory $productFactory)
    {
        return $this;
    }

    public function validateLicence()
    {
        // TODO: Implement validate() method.
    }
}
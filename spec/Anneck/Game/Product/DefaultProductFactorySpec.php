<?php

namespace spec\Anneck\Game\Product;

use Anneck\Game\Resource\DefaultResource;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultProductFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Product\DefaultProductFactory');
    }

    public function it_can_create_default_products()
    {

        $resourceCollection = new ArrayCollection();
        $resourceA = new DefaultResource();
        $resourceB = new DefaultResource();
        $resourceCollection->add($resourceA);
        $resourceCollection->add($resourceB);
        $product = $this->createProduct($resourceCollection);
        $product->shouldImplement('Anneck\Game\Product');
        $product->shouldHaveType('Anneck\Game\Product\DefaultProduct');
    }
}

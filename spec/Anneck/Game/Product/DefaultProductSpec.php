<?php

namespace spec\Anneck\Game\Product;

use Anneck\Game\Product\DefaultProduct;
use Anneck\Game\Resource\DefaultResource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Product');

        $this->beAnInstanceOf('DefaultProduct');
    }

    function it_consumes_the_default_resource()
    {
        $defaultResource = new DefaultResource('Something');
        $this->addResource($defaultResource);
        $this->getResources()->shouldHaveCount(1);
    }

    function it_adds_another_default_resource()
    {
        $defaultResource = new DefaultResource('Something');
        $defaultResourceB = new DefaultResource('Something else');
        $this->addResource($defaultResource);
        $this->addResource($defaultResourceB);

        $this->getResources()->shouldHaveCount(2);

    }


}

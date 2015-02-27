<?php

namespace spec\Anneck\Game\Product;

use Anneck\Game\Product\DefaultProductFactory;
use Anneck\Game\Resource\DefaultResource;
use Anneck\Game\Resource\IncompatibleResource;
use Anneck\Game\Worlds\DefaultWorld;
use PhpSpec\ObjectBehavior;

class DefaultProductSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Product');

        $this->beAnInstanceOf('DefaultProduct');
    }

    public function it_consumes_the_default_resource()
    {
        $defaultResource = new DefaultResource('Something');
        /* @noinspection PhpUndefinedMethodInspection */
        $this->addResource($defaultResource);
        /* @noinspection PhpUndefinedMethodInspection */
        $this->getResources()->shouldHaveCount(1);
    }

    public function it_adds_another_default_resource()
    {
        $defaultResource = new DefaultResource('Something');
        $defaultResourceB = new DefaultResource('Something else');

        /* @noinspection PhpUndefinedMethodInspection */
        $this->addResource($defaultResource);
        /* @noinspection PhpUndefinedMethodInspection */
        $this->addResource($defaultResourceB);

        /* @noinspection PhpUndefinedMethodInspection */
        $this->getResources()->shouldHaveCount(2);
    }

    public function it_does_not_add_incompatible_resources()
    {
        $defaultResource = new DefaultResource('Something');
        $incompatibleResource = new IncompatibleResource('Something incompatible');

        /* @noinspection PhpUndefinedMethodInspection */
        $this->addResource($defaultResource);
        /* @noinspection PhpUndefinedMethodInspection */
        $this->addResource($incompatibleResource);

        /* @noinspection PhpUndefinedMethodInspection */
        $this->getResources()->shouldHaveCount(1);
    }

    public function it_builds_a_product_using_a_product_factory()
    {
        $productFactory = DefaultProductFactory::getInstance(new DefaultWorld());
        /* @noinspection PhpUndefinedMethodInspection */
        $this->build($productFactory);
    }
}

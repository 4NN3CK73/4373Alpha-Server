<?php

namespace spec\Anneck\Game\Worlds;

use Anneck\Game\Configuration\DefaultContinentConfiguration;
use Anneck\Game\Configuration\DefaultWorldConfiguration;
use Anneck\Game\Continent\DefaultContinent;
use Anneck\Game\Continent;
use Anneck\Game\Worlds\DefaultWorld;
use Anneck\Game\World;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultWorldSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Worlds\DefaultWorld');
    }

    function it_creates_a_default_world_using_a_world_configuration()
    {
        $worldConfiguration = new DefaultWorldConfiguration();
        $world = new DefaultWorld();

        $this->create($worldConfiguration)->shouldHaveType($world);

        $this->getName()->shouldReturn("default");

        $this->getUUID()->shouldReturn("default");

    }

    function it_returns_a_collection_of_continents()
    {
        $defaultWorlds = [
            'ContinentDefault-1' => new DefaultContinent(new DefaultContinentConfiguration()),
            'ContinentDefault-2' => new DefaultContinent(new DefaultContinentConfiguration()),
            'ContinentDefault-3' => new DefaultContinent(new DefaultContinentConfiguration())
        ];
        $this->getContinents()->shouldHaveCount(3);
        $this->getContinents()->shouldHaveKey('ContinentDefault-1');
        $this->getContinents()->shouldHaveKey('ContinentDefault-2');
        $this->getContinents()->shouldHaveKey('ContinentDefault-3');

    }

}

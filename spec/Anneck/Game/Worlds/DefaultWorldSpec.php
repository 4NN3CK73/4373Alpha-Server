<?php

namespace spec\Anneck\Game\Worlds;

use Anneck\Game\Configuration\DefaultContinentConfiguration;
use Anneck\Game\Configuration\DefaultWorldConfiguration;
use Anneck\Game\Continent\DefaultContinent;
use Anneck\Game\Worlds\DefaultWorld;
use PhpSpec\ObjectBehavior;

class DefaultWorldSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Worlds\DefaultWorld');
    }

    public function it_creates_a_default_world_using_a_world_configuration()
    {
        $worldConfiguration = new DefaultWorldConfiguration();
        $world = new DefaultWorld();

        $this->create($worldConfiguration)->shouldHaveType($world);

        $this->getName()->shouldReturn("default");

        $this->getUUID()->shouldReturn("default");
    }

    public function it_returns_a_collection_of_continents()
    {
        $worldConfiguration = new DefaultWorldConfiguration();
        $world = new DefaultWorld();
        $continentOne = new DefaultContinent(new DefaultContinentConfiguration());
        $continentOne->setGameWorld($world);

        $defaultContinents = [
            'ContinentDefault-1' => $continentOne,
            'ContinentDefault-2' => $continentOne,
            'ContinentDefault-3' => $continentOne,
        ];

        $this->getContinents()->shouldHaveCount(3);
        $this->getContinents()->shouldHaveKey('ContinentDefault-1');
        $this->getContinents()->shouldHaveKey('ContinentDefault-2');
        $this->getContinents()->shouldHaveKey('ContinentDefault-3');
    }
}

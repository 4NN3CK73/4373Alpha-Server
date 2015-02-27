<?php

namespace spec\Anneck\Game\Continent;

use Anneck\Game\Configuration\DefaultContinentConfiguration;
use PhpSpec\ObjectBehavior;

class DefaultContinentSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        // Be created with a configuration ...
        $this->beConstructedWith(new DefaultContinentConfiguration());

        // Default should be Default ...
        $this->shouldHaveType('Anneck\Game\Continent\DefaultContinent');
    }
}

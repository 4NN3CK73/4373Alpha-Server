<?php

namespace spec\Anneck\Game\Continent;

use Anneck\Game\Configuration\DefaultContinentConfiguration;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultContinentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        // Be created with a configuration ...
        $this->beConstructedWith(new DefaultContinentConfiguration());

        // Default should be Default ...
        $this->shouldHaveType('Anneck\Game\Continent\DefaultContinent');
    }

}

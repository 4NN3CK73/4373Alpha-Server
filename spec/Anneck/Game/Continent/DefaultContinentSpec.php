<?php

namespace spec\Anneck\Game\Continent;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultContinentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Continent\DefaultContinent');
    }
}

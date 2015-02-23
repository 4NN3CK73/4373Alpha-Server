<?php

namespace spec\Anneck\Game\Configuration;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameWorldConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Configuration\GameWorldConfiguration');
    }


}

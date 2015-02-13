<?php

namespace spec\Anneck\Game\Resource;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultResourceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Resource\DefaultResource');
    }
}

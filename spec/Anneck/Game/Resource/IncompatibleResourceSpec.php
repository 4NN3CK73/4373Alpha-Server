<?php

namespace spec\Anneck\Game\Resource;

use PhpSpec\ObjectBehavior;

class IncompatibleResourceSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Resource\IncompatibleResource');
    }
}

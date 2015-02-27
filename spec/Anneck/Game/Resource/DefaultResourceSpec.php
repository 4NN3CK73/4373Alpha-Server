<?php

namespace spec\Anneck\Game\Resource;

use PhpSpec\ObjectBehavior;

class DefaultResourceSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedWith('DefaultResourceSpec');
        $this->shouldHaveType('Anneck\Game\Resource\DefaultResource');
    }
}

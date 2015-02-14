<?php

namespace spec\Anneck\Game\Product;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LicencedDefaultProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Product\LicencedDefaultProduct');
    }
}

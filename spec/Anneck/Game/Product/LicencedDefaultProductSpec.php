<?php

namespace spec\Anneck\Game\Product;

use PhpSpec\ObjectBehavior;

class LicencedDefaultProductSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Product\LicencedDefaultProduct');
    }
}

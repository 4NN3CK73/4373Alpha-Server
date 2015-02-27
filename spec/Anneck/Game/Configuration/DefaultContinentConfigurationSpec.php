<?php

namespace spec\Anneck\Game\Configuration;

use PhpSpec\ObjectBehavior;

class DefaultContinentConfigurationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Configuration\DefaultContinentConfiguration');
    }
}

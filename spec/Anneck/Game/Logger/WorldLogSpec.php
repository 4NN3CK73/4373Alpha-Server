<?php

namespace spec\Anneck\Game\Logger;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WorldLogSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Logger\WorldLog');

    }

    public function it_can_add_log_entries()
    {
        $this->addWarning("foo");
    }


}

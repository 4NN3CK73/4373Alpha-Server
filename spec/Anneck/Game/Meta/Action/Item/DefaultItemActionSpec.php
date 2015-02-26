<?php

namespace spec\Anneck\Game\Meta\Action\Item;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultItemActionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Meta\Action\Item\DefaultItemAction');
    }

    function it_can_execute()
    {
        $this->execute();
    }
}

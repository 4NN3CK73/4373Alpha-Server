<?php

namespace spec\Anneck\Game\Meta\Action\Item;

use PhpSpec\ObjectBehavior;

class DefaultItemActionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Anneck\Game\Meta\Action\Item\DefaultItemAction');
    }

    public function it_can_execute()
    {
        $this->execute();
    }
}

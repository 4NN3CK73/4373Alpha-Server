<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 16.03.15, 08:08 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Action;

use Anneck\Game\Features\CreditsFeature;
use Anneck\Game\Features\ItemRegisterFeature;
use Anneck\Game\Features\SingleScoreFeature;
use Anneck\Game\GameInterface;
use Anneck\Game\Item\ItemFactory;
use Anneck\Game\ItemInterface;

/**
 * The CreateItem action.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class CreateItem extends AbstractAction
{
    /**
     * @var ItemInterface the game item to be created.
     */
    private $itemUUID;

    private $itemName;

    /**
     * @param string $UUID the unique ID of the Item to be created.
     */
    public function __construct($UUID, $name = '-default-')
    {
        $this->itemUUID      = $UUID;
        $this->itemName      = $name;
        $this->actionCredits = -250.99;
        $this->actionScore   = 5;
    }

    /**
     * Creates the item specified during construction of this action.
     *
     * @param GameInterface $game the game to change.
     *
     * @return mixed
     */
    public function applyOn(GameInterface $game)
    {
        // We require a game with a register to "create" our item.
        if (!$game instanceof ItemRegisterFeature) {
            $this->throwFeatureMissingException($game, 'ItemRegisterFeature');
        }
        // Create the item using the itemFactory ..
        $newItem = ItemFactory::createGameItem($this->itemUUID, $this->itemName, $game);
        // "Creating" an item in the game is actually putting it into the register.
        $game->addItemToRegister($newItem);

        // action credits
        if (!$game instanceof CreditsFeature) {
            $this->throwFeatureMissingException($game, 'CreditsFeature');
        }
        // Do the credits ...
        $game->addCredits($this->getActionCredits());

        // action score
        if (!$game instanceof SingleScoreFeature) {
            $this->throwFeatureMissingException($game, 'SingleScoreFeature');
        }
        // Do the score ...
        $game->addScore($this->getActionScore());
    }
}

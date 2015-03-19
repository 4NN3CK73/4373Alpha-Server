<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 16:28 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Action;

use Anneck\Game\ActionInterface;
use Anneck\Game\Exception\GameFeatureMissingException;
use Anneck\Game\GameInterface;
use Anneck\Game\GameLogger;

/**
 * The AbstractAction class serves all implementations as a base class.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
abstract class AbstractAction implements ActionInterface
{
    /**
     * Each action has a credit value, can be negative (e.g. usage costs).
     *
     * @var int the credits used or gained
     */
    protected $actionCredits = 0;

    /**
     * Each action has a score value, mostly a positive.
     *
     * @var int the score gained.
     */
    protected $actionScore = 0;

    /**
     * Returns the current value of the action credits.
     *
     * @return int the action credits of this action.
     */
    public function getActionCredits()
    {
        return $this->actionCredits;
    }

    /**
     * Returns the action score value of this action.
     *
     * @return int the action score value of this action.
     */
    public function getActionScore()
    {
        return $this->actionScore;
    }

    /**
     * Returns true if another action has the same short class name.
     *
     * @param ActionInterface $action
     *
     * @return bool
     */
    public function equals(ActionInterface $action)
    {
        return $this->__toString() == $action->__toString();
    }

    /**
     * One default toString implementation ...
     *
     * @return string the shortName of the class.
     */
    public function __toString()
    {
        $reClass = new \ReflectionClass($this);

        return $reClass->getShortName();
    }

    /**
     * Helper method to throw a GameFeatureMissing exception.
     *
     * @param GameInterface $game   The game which is missing a feature interface.
     * @param string        $missingFeature The missing feature interface.
     *
     * @throws GameFeatureMissingException The exception with a sane error message.
     */
    protected function throwFeatureMissingException(GameInterface $game, $missingFeature = '-default-')
    {
        // initialization ...
        $refClass = new \ReflectionClass($game);
        $features = implode(', ', $refClass->getInterfaceNames());
        $errorString = sprintf(
            'The CreateItem Action can only be applied onto a game with %s game feature!',
            'The game %s has the following features %s',
            $missingFeature,
            $game,
            $features
        );
        // Log the error ...
        GameLogger::addToGameLog($errorString, GameLogger::ERROR);
        // Create the exception ...
        $gameExc = new GameFeatureMissingException(
          $errorString
        );
        // throw it ...
        throw $gameExc;
    }
}

<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 12:44 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Item;

use Anneck\Game\ActionInterface;
use Anneck\Game\GameInterface;
use Anneck\Game\GameLogger;
use Anneck\Game\ItemInterface;

/**
 * The AbstractItem.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
abstract class AbstractItem implements ItemInterface
{
    /**
     * @var GameInterface
     */
    private $game;

    /**
     * @var string
     */
    private $name;

    /**
     * @var GameLogger
     */
    private $logger;

    /**
     * @param GameInterface $game
     */
    public function __construct(GameInterface $game)
    {
        $this->game = $game;
        $this->logger = new GameLogger();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param ActionInterface $action
     */
    public function applyAction(ActionInterface $action)
    {
        if ($this->getAvailableActions()->contains($action)) {
            $this->logger->addInfo('ApplyAction '.$action.' on '.$this);
            $action->applyOn($this->getGame());
        } else {
            $this->logger->addWarning('Action: '.$action.' is not one of '.
                implode(
                    ', ',
                    $this->getAvailableActions()->toArray()
                )
            );
        }
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
     * @return mixed
     */
    protected function getGame()
    {
        return $this->game;
    }
}

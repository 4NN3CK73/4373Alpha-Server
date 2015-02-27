<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.02.15, 13:51 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Meta\Action;

use Anneck\Game\Logger\WorldLog;
use Anneck\Game\Meta\ActionInterface;
use Monolog\Logger;

/**
 * The class AbstractAction implements common methods for action's.
 */
abstract class AbstractAction implements ActionInterface
{
    /**
     * @var Logger
     */
    protected $worldLog;
    private $name;

    /**
     * @param string $actionName
     */
    public function __construct($actionName = 'AbstractAction')
    {
        $this->name = $actionName;
        $this->worldLog = new WorldLog();
    }

    /**
     * The method returns the class name.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getType() . '::' . $this->getName();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

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

/**
 * The AbstractItemAction class serves all implementations as a base class.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
abstract class AbstractAction implements ActionInterface
{
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
}

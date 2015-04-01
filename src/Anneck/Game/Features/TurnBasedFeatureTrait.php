<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.03.15, 13:20 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

/**
 * The TurnBasedFeatureTrait.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
trait TurnBasedFeatureTrait
{
    /**
     * @var int
     */
    private $turn = 0;

    /**
     *
     */
    public function nextTurn()
    {
        $this->turn++;
        $this->logger->addInfo('nextTurn('.$this->turn.')');
    }

    /**
     * @return int
     */
    public function getTurn()
    {
        return $this->turn;
    }
}

<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.03.15, 13:16 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

/**
 * The SingleScoreFeatureTrait.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
trait SingleScoreFeatureTrait
{
    /**
     * @var int
     */
    private $score = 0;

    /**
     * @return int
     */
    public function getScore()
    {
        $this->logger->addInfo('getScore: '.$this->score);

        return $this->score;
    }

    /**
     * @param $points
     *
     * @return int
     */
    public function addScore($points)
    {
        $this->logger->addInfo('addScore: '.$this->score);
        $this->score += $points;

        return $this->score;
    }
}

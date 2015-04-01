<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.03.15, 13:06 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

use Anneck\Game\GameLogger;

/**
 * The CreditsFeatureTrait.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
trait CreditsFeatureTrait
{
    /**
     * @var float
     */
    private $credits = 500.00;

    /**
     * @param $creditsToAdd
     */
    public function addCredits($creditsToAdd)
    {
        $testDebit = ($this->credits + $creditsToAdd);
        GameLogger::addToGameLog('TestDebit: '.$testDebit.', creditsToAdd: '.$this->getCredits());
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }
}

<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 19.03.15, 09:11 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

/**
 * The CreditsFeature
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface CreditsFeature
{
    /**
     * @return mixed
     */
    public function getCredits();

    /**
     * @param $credits
     */
    public function addCredits($credits);
}
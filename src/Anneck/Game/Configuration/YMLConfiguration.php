<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 23.02.15, 13:31 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Configuration;

/**
 * Interface YMLConfiguration
 *
 * @package Anneck\Game\Configuration
 */
interface YMLConfiguration
{

    /**
     * @return mixed
     */
    public function loadConfiguration();
}
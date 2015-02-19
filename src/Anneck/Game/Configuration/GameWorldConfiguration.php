<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 19.02.15, 12:30 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Configuration;

class GameWorldConfiguration extends ConfigurationRoot
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct(); // ConfigRoot
        $this->loadConfiguration();
    }
}
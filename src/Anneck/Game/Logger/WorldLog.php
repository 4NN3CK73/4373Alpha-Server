<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 26.02.15, 15:30 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Class WorldLog.
 */
class WorldLog extends Logger
{
    const TMP_WORLD_LOG = '/tmp/World.log';

    public function __construct()
    {
        parent::__construct(__CLASS__);
        $this->pushHandler(
            new StreamHandler(
                self::TMP_WORLD_LOG,
                Logger::DEBUG)
        );
    }
}

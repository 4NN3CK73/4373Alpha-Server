<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 16:15 by 4nn3ck  
 * ************************************************************************
 */

namespace Anneck\Game;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class GameLogger extends Logger {

    public function __construct()
    {
        parent::__construct('GameLog');
        $this->pushHandler(
            new StreamHandler('/tmp/game.log', Logger::DEBUG)
        );
    }
}
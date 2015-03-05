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

/**
 * The GameLogger uses Monolog.
 *
 * @package Anneck\Game
 * @todo    Write PHPDoc for this class!
 * @since   0.0.1-dev
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class GameLogger extends Logger {

    /**
     * Creates the logger.
     */
    public function __construct()
    {
        parent::__construct('GameLog');

        $this->pushHandler(
            new StreamHandler('/tmp/game.log', Logger::DEBUG)
        );
    }
}
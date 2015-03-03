<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 03.03.15, 13:36 by 4nn3ck
 * ************************************************************************
 */

namespace AlphaServerBundle\Services;

use Monolog\Logger;

class GameEngine
{
    private $mailer, $logger;

    public function __construct(\Swift_Mailer $mailer, Logger $logger)
    {
        $this->logger = $logger;
        $this->mailer = $mailer;
    }

    public function nextTurn()
    {
        $this->logger->addNotice('Called nextTurn()');

        return 'GameEngine';
    }
}

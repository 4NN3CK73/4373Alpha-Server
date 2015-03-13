<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 06.03.15, 06:54 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Action;

use Anneck\Game\Exception\GameException;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * The ActionQueueTest.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class ActionQueueTest extends \PHPUnit_Framework_TestCase
{
    public function testSpecification()
    {
        $actionQ = new ActionQueue();
        // only ActionInterface allowed, negative test
        try {
            $actionQ->add('Testing');
            $foo = new ArrayCollection();
            $actionQ->add($foo);
            self::fail('It should not be allowed to inject non ActionInterface objects!');
        } catch (GameException $exception) {
            //
        }
        // only ActionInterface allowed, positive test
        $action = new ScoreOnePoint();
        $actionQ->add($action);
    }
}

<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 24.03.15, 11:49 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\AlphaServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * The TestGameControllerTest.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class TestGameControllerTest extends WebTestCase
{
    public function testFoo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/game-api/foo.json');

        $this->assertTrue($crawler->filter('*:contains("true")')->count() > 0);
    }

    public function testRun()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/game-api/run.json');

        $this->assertTrue($crawler->filter('*:contains("Game-World")')->count() > 0);
        $this->assertTrue($crawler->filter('*:contains("Game-Score")')->count() > 0);
        $this->assertTrue($crawler->filter('*:contains("Game-Turn")')->count() > 0);
    }
}

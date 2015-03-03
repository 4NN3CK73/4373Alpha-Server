<?php

namespace AlphaServerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/GameEngine/Test');

        static::assertTrue($crawler->filter('html:contains("GameEngine")')->count() > 0);
    }
}

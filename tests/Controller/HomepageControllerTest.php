<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageControllerTest extends WebTestCase
{
    public function testHomepageView(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(302);
    }

    public function testLocalHomepageView(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/en/home');
        $this->assertResponseStatusCodeSame(200);
    }
}

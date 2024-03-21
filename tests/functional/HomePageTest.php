<?php

namespace App\Tests\functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageTest extends WebTestCase
{
    public function testHomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();

        $link = $crawler->filter('a.PicturesHover');
        $this->assertCount(3, $link);

        $this->assertSelectorTextContains('h1', 'BIENVENUE CHEZ MISTRAL PANS!');
    }
}

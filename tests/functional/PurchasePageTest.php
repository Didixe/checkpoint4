<?php

namespace App\Tests\functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PurchasePageTest extends WebTestCase
{
    public function testPurchasePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/purchase');

        $this->assertResponseIsSuccessful();

        $instrument = $crawler->filter('.blockBuy');
        $this->assertCount(5, $instrument);

        $this->assertSelectorTextContains('h1', 'La boutique');
    }
}

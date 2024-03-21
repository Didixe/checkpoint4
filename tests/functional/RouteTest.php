<?php

namespace App\Tests\functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RouteTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */

    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertResponseIsSuccessful();
    }

    public function urlProvider()
    {
        yield ['/'];
        yield ['/login'];
        yield ['/production'];
        yield ['/comment'];
        yield ['/purchase'];
        yield ['/rental'];
    }

    /**
     * @dataProvider redirectingUrlProvider
     */

    public function testAdminPagesRedirects($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertResponseRedirects("/login");
    }

    public function redirectingUrlProvider()
    {
        yield ['/admin/comment'];
        yield ['/admin/instrument'];
    }

    public function testPageRedirects()
    {
        $client = self::createClient();

        $client->request('GET', "/admin/comment");
        $this->assertResponseRedirects("/login");

        $client->request('GET', "/admin/instrument");
        $this->assertResponseRedirects("/login");

        $client->request('GET', "/logout");
        $this->assertResponseRedirects("/");

    }

}

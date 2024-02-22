<?php

namespace App\Tests\Functional;

use App\Entity\Instrument;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class InstrumentAdminPageTest extends WebTestCase
{
    public function testIfCreateInstrumentIsSuccessfull(): void
    {
        $client = static::createClient();

        // Récuperer l'urlgenerator
        $urlGenerator = $client->getContainer()->get('router');

        // Recuperer l'entity manager
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        $user = $entityManager->find(User::class, 1);

        $client->loginUser($user);

        //Se rendre sur la page de création d'un instrument
        $crawler = $client->request(Request::METHOD_GET, $urlGenerator->generate('app_admin_instrument_new')
        );

        //Gérer le formulaire
        $form = $crawler->filter('form[name=instrument]')-> form([
            'instrument[Name]' => "Hokkaido",
            'instrument[Materials]' => 'acier inoxydable',
            'instrument[Tuning]' => '440 Hz',
            'instrument[Note_Number]' => '9',
            'instrument[pictureFile][file]' =>  'Pan2.png',
            'instrument[Price]' => '1900 €',
            'instrument[Status]' => 'Achat',
        ]);

        $client->submit($form);

        //Gérer la redirection
        $this->assertResponseStatusCodeSame(303);

        $client->followRedirect();

    }

    public function testIfUpdateAnInstrumentIsSuccessfull() :void
    {
        $client = static::createClient();

        $urlGenerator = $client->getContainer()->get('router');
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        $user = $entityManager->find(User::class, 1);
        $instrument = $entityManager->getRepository(Instrument::class)->findOneBy([]);

        $client->loginUser($user);

        $crawler =$client->request(
            Request::METHOD_GET,
            $urlGenerator->generate('app_admin_instrument_edit', ['id' => $instrument->getId()])
        );

        $this->assertResponseIsSuccessful();

        $form = $crawler->filter('form[name=instrument]')-> form([
            'instrument[Name]' => "Hokkaido",
            'instrument[Materials]' => 'acier inoxydable',
            'instrument[Tuning]' => '440 Hz',
            'instrument[Note_Number]' => '9',
            'instrument[pictureFile][file]' =>  'Pan2.png',
            'instrument[Price]' => '1900 €',
            'instrument[Status]' => 'Achat',
        ]);

        $client->submit($form);

        $this->assertResponseStatusCodeSame(303);

        $client->followRedirect();

        $this->assertRouteSame('app_admin_instrument_index');

    }

    public function testIfDeleteAnInstrumentIsSucessfull(): void
    {
        $client = static::createClient();

        $urlGenerator = $client->getContainer()->get('router');
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        $user = $entityManager->find(User::class, 1);
        $instrument = $entityManager->getRepository(Instrument::class)->findOneBy([]);

        $client->loginUser($user);

        $crawler = $client->request(
            Request::METHOD_GET,
            $urlGenerator->generate('app_admin_instrument_delete', ['id' => $instrument->getId()])
        );

        $form = $crawler->filter('form[action="' . $urlGenerator->generate('app_admin_instrument_delete', ['id' => $instrument->getId()]) . '"]')->form();

        $client->submit($form);

        $this->assertResponseStatusCodeSame(303);

        $client->followRedirect();

        $this->assertRouteSame('app_admin_instrument_index');
    }

}

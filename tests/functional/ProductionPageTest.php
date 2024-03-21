<?php

namespace App\Tests\functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ProductionPageTest extends WebTestCase
{
    public function testProductionPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/production');

        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('h1', 'Fabrication sur mesure');

        $button = $crawler->selectButton('Envoyer');
        $this->assertCount(1, $button);

        //Récuperer le formulaire
        $form = $button->form();

        $form["form[client][Name]"] = "Toto";
        $form["form[client][Email]"] = "toto@toto.fr";
        $form["form[production][Materials]"] = "Acier Nitruré";
        $form["form[production][Tuning]"] = "432 Hz";
        $form["form[production][Note_Number]"] = "9";

        //soumetre le formulaire
        $client->submit($form);

        //Vérifier le statue HTTP
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        //Vérifier l'envoie du mail
        $this->assertEmailCount(1);

        $client->followRedirect();

        //Vérifier la présence du message de succès
        $this->assertSelectorTextContains(
            '.alert.alert-success',
            'Votre demande de production a bien été prise en compte. Nous vous recontacterons dans les plus brefs délais.'
        );

        //Vérifier que l'on se trouve sur la page d'acceuil
        $this->assertSelectorTextContains('h1', 'BIENVENUE CHEZ MISTRAL PANS!');


    }
}

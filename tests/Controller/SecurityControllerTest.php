<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLoginUnknownUser(): void
    {
        $client = static::createClient();

        // On fais la requete pour se loger à la page
        $crawler = $client->request('GET', '/login');

        // On remplis le formulaire avec un user inexistant
        $form = $crawler->selectButton('Se connecter')->form([
            'email' => 'unknown@test.com',
            'password' => 'password',
        ]);

        // On envoie le formulaire
        $client->submit($form);

        // on fais une assertion pour qu'on soit rediger au tableau de bord
        $this->assertResponseRedirects('/login');

        // Suivi de la Redirection
        $client->followRedirect();

        // Vérifie qu'un élément avec la classe alert alert-danger existe, indiquant un message d'erreur.
        $this->assertSelectorExists('.alert.alert-danger');
    }
}

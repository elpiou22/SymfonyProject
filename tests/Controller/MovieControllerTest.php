<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Movie;

class MovieControllerTest extends WebTestCase
{

    public function testCreateMovie()
    {
    $client = static::createClient();


    $crawler = $client->request('GET', '/create');


    $this->assertResponseIsSuccessful();
    $this->assertSelectorTextContains('h1', 'Create Movie');


    $form = $crawler->selectButton('Save')->form();
    $form['movie[title]'] = 'Test Movie';
    $form['movie[releaseDate]'] = '2024-11-12';
    $form['movie[ageRequirement]'] = 18;

    $client->submit($form);


    $this->assertResponseRedirects('/');
    $movieRepository = $this->getContainer()->get('doctrine')->getRepository(Movie::class);
    $movie = $movieRepository->findOneBy(['title' => 'Test Movie']);
    $this->assertNotNull($movie);
    }


}

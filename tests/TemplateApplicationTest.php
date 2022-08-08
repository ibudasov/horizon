<?php
declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TemplateApplicationTest extends WebTestCase
{
    /** @test  */
    function givenThereAreTemplates_whenRequested_thenAllOfThemReturned(): void
    {
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/templates');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
    }

    /** @test  */
    function givenValidRequest_whenRequestedToCreateATemplate_thenTemplateCreated(): void
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/templates', ['name' => 'banaan']);

        $this->assertResponseIsSuccessful();
    }
}

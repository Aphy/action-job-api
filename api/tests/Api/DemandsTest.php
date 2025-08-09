<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class DemandsTest extends ApiTestCase
{
    public function testCreateDemand(): void
    {
        static::createClient()->request('POST', '/demands', [
            'json' => [
                'title' => 'Demand title',
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@id' => '/demands/1',
            '@type' => 'Demand',
            'id' => 1,
            'title' => 'Demand title',
            'content' => '',
            'author' => '',
            'signatures' => []
        ]);
    }
}

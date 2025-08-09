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
            '@context' => '/contexts/Demand',
            '@type' => 'Demand',
            'name' => 'Demand title',
        ]);
    }
}

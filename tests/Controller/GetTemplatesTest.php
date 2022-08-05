<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use App\Controller\GetTemplates;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetTemplatesTest extends TestCase
{
    /** @test */
    function given_when_thenAll(): void
    {
        $class = new GetTemplates();
        $this->assertInstanceOf(JsonResponse::class, $class->all());
    }
}

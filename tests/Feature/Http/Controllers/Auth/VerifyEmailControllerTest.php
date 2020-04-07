<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @coversDefaultClass \App\Http\Controllers\Auth\VerifyEmailController
 */
class VerifyEmailControllerTest extends TestCase
{
    /**
     * @covers ::verify
     */
    public function testVerifyEmailWithValidToken()
    {
        self::markTestIncomplete();
    }

    /**
     * @covers ::verify
     */
    public function testVerifyEmailWithInvalidToken()
    {
        self::markTestIncomplete();
    }

    /**
     * @covers ::generate
     */
    public function testGenerateConfirmationToken()
    {
        self::markTestIncomplete();
    }
}

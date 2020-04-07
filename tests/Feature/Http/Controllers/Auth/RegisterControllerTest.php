<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Events\UserHasRegistered;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Factories\UserFactory;
use Tests\TestCase;

/**
 * @coversDefaultClass  \App\Http\Controllers\Auth\RegisterController
 */
class RegisterControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @covers ::register
     */
    public function testRegisterAccount()
    {
        $this->expectsEvents(UserHasRegistered::class);
        $user = UserFactory::new()->make();
        $response = $this->post(route('register'), [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'secret1'
        ]);

        $response->assertStatus(201);
        $response->assertJson(['message' => 'User has been created.']);
        $this->assertDatabaseHas('users', ['name' => $user->name, 'email' => $user->email]);
    }

    /**
     * @covers ::register
     */
    public function testRegisterWithMissingInformation()
    {
        // missing email
        $response = $this->post(route('register'), [
            'name' => 'Foo bar',
            'password' => 'secret1'
        ]);
        $response->assertStatus(422);
        $response->assertJson([]);
    }
}

<?php

namespace Tests\Feature\Events;

use App\Events\UserHasRegistered;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Testing\Fakes\EventFake;
use Tests\Factories\UserFactory;
use Tests\TestCase;

class UserHasRegisteredTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var EventFake
     */
    private $dispatcher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->dispatcher = app(EventFake::class);
    }

    public function testUserHasRegisteredEvent()
    {
        $user = UserFactory::new()->make();
        $this->dispatcher->dispatch(new UserHasRegistered($user));
        $this->dispatcher->assertDispatched(UserHasRegistered::class, function (UserHasRegistered $e) use ($user) {
            return $e->user === $user;
        });
        $this->assertTrue($this->dispatcher->hasListeners(UserHasRegistered::class));
    }
}

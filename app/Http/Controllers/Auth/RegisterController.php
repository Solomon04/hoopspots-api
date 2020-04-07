<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserHasRegistered;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Auth
 */
class RegisterController extends Controller
{
    /**
     * @var Hasher
     */
    private $hash;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(Hasher $hash, Dispatcher $dispatcher, UserRepository $userRepository)
    {
        $this->hash = $hash;
        $this->dispatcher = $dispatcher;
        $this->userRepository = $userRepository;
    }


    /**
     * Registration
     * Register a new user to the system.
     * @bodyParam name string required The name of the user. Example: Kevin Durant
     * @bodyParam email string required The email of the user. Example kd35@nets.com
     * @bodyParam password string required The password of user. Must be over 6 characters. Example: secret1
     * @response 201 {"message": "User has been created."}
     * @response 422 {"message": ":attribute field is required"}
     *
     * @param Request $request
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ]);

        $data = $request->all();
        $data['password'] = $this->hash->make($request->password);
        $user = $this->userRepository->create($data);
        $this->dispatcher->dispatch(new UserHasRegistered($user));

        return response(['message' => 'User has been created.'], Response::HTTP_CREATED);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationToken;
use App\Repositories\ConfirmationTokenRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Auth
 */
class VerifyEmailController extends Controller
{
    /**
     * @var Encrypter
     */
    private $crypt;

    /**
     * @var ConfirmationTokenRepository
     */
    private $tokenRepository;

    public function __construct(Encrypter $crypt, ConfirmationTokenRepository $tokenRepository)
    {
        $this->crypt = $crypt;
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * Email Verification
     * Verify a user's email.
     * @urlParam token required The encrypted token used for verification.
     *
     * @param $token
     * @return ResponseFactory|RedirectResponse|\Illuminate\Http\Response|Redirector
     */
    public function verify($token)
    {
        $token = $this->crypt->decrypt($token);

        /** @var ConfirmationToken $confirmationToken */
        $confirmationToken = $this->tokenRepository->findWhere(['token' => $token])->first();
        if(is_null($confirmationToken)){
            // should return a view
            return response(['message' => 'This token does not exist.'], Response::HTTP_NOT_FOUND);
        }

        if(Carbon::parse($confirmationToken->expiration_date)->isPast()){
            // should return a view
            return response(['message' => 'This token is no longer valid.'], Response::HTTP_BAD_REQUEST);
        }

        $confirmationToken->user()->update(['email_verified_at' => Carbon::now()]);

        // should return a view
        return redirect();
    }

    public function generate(Request $request)
    {

    }
}

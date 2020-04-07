<?php

namespace App\Mail;

use App\Models\ConfirmationToken;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserWelcomeMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var ConfirmationToken
     */
    private $confirmationToken;

    /**
     * Create a new message instance.
     *
     * @param ConfirmationToken $confirmationToken
     */
    public function __construct(ConfirmationToken $confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.user.welcome')
            ->subject('Welcome To Hoop Spots 🏀📍')
            ->with(['name' => $this->confirmationToken->user->name]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\LandlordTenantConversation;
use App\Tenant;

class LandlordTenantEmailConversation extends Mailable
{
    use Queueable, SerializesModels;
    public $conversation;
    public $tenant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LandlordTenantConversation $conversation, Tenant $tenant)
    {
        $this->conversation = $conversation;
        $this->tenant = $tenant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@cnx247.com',config('app.name'))
        ->subject(config('app.name').' - '.$this->conversation->subject)
        ->markdown('mails.tenant.landlordtenantemailconversation');
    }
}

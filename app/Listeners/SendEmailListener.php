<?php

namespace Wp\Utility\Email\Listeners;

use Wp\Utility\Email\Events\SendEmailEvent;
use Illuminate\Support\Facades\Mail;

class SendEmailListener
{
    /**
     * Handle the event.
     *
     * @param  SendEmailEvent  $event
     * @return void
     */
    public function handle(SendEmailEvent $event)
    {
        $data = $event->data;
        Mail::alwaysFrom($data['from']['email'], $data['from']['name']);
        Mail::alwaysReplyTo($data['reply']['email'], $data['reply']['name']);
        Mail::send([], [], function ($message) use ($data) {
            $message->to($data['to']['email'], $data['to']['name'])
                ->from($data['from']['email'], $data['from']['name'])
                ->replyTo($data['reply']['email'], $data['reply']['name'])
                ->subject($data['subject'])
                ->setBody($data['msg'], 'text/html');
        });
    }
}

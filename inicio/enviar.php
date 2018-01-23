<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 22/01/2018
 * Time: 7:39 PM
 */

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

session_start();

class MailResetPasswordToke extends Notification{
    use Queueable;

    public $token;

    public function _constructor($token){
        $this->token = $token;
    }

    public function via($notifiable){
        return ['mail'];
    }

    public function toMail($notifiable){
        return (new MailMessage)
            ->subject("Reset Password")
            ->
    }
}
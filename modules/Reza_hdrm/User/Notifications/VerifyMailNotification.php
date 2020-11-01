<?php

namespace Reza_hdrm\User\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Reza_hdrm\User\Mail\VerifyCodeMail;
use Reza_hdrm\User\Models\User;
use Reza_hdrm\User\Services\VerifyCodeService;

class VerifyMailNotification extends Notification
{
    use Queueable;

    /**
     * @var User
     */


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct() {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return VerifyCodeMail
     * @throws \Exception
     */
    public function toMail($notifiable): VerifyCodeMail {

        $code = VerifyCodeService::codeGenerate();

        VerifyCodeService::store($notifiable->id, $code, Carbon::now()->addDay());

        return (new VerifyCodeMail($code))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable): array {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use App\Services\General\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailTemplateNotification extends Notification implements ShouldQueue
{
    use Queueable;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var array
     */
    private $data;
    /**
     * @var array
     */
    private $variables;
    /**
     * @var string
     */
    private $from;
    /**
     * @var string
     */
    private $attach;
    /**
     * @var EmailTemplateService
     */
    private $emailTemplateService;

    /**
     * Create a new notification instance.
     *
     * @param string $slug
     * @param array $data
     * @param EmailTemplateService $emailTemplateService
     */
    public function __construct(string $slug, array $data)
    {
        $this->slug = $slug;
        $this->variables            = $data['variables'] ?? [];
        $this->from                 = $data['from'] ?? '';
        $this->attach               = $data['attach'] ?? '';
        $this->emailTemplateService = app(EmailTemplateService::class);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $content = $this->emailTemplateService->getContent(
            $this->slug,
            $this->variables
        );

        $mail = (new MailMessage)
            ->markdown('emails.layout', ['content' => $content->content])
            ->subject($content->subject ?? '');

        if (!empty($content->email_from)) {
            $mail->from($content->email_from);
        }

        if (!empty($this->attach)) {
            if (config('filesystems.default') == 'public') {
                $mail->attach(public_path($this->attach));
            } elseif (config('filesystems.default') == 's3') {
                $mail->attach(Storage::disk('s3')->url($this->attach));
            } else {
                $mail->attach(storage_path("app/public/".$this->attach));
            }
        }

        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

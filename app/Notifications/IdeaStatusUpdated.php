<?php

namespace App\Notifications;

use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdeaStatusUpdated extends Notification
{
    use Queueable;

    public $idea;

    /**
     * Create a new notification instance.
     */
    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Mise à jour du statut de votre idée')
        ->greeting('Bonjour ' . $notifiable->name . ',')
        ->line("Le statut de votre idée intitulée **{$this->idea->title}** a été mis à jour.")
        ->line("Nouveau statut : **" . strtoupper($this->idea->status) . "**")
        ->action('Voir votre idée', url('/ideas/' . $this->idea->id))
        ->line('Merci de votre participation !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

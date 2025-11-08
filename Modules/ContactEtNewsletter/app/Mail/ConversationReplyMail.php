<?php

namespace Modules\ContactEtNewsletter\Mail;

use App\Models\HomeContent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConversationReplyMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * L'objet Conversation et le contenu du message sont passés au Mailable.
     */
    public Conversation $conversation;
    public string $content;

    /**
     * Crée une nouvelle instance de message.
     */
    public function __construct(Conversation $conversation, string $content)
    {
        $this->conversation = $conversation;
        $this->content = $content;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Re: ' . $this->conversation->subject . ' [' . $this->conversation->id . ']',
        );
    }

    /**
     * Obtient le contenu du message.
     */
    public function content(): Content
    {
        return new Content(

            view: 'contactetnewsletter::mail.conversation-reply',
            with: [
                'content' => $this->content,
                'conversation' => $this->conversation,
                'logo' => HomeContent::first()->meta['og:image']
            ],
        );
    }
}

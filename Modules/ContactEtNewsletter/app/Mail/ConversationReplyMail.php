<?php

namespace Modules\ContactEtNewsletter\Mail;

use App\Models\HomeContent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\ContactEtNewsletter\Models\Messaging\Conversation;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConversationReplyMail extends Mailable implements ShouldQueue
{
    use  SerializesModels;

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

    public function build(): ConversationReplyMail
    {
        return $this->subject('Re: ' . $this->conversation->subject . ' [' . $this->conversation->id . ']')
            ->view('contactetnewsletter::mail.conversation-reply', [
                'content' => $this->content,
                'conversation' => $this->conversation,
                'logo' => HomeContent::first()->meta['og:image'] ?? null
            ]);
    }

}

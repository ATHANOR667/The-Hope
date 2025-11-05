<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\Messaging;

use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Messaging\Message;

class MessageComponent extends Component
{

    public Message $message;

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('contactetnewsletter::livewire.admin.messaging.message-component');
    }
}

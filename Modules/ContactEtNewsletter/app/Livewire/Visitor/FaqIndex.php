<?php

namespace Modules\ContactEtNewsletter\Livewire\Visitor;

use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Faq;
use Illuminate\Database\Eloquent\Collection;


class FaqIndex extends Component
{

    public string $search = '';


    public function getFaqsProperty(): Collection
    {
        return Faq::query()
            ->published()
            ->when($this->search, fn($q) => $q
                ->where('question', 'like', "%{$this->search}%")
                ->orWhere('answer', 'like', "%{$this->search}%")
            )
            ->orderBy('order')
            ->get();
    }


    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('contactetnewsletter::livewire.visitor.faq-index');
    }

}

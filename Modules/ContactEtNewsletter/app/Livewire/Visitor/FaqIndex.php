<?php

namespace Modules\ContactEtNewsletter\Livewire\Visitor;

use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Faq;
use Illuminate\Database\Eloquent\Collection;

class FaqIndex extends Component
{
    public string $search = '';
    public array $openFaq = [];


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


    public function toggleFaq(int $faqId): void
    {
        $this->openFaq[$faqId] = !($this->openFaq[$faqId] ?? false);
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.visitor.faq-index');
    }
}

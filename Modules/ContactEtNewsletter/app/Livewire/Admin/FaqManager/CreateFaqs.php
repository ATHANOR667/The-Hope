<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\FaqManager;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Faq;

class CreateFaqs extends Component
{
    public $showModal = false;
    public $question = '';
    public $answer = '';
    public $order;
    public $is_published = false;



    protected $rules = [
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
        'order' => 'required|integer|min:0|max:100|unique:faqs,order',
        'is_published' => 'boolean',
    ];

    public function mount(): void
    {
        $this->order = min(Faq::max('order') + 10, 100);
    }

    #[On('open-create-faq')]
    public function open(): void
    {
        $this->reset();
        $this->order = Faq::max('order') + 1;
        $this->showModal = true;
    }

    public function updated($property): void
    {
        if ($property === 'order') {
            $this->validateOnly('order');
        }
    }

    public function save(): void
    {
        $this->validate();

        // Si order existe → décale les suivants
        $existing = Faq::where('order', $this->order)->first();
        if ($existing) {
            Faq::where('order', '>=', $this->order)->increment('order', 10);
        }

        Faq::create($this->only(['question', 'answer', 'order', 'is_published']));

        $this->close();
        $this->dispatch('faq-updated');
    }

    public function close(): void
    {
        $this->showModal = false;
        $this->reset();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.admin.faq-manager.create-faq');
    }








}

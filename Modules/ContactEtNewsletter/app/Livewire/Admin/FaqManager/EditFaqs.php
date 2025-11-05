<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\FaqManager;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\ContactEtNewsletter\Models\Faq;

class EditFaqs extends Component
{
    public $showModal = false;
    public $faqId;
    public $question, $answer, $order, $is_published;

    protected function rules(): array
    {
        return [
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'required|integer|min:0|max:100|unique:faqs,order,' . $this->faqId,
            'is_published' => 'boolean',
        ];
    }


    #[On('open-edit-faq')]
    public function open($faqId): void
    {
        $faq = Faq::findOrFail($faqId);
        $this->faqId = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->order = $faq->order;
        $this->is_published = $faq->is_published;
        $this->showModal = true;
    }

    public function close(): void
    {
        $this->showModal = false;
        $this->reset();
    }


    public function save(): void
    {
        $this->validate();

        $oldOrder = Faq::find($this->faqId)->order;

        if ($this->order != $oldOrder) {
            $existing = Faq::where('order', $this->order)->first();
            if ($existing) {
                Faq::where('order', '>=', $this->order)->increment('order', 10);
            }
        }

        Faq::find($this->faqId)->update($this->only(['question', 'answer', 'order', 'is_published']));

        $this->close();
        $this->dispatch('faq-updated');
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('contactetnewsletter::livewire.admin.faq-manager.edit-faq');
    }
}

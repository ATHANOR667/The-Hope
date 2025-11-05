<?php

namespace Modules\ContactEtNewsletter\Livewire\Admin\FaqManager;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\ContactEtNewsletter\Models\Faq;

class ListFaqs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';


    public function mount(): void
    {
        $this->listenForUpdates();
    }

    #[On('faq-updated')]
    public function listenForUpdates(): void
    {
        $this->dispatch('$refresh');
    }



    public function openCreateModal(): void
    {
        $this->dispatch('open-create-faq');
    }

    public function openEditModal($faqId): void
    {
        $this->dispatch('open-edit-faq', faqId: $faqId);
    }

    public function togglePublished($faqId): void
    {
        $faq = Faq::find($faqId);
        $faq->update(['is_published' => !$faq->is_published]);
        $this->dispatch('faq-updated');
    }

    public function delete($faqId): void
    {
        Faq::find($faqId)->delete();
        $this->dispatch('faq-updated');
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $faqs = Faq::orderBy('order')->paginate(10);
        return view('contactetnewsletter::livewire.admin.faq-manager.list-faqs', compact('faqs'));
    }
}

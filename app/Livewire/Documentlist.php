<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Documents;

class Documentlist extends Component
{
    public $documents;
    public $previewDocument = null;

    protected $listeners = ['documentUploaded' => 'refreshDocuments'];

    public function mount()
    {
        $this->refreshDocuments();
    }

    public function refreshDocuments()
    {
        $this->documents = Documents::latest()->get();
    }

    public function preview($documentId)
    {
        $this->previewDocument = Documents::find($documentId);
    }
    public function render()
    {
        return view('livewire.documentlist');
    }
}

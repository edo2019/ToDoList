<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Documents;
use Livewire\WithFileUploads;

class Documentupload extends Component
{
    use WithFileUploads;

    public $name;
    public $document;
    public $isUploading = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'document' => 'required|file|mimes:pdf|max:2048'
    ];

    public function save()
    {
        $this->validate();
        $this->isUploading = true;

        try {
            $filePath = $this->document->store('documents', 'public');

            Documents::create([
                'name' => $this->name,
                'file_path' => $filePath
            ]);

            $this->reset(['name', 'document']);
            $this->emit('documentUploaded');
            $this->dispatchBrowserEvent('notify', 'Document uploaded successfully!');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('notify', 'Error: ' . $e->getMessage());
        }

        $this->isUploading = false;
    }
    public function render()
    {
        return view('livewire.documentupload');
    }
}

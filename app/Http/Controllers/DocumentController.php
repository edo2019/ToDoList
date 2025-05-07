<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Documents::All();
        return view('livewire.todo-list', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf|max:2048'
        ]);

        // Remove 'public/' from the path
        $filePath = $request->file('document')->store('documents', 'public');

        Documents::create([
            'name' => $request->name,
            'file_path' => $filePath // This will now be "documents/filename.pdf"
        ]);

        return redirect()->route('documents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function preview(Documents $document)
    {
        // Get the correct path using Storage facade
        $filePath = storage_path('app/public/' . $document->file_path);

        // Debugging - remove after confirmation
        logger()->info('Preview attempt', [
            'expected_path' => $filePath,
            'exists' => file_exists($filePath)
        ]);

        if (!file_exists($filePath)) {
            abort(404, "File not found at: " . $filePath);
        }

        return response()->file($filePath);
    }
}

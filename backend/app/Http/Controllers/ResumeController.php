<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
    /**
     * Upload a resume file to Azure Blob Storage
     */
    public function upload(Request $request)
    {
        // Step 1: Validate the incoming file
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Step 2: Generate a unique filename
        $file = $request->file('resume');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Step 3: Store the file
       $path = $file->storeAs('', $filename, 'azure');

        // Step 4: Return success response
        return response()->json([
            'success'  => true,
            'message'  => 'Resume uploaded successfully',
            'filename' => $filename,
            'path'     => $path,
        ], 201);
    }

    /**
     * Get a specific resume by ID
     */
    public function show(string $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Resume retrieved',
            'id'      => $id,
        ]);
    }

    /**
     * Analyze a resume using Claude AI
     */
    public function analyze(string $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Analysis coming soon',
            'id'      => $id,
        ]);
    }
}
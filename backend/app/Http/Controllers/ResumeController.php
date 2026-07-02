<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Resume;

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

        // Step 2: Get file details
        $file          = $request->file('resume');
        $originalName  = $file->getClientOriginalName();
        $filename      = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $size          = $file->getSize();

        // Step 3: Upload to Azure Blob Storage
        $path = $file->storeAs('', $filename, 'azure');

        // Step 4: Save record to database
        $resume = Resume::create([
            'original_name' => $originalName,
            'filename'      => $filename,
            'path'          => $path,
            'size'          => $size,
            'status'        => 'uploaded',
        ]);

        // Step 5: Return success response
        return response()->json([
            'success'  => true,
            'message'  => 'Resume uploaded successfully',
            'data'     => [
                'id'            => $resume->id,
                'original_name' => $resume->original_name,
                'filename'      => $resume->filename,
                'size'          => $resume->size,
                'status'        => $resume->status,
                'uploaded_at'   => $resume->created_at,
            ]
        ], 201);
    }

    /**
     * Get a specific resume by ID
     */
    public function show(string $id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return response()->json([
                'success' => false,
                'message' => 'Resume not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $resume,
        ]);
    }

    /**
     * Analyze a resume using Claude AI
     */
    public function analyze(string $id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return response()->json([
                'success' => false,
                'message' => 'Resume not found',
            ], 404);
        }

        // Update status to analyzing
        $resume->update(['status' => 'analyzing']);

        return response()->json([
            'success' => true,
            'message' => 'Analysis started — Claude AI integration coming next!',
            'data'    => $resume,
        ]);
    }
}
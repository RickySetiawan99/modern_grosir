<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class FileUploadService
{
    /**
     * Upload a file and return the path
     */
    public function upload(UploadedFile $file, $directory = 'uploads', $oldFile = null)
    {
        // Delete old file if exists
        if ($oldFile) {
            $this->delete($oldFile);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $directory . '/' . $filename;
        
        $file->move(public_path($directory), $filename);

        return $path;
    }

    /**
     * Delete a file
     */
    public function delete($path)
    {
        $fullPath = public_path($path);
        if ($path && File::exists($fullPath)) {
            File::delete($fullPath);
            return true;
        }
        return false;
    }
}

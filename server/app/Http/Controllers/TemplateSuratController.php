<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateSurat;
use Illuminate\Support\Facades\Storage;

class TemplateSuratController extends Controller
{
    public function createTemplate(Request $request)
    {
        $request->validate([
            'judul_surat' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf,docx,doc,jpg,png|max:10240', // File validation
        ]);

        $filePath = $request->file('file_surat')->store('template_surat_files', 'public');

        TemplateSurat::create([
            'judul_surat' => $request->judul_surat,
            'file_surat' => $filePath,
        ]);

        return redirect()->back()->with('OK', 'Berhasil menambahkan template surat');
    }

    public function editTemplate(Request $request, $id)
    {
        $template = TemplateSurat::find($id);

        $request->validate([
            'judul_surat' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf,docx,doc,jpg,png|max:10240', // File validation
        ]);

        if ($request->hasFile('file_surat')) {
            // Delete old file
            Storage::disk('public')->delete($template->file_surat);

            // Store the new file
            $filePath = $request->file('file_surat')->store('template_surat_files', 'public');
            $template->file_surat = $filePath;
        }

        $template->judul_surat = $request->judul_surat;
        $template->save();

        return redirect()->back()->with('OK', 'Berhasil mengedit template surat');
    }

    public function deleteTemplate($id)
    {
        $template = TemplateSurat::find($id);
        Storage::disk('public')->delete($template->file_surat); // Delete the file from storage
        $template->delete();

        return redirect()->back()->with('OK', 'Berhasil menghapus template surat');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateKeyword;
use App\Models\TemplateSurat;

class TemplateKeywordController extends Controller
{
    // Display all keywords for a specific template surat
    public function index($template_surat_id)
    {
        $templateSurat = TemplateSurat::findOrFail($template_surat_id);
        $keywords = TemplateKeyword::where('template_surat_id', $template_surat_id)->get();

        return view('pages.template-keywords.index', compact('templateSurat', 'keywords'));
    }

    // Create a new keyword
    public function create(Request $request)
    {
        $request->validate([
            'template_surat_id' => 'required|exists:template_surats,id',
            'label' => 'required|string|max:255',
            'kode' => 'required|string|max:255',
        ]);

        if ($request->sumber_data == 'Tidak Ada') {
            $request->sumber_data = null;
        }

        TemplateKeyword::create([
            'template_surat_id' => $request->template_surat_id,
            'label' => $request->label,
            'kode' => $request->kode,
            'sumber_data' => $request->sumber_data,
        ]);

        return redirect()->route('template-keywords.index', $request->template_surat_id)
                         ->with('OK', 'Keyword berhasil ditambahkan.');
    }

    // Edit an existing keyword
    public function edit(Request $request, $id)
    {
        $keyword = TemplateKeyword::findOrFail($id);

        $request->validate([
            'label' => 'required|string|max:255',
            'kode' => 'required|string|max:255',
            'sumber_data' => 'nullable|in:nik,nama,alamat',
        ]);

        $keyword->update([
            'label' => $request->label,
            'kode' => $request->kode,
            'sumber_data' => $request->sumber_data,
        ]);

        return redirect()->route('template-keywords.index', $keyword->template_surat_id)
                         ->with('OK', 'Keyword berhasil diupdate.');
    }

    // Delete a keyword
    public function delete($id)
    {
        $keyword = TemplateKeyword::findOrFail($id);
        $template_surat_id = $keyword->template_surat_id;
        $keyword->delete();

        return redirect()->route('template-keywords.index', $template_surat_id)
                         ->with('OK', 'Keyword berhasil dihapus.');
    }
}

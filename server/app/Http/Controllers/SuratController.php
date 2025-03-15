<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\TemplateSurat;
use App\Models\TemplateKeyword;
use App\Models\SuratData;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $surats = Surat::with('templateSurat')->get(); // Fetch all "Surat" data with related "template_surat"
        } else {
            $surats = Surat::where('user_id', Auth::user()->id)->with('templateSurat')->get(); // Fetch all "Surat" data with related "template_surat"
        }

        // Calculate the average rating for each template_surat
        foreach ($surats as $surat) {
            $templateSurat = $surat->templateSurat;

            // Calculate the average rating for the template_surat
            $averageRating = Rating::where('template_surat_id', $templateSurat->id)->avg('rating');

            // Store the average rating in the 'templateSurat' property
            $templateSurat->averageRating = number_format($averageRating, 1); // Format to 1 decimal place
        }

        return view('pages.surat.index', compact('surats'));
    }


    public function create()
    {
        $templates = TemplateSurat::all(); // Fetch all templates for dropdown
        return view('pages.surat.create', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'template_surat_id' => 'required|exists:template_surats,id',
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',  // Add validation for KTP file
            'kk' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',   // Add validation for KK file
            'surat_keterangan_rt' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048', // Add validation for Surat Keterangan RT
        ]);

        $surat = Surat::create([
            'user_id' => Auth::id(), // Current logged-in user's ID
            'template_surat_id' => $request->template_surat_id,
        ]);

        // Handling file uploads
        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('uploads/ktp', 'public');
            $surat->update([
                'ktp' => $ktpPath
            ]);
            // Save the file path or associate it with the Surat data (e.g., using a model or separate table)
        }

        if ($request->hasFile('kk')) {
            $kkPath = $request->file('kk')->store('uploads/kk', 'public');
            $surat->update([
                'kk' => $kkPath
            ]);
            // Save the file path or associate it with the Surat data
        }

        if ($request->hasFile('surat_keterangan_rt')) {
            $suratKeteranganRtPath = $request->file('surat_keterangan_rt')->store('uploads/surat_keterangan_rt', 'public');
            $surat->update([
                'surat_keterangan_rt' => $suratKeteranganRtPath
            ]);
            // Save the file path or associate it with the Surat data
        }

        // Fetch and process template keywords as before
        $keywords = TemplateKeyword::where('template_surat_id', $request->template_surat_id)->get();

        foreach ($keywords as $keyword) {
            $surat_data = SuratData::create([
                'surat_id' => $surat->id,
                'label' => $keyword->label,
                'kode' => $keyword->kode,
                'sumber_data' => $keyword->sumber_data,
            ]);

            if ($keyword->sumber_data == 'nik') {
                $surat_data->update([
                    'data' => Auth::user()->nik
                ]);
            } elseif ($keyword->sumber_data == 'nama') {
                $surat_data->update([
                    'data' => Auth::user()->name
                ]);
            } elseif ($keyword->sumber_data == 'alamat') {
                $surat_data->update([
                    'data' => Auth::user()->address
                ]);
            } elseif ($keyword->sumber_data == 'jenis_kelamin') {
                $surat_data->update([
                    'data' => Auth::user()->jenis_kelamin
                ]);
            } elseif ($keyword->sumber_data == 'tempat_tanggal_lahir') {
                $surat_data->update([
                    'data' => Auth::user()->tempat_tanggal_lahir
                ]);
            } elseif ($keyword->sumber_data == 'warga_negara') {
                $surat_data->update([
                    'data' => Auth::user()->warga_negara
                ]);
            } elseif ($keyword->sumber_data == 'pekerjaan') {
                $surat_data->update([
                    'data' => Auth::user()->pekerjaan
                ]);
            } elseif ($keyword->sumber_data == 'nomor_surat') {
                $surat_data->update([
                    'data' => $surat_data->id
                ]);
            } 
        }

        return redirect('/surat/' . $surat->id . '/isi-data')->with('OK', 'Surat successfully created!');
    }


    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $templates = TemplateSurat::all(); // Fetch all templates for dropdown
        return view('pages.surat.edit', compact('surat', 'templates'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'template_surat_id' => 'required|exists:template_surats,id',
        ]);

        $surat = Surat::findOrFail($id);
        $surat->update([
            'template_surat_id' => $request->template_surat_id,
        ]);

        return redirect()->route('surat.index')->with('OK', 'Surat successfully updated!');
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat.index')->with('OK', 'Surat successfully deleted!');
    }

    public function isiData(Request $request, $id) {
        $surat = Surat::find($id);
        $surat_data = SuratData::where('surat_id', $id)->get();

        foreach ($surat_data as $index => $data) {
            $data->update([
                'data' => $request->data[$index]
            ]);
        }

        return $this->downloadSurat($surat);
    }

    public function downloadSurat($surat)
    {
        // Fetch the template surat using the template_surat_id
        $template = TemplateSurat::find($surat->template_surat_id);
        $templateFilePath = storage_path('app/public/' . $template->file_surat); // Path to the DOCX file

        // Check if the file exists
        if (!file_exists($templateFilePath)) {
            return response()->json(['error' => 'Template file not found.'], 404);
        }

        // Load the template DOCX using PHPWord
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($templateFilePath);

        // Fetch the surat_data for this surat
        $surat_data = SuratData::where('surat_id', $surat->id)->get();

        // Loop through the surat data and replace the placeholders
        foreach ($surat_data as $data) {
            // Placeholder format assumed to be {{kode}}
            $placeholder = $data->kode;
        
            // Loop through sections and elements
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    // Check if the element is a Text or TextRun
                    if (method_exists($element, 'getText')) {
                        $text = $element->getText();
                        
                        // Replace the placeholder with the data if it matches
                        $modifiedText = str_replace($placeholder, $data->data, $text);
                        if ($modifiedText !== $text) {
                            // If the text was modified, set it
                            $element->setText($modifiedText);
                        }
        
                        // Debug: dd the modified text to ensure it matches
                        if (strpos($modifiedText, $placeholder) === false) {
                        }
                    }
        
                    // If the element is a TextRun, we need to loop through its elements
                    if (method_exists($element, 'getElements')) {
                        foreach ($element->getElements() as $subElement) {
                            if (method_exists($subElement, 'getText')) {
                                $subText = $subElement->getText();
                                
                                // Replace the placeholder with the data if it matches
                                $modifiedSubText = str_replace($placeholder, $data->data, $subText);
                                if ($modifiedSubText !== $subText) {
                                    // Set the modified text for the sub-element
                                    $subElement->setText($modifiedSubText);
                                }
                            }
                        }
                    }
                }
            }
        }
             

        // Save the modified DOCX to a new file
        $newFileName = $template->judul_surat . '.docx';
        $newFilePath = storage_path('app/public/surat/generated/' . $newFileName);
        $phpWord->save($newFilePath, 'Word2007'); // Save as DOCX format

        if ($surat->status == 'approved') {
            return response()->download($newFilePath, $newFileName, [
                'Cache-Control' => 'no-store', // Disable caching
                'Pragma' => 'no-cache',        // Disable caching
            ]);
        } else {
            return redirect('/surat')->with('OK', 'Surat anda belum disetujui');
        }
    }

    public function approveSurat($id){
        $surat = Surat::find($id);
        $surat->update([
            'status' => 'approved'
        ]);

        return redirect()->back()->with('OK', 'Berhasil menyetujui surat');
    }

    public function rejectSurat(Request $request, $id){
        $surat = Surat::findOrFail($id);
        $surat->status = 'rejected';
        $surat->rejected_reason = $request->rejected_reason;
        $surat->save();

        return redirect()->back()->with('OK', 'Berhasil menolak surat');
    }

}

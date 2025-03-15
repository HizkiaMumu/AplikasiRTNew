<?php

namespace App\Http\Controllers;

use App\Models\TemplateSurat;
use App\Models\Rating;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, $templateSuratId)
    {
        // Validate the rating value (1-5)
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Check if the user has already rated this template_surat
        $existingRating = Rating::where('template_surat_id', $templateSuratId)
            ->where('user_id', Auth::id())
            ->first();

        $surat = Surat::find($request->surat_id);
        $surat->update([
            'rated' => true
        ]);

        if ($existingRating) {
            // If a rating already exists, update it
            // $existingRating->rating = $request->rating;
            // $existingRating->save();

            Rating::create([
                'template_surat_id' => $templateSuratId,
                'user_id' => Auth::id(),
                'rating' => $request->rating,
            ]);
        } else {
            // Create a new rating for the template_surat
            Rating::create([
                'template_surat_id' => $templateSuratId,
                'user_id' => Auth::id(),
                'rating' => $request->rating,
            ]);
        }

        return back()->with('success', 'Rating submitted successfully!');
    }

    public function getAverageRating($templateSuratId)
    {
        // Get the average rating for the template_surat
        $averageRating = Rating::where('template_surat_id', $templateSuratId)->avg('rating');
        return number_format($averageRating, 1); // Return the average rounded to 1 decimal place
    }
}

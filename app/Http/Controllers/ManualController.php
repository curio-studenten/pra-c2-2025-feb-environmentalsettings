<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller

{
    public function countViews($manual_id)
    {
        $manual = Manual::findOrFail($manual_id);

        // Verhoog het aantal views
        $manual->increment('views_count');
        $manual->save();

        return redirect($manual->originUrl);
    }

    public function show($brand_id, $brand_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }
}

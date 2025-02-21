<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {

        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals
        ]);

    }
    public function edit(Brand $brand) {
        return view('manual_list{brand}')->with('brand', $brand);}

        public function update(Request $request, Brand $brand) {
            $brand->name = $request->name;
            $brand->categorie = $request->categorie;
            $brand->save();

            return redirect()->route('index');

        }

        public function destroy(Brand $brand){
            $brand->delete();
            return redirect()->route('index');
        }
}

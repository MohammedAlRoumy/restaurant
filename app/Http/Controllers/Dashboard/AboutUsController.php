<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.aboutus.index');
    }

    public function store(Request $request)
    {
        $request_data = $request->except(['image']);
        if ($request->image) {
            $image = Image::make($request->image)->resize(500, 334)->encode('jpg');
            Storage::disk('upload')->put('images/' . $request->image->hashName(), (string)$image);
            $request_data['image'] = $request->image->hashName();
        }

        setting($request_data)->save();
        session()->flash('success', 'Data Added successfully');
        return redirect()->back();
    }

}
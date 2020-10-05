<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OurTeamRequest;
use App\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class OurTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourteams = OurTeam::whenSearch(request()->search)->paginate();

        return view('dashboard.ourteams.index', compact('ourteams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.ourteams.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OurTeamRequest $request)
    {

        $request_data = $request->except(['image']);
        if ($request->image) {
            $image = Image::make($request->image)->resize(280, 420)->encode('jpg');
            Storage::disk('upload')->put('images/' . $request->image->hashName(), (string)$image);
            $request_data['image'] = $request->image->hashName();
        }


        OurTeam::create($request_data);

        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.ourteams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ourteam = OurTeam::findOrFail($id);
        return view('dashboard.ourteams.edit', compact('ourteam'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OurTeamRequest $request, $id)
    {
        //
        $ourteam = OurTeam::findOrFail($id);

        $request_data = $request->except(['image']);
        if ($request->image) {
            $this->remove_previous('image', $ourteam);
            $image = Image::make($request->image)->resize(280, 420)->encode('jpg');
            Storage::disk('upload')->put('images/' . $request->image->hashName(), (string)$image);
            $request_data['image'] = $request->image->hashName();
        }

        $ourteam->update($request_data);

        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.ourteams.index');
    }

    private function remove_previous($image_type, $ourteam)
    {
        if ($image_type == 'image') {
            Storage::disk('upload')->delete('images/' . $ourteam->image);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ourteam = OurTeam::findOrFail($id);
        Storage::disk('upload')->delete('images/' . $ourteam->image);
        $ourteam->delete();
        return redirect()->route('dashboard.ourteams.index');
    }
}

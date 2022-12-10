<?php

namespace App\Http\Controllers\Admins;

use App\DataTables\SeasonTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeasonRequest;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SeasonTable $table)
    {
        return $table->render('admin.seasons.index', ['title' => trans('admin.seasons')]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seasons.create', ['title' => trans('Create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeasonRequest $request)
    {
        $data = $request->except(['_token', '_method']);
        $data['created_by'] = Auth::user()->id;
        $other=Season::whereBetween('start',[$data['start'],$data['end']])
            ->orWhereBetween('end',[$data['start'],$data['end']])
            ->first();
        if ($other)
        {
            session()->flash('error', trans('kindly choose another time you have another season in same time '));
            return back()->withInput(\request()->all());
        }

        Season::create($data);
        session()->flash('success', trans('Added Successfully'));
        return redirect(aurl('seasons'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season=Season::find($id);
        if (!$season)
            return  redirect()->back();
        return view('admin.seasons.edit', ['title' => trans('Edit'), 'season' => $season]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function update(SeasonRequest $request,$id)
    {
        $season=Season::find($id);
        if (!$season)
            return  redirect()->back();
        $data = $request->except(['_token', '_method']);

        $season->update($data);
        session()->flash('success', trans('updated Successfully'));
        return redirect(aurl('seasons'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $season = Season::find($id);

        $season->delete();
        session()->flash('success', trans('Deleted Successfully'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $season = Season::find($id);
                @$season->delete();
            }
            session()->flash('success', trans('Deleted Successfully'));
            return back();
        } else {
            $season = Season::find($data);
            @$season->delete();
            session()->flash('success', trans('Deleted Successfully'));
            return back();
        }
    }
}

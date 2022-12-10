<?php

namespace App\Http\Controllers\Admins;

use App\DataTables\HouseDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Models\House;
use App\Models\Proberty;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HouseDataTable $table)
    {
        return $table->render('admin.houses.index', ['title' => trans('houses')]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.houses.create', ['title' => trans('Create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HouseRequest $request)
    {

        $data = $request->except(['_token', '_method']);
        $data['created_by'] = Auth::user()->id;


        try {
            DB::beginTransaction();
        $house = House::create($data);
        if (\request('season_price'))
            $house->seasons()->attach($this->prices(\request('season_price')));

        $house->properties()->attach(array_keys(\request('properties')));
        session()->flash('success', trans('Added Successfully'));
        DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', __('some error occured replay developer please ') . $e->getMessage());
            return redirect('houses');
        }


        return redirect(aurl('houses'));

    }


    ///=====For Chank attached prices=========//
    ///
    ///
    ///
    function prices($seasons)
    {
        $prices = [];
        foreach ($seasons as $key => $value) {
            if (! is_null($value))
                $prices[$key] = ['price' => $value];
        }
        return $prices;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = House::find($id);
        if (!$house)
            return redirect()->back();
        return view('admin.houses.edit', ['title' => trans('Edit'), 'house' => $house]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function update(HouseRequest $request, $id)
    {
        $house = House::find($id);
        if (!$house)
            return redirect()->back();
        $data = $request->except(['_token', '_method']);

        //=====transaction to prevent save data in one table and not on another
        try {
            DB::beginTransaction();
            $house->update($data);
            $house->seasons()->sync($this->prices(\request('season_price')));
            $house->properties()->sync(array_keys(\request('properties')));
            session()->flash('success', trans('Added Successfully'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', __('some error occured replay developer please ') . $e->getMessage());
            return redirect('houses');
        }

        session()->flash('success', trans('updated Successfully'));
        return redirect(aurl('houses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $house = House::find($id);

        @$house->delete();
        session()->flash('success', trans('Deleted Successfully'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $house = House::find($id);
                @$house->delete();
            }
            session()->flash('success', trans('Deleted Successfully'));
            return back();
        } else {
            $house = House::find($data);
            @$house->delete();
            session()->flash('success', trans('Deleted Successfully'));
            return back();
        }
    }
}

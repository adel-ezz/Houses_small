<?php

namespace App\Http\Controllers\Admins;

use App\DataTables\PropertiesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Proberty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProbertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PropertiesDataTable $table)
    {
        return $table->render('admin.properties.index', ['title' => trans('admin.properties')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.properties.create', ['title' => trans('Create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $data = $request->except(['_token', '_method']);
        $data['created_by'] = Auth::user()->id;
        Proberty::create($data);
        session()->flash('success', trans('Added Successfully'));
        return redirect(aurl('properties'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property=Proberty::find($id);
        if (!$property)
            return  redirect()->back();
        return view('admin.properties.edit', ['title' => trans('Edit'), 'property' => $property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request,$id)
    {
        $property=Proberty::find($id);
        if (!$property)
            return  redirect()->back();
        $data = $request->except(['_token', '_method']);

        $property->update($data);
        session()->flash('success', trans('updated Successfully'));
        return redirect(aurl('properties'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Proberty $proberty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Proberty::find($id);

        $property->delete();
        session()->flash('success', trans('Deleted Successfully'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $property = Proberty::find($id);
                @$property->delete();
            }
            session()->flash('success', trans('Deleted Successfully'));
            return back();
        } else {
            $property = Proberty::find($data);
            @$property->delete();
            session()->flash('success', trans('Deleted Successfully'));
            return back();
        }
    }
}

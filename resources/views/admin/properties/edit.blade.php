@extends('admin.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon"><i class="fas fa-heartbeat text-danger"></i></span>
                        <h3 class="card-label">{{ $title }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ aurl('properties/create') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md"><i
                                    class="fa fa-plus"></i>
                                <!--end::Svg Icon--></span> @lang('Add New')
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{aurl('properties/'.$property->id)}}" class="form-horizontal form-row-seperated"
                          method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="put">

                        <div class="form-group row">
                            <label for="old_price"
                                   class="col-md-2  control-label">{{trans('title')}}</label>
                            <div class="col-md-4">
                                <input type="text" id="title" name="title"
                                       value="{{$property->title}}"
                                       class="form-control"
                                       placeholder="{{trans('title')}}" required/>
                            </div>
                            <label for="new_price"
                                   class="col-md-2  control-label">{{trans('describe')}}</label>
                            <div class="col-md-4">
                                <textarea name="describe" class="form-control">{{ $property->describe }}</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" class="btn btn-success"
                                                   value="{{ trans('admin.save') }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection









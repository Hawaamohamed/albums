@extends('layoutes.mastar')
@section('title','Create New picture')
@section('bredcrumb')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Pictures</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Pictures</li>
                    <li class="breadcrumb-item">Add Picture</li>
                    {{--                    <li class="breadcrumb-item active">Default</li>--}}
                </ol>
            </div> 
        </div>
    </div>
 
@stop
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-sm-flex d-block">
                        <div class="ms-auto mb-sm-0 mb-3">
                            <h4 class="card-title mb-2">Add new Picture </h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        {!! Form::open(['route' => ['pictures.store', $album_id], 'files' => true]) !!}

                         @include('pictures.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

@stop

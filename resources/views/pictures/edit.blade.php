@extends('layoutes.mastar')
@section('title','Edit ' . $picture->title)
@section('bredcrumb')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Pictures</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Pictures</li>
                    <li class="breadcrumb-item">Edit {{$picture->title}}</li>
                    {{--                    <li class="breadcrumb-item active">Default</li>--}}
                </ol>
            </div>
        </div>
    </div>

@stop
@section('content')
<div class="content-body">
    <div class="container-fluid">
        {{-- @include('includes.errors') --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-sm-flex d-block">
                        <div class="ms-auto mb-sm-0 mb-3">
                            <h4 class="card-title mb-2"> Edit </h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        {!! Form::model($picture, ['route' => ['pictures.update',$picture->id], 'method' => 'post', 'files' => true]) !!}
                        <input type="hidden" value="{{$picture->id}}" name="id">

                        @include('pictures.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

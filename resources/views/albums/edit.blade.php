@extends('layoutes.mastar')
@section('title','Edit ' . $album->title)
@section('bredcrumb')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Albums</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Albums</li>
                    <li class="breadcrumb-item">Edit {{$album->title}}</li>
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
                        {!! Form::model($album, ['route' => ['albums.update', $album->id], 'method' => 'post', 'files' => true]) !!}

                        <input type="hidden" value="{{$album->id}}" name="id">

                        @include('albums.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
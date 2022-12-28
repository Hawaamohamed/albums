@extends('layoutes.mastar')
@section('title','Albums')
@section('bredcrumb')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Albums</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    {{--                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>--}}
                    {{-- <li class="breadcrumb-item">Albums</li> --}}
                    {{--                    <li class="breadcrumb-item active">Default</li>--}}
                </ol>
            </div>
        </div>
    </div>

@stop
@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<style>
.buttons-print, .buttons-reload  {
    width: 70px;
    font-size: 10px;
    padding: 2px;
    word-break: break-all;
    line-height: 2;
}
.buttons-csv, .buttons-excel {
    width: 95px;
    font-size: 10px;
    padding: 2px;
    word-break: break-all;
    line-height: 2;
}
div.dt-buttons {
    margin-top: 5px;
    margin-left: 10px;
}


</style>
@stop
@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header d-sm-flex d-block">

                        {{-- @can('create_albums') --}}
                            <a href="{{route('albums.create')}}" class="btn btn-primary">
                                <i class="fa fa-plus"></i>  Add new Album
                            </a>
                        {{-- @endcan --}}
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            @include('albums.table')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
            $('.btn_confirm').on('click',function(){
                return confirm('Are You Sure ?');
            });
        });
    </script>
@stop

@push('vendor-scripts')
    {{-- Vendor js files --}}
    <script src="{{ asset('assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    {{-- @include('includes.notify.delete') --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script>
  $(document).on('click', '.move-pictures', function(){ 
     $(this).siblings('.choose-albums').removeClass('hidden');
  })


</script>
@endpush

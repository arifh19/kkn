@extends('layouts.app')

@section('dashboard')
   Proker
   <small>Daftar Proker</small>
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active">Proker</li>
@endsection

@section('content')
    @if(session()->has('status'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Informasi </strong> {{ session('status') }}.
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">

                    <h3 class="box-title">Proker</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{-- <p> --}}
                        {{-- <a class="btn btn-success" href="{{ url('/admin/Prokers/create') }}">Tambah</a> --}}
                        {{-- <a class="btn btn-warning" href="{{ url('/admin/export/books') }}">Export</a> --}}
                    {{-- </p> --}}
                    <p><a class="btn btn-success" href="{{ route('log.create') }}">Tambah</a></p>

                    {!! $html->table(['class' => 'table w3-responsive w3-table-all']) !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')

    {!! $html->scripts() !!}
@endsection

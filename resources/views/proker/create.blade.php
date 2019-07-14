@extends('layouts.app')

@section('dashboard')
Program Kerja
    <small>Tambah Config</small>
@endsection

@section('breadcrumb')
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/proker') }}">Proker</a></li>
    <li class="active">Tambah Proker</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Isi Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['url' => route('proker.store'), 'method' => 'post']) !!}
                    @include('proker._form')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (left) -->

        <div class="col-md-7">

        </div>
        <!-- /.col (right)-->
    </div>
    <!-- /.row -->

@endsection

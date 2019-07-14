@extends('layouts.app')

@section('dashboard')
Proposal
    <small>Tambah Config</small>
@endsection

@section('breadcrumb')
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    @role('admin')
    <li><a href="{{ url('/admin/config') }}">Config</a></li>
    @endrole
    <li class="active">Tambah Config</li>
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
                @role('admin')
                {!! Form::open(['url' => route('config.store'), 'method' => 'post', 'files' => 'true']) !!}
                @endrole
                    @include('config._form')
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

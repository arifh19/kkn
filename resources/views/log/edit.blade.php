@extends('layouts.app')

@section('dashboard')
Kategori
   <small>Ubah Kategori</small>
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="{{ url('/log') }}">Log</a></li>
   <li class="active">Ubah Log</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Log</h3>
                </div>
                <!-- /.box-header -->
                {!! Form::model($log, ['url' => route('log.update', $log->id), 'method' => 'put', 'files' => 'true']) !!}
                    @include('log._form')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

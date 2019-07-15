@extends('layouts.app')

@section('dashboard')
Program Kerja
    <small>Tambah Log Proker</small>
@endsection

@section('breadcrumb')
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/proker') }}">Proker</a></li>
    <li class="active">Tambah Log Proker</li>
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
                {!! Form::open(['url' => route('log.store'), 'method' => 'post', 'files' => 'true']) !!}
                    @include('log._form')
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

@section('scripts')
<script>
        $("#jenis").change(function(){
            if($(this).val()==1||$(this).val()==2){
                $.ajax({
                    url: "{{ route('log.prokers') }}?jenis_id=" + $(this).val(),
                    method: 'GET',
                    success: function(data) {
                        $('#prokers').show();
                        $('#proker').html(data.html);
                    }
                });
            }else{
                $('#prokers').hide();
            }

        });

            $(function() {
                $( "#datetimepicker" ).datepicker({
                    format : "dd/mm/yyyy",
                });
              });
       </script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
@endsection

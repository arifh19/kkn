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
                    <input id="help" type="text" value="{{$log->proker_id}}" hidden>

                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
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
        $("#jenis").ready(function(){
            if($("#jenis").val()==1||$("#jenis").val()==2){
                $.ajax({
                    url: "{{ route('log.prokers') }}?jenis_id=" + $("#jenis").val(),
                    method: 'GET',
                    success: function(data) {
                        $('#prokers').show();
                        $('#proker').html(data.html);
                        $("#proker").find('option[value="'+$('#help').val()+'"]').attr('selected','selected')
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

<div class="box-body">

    <div class="form-group has-feedback{{ $errors->has('nama') ? ' has-error' : '' }}">
        {!! Form::label('nama', 'Nama Program Kerja') !!}

        {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama Program Kerja','required']) !!}
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('waktu') ? ' has-error' : '' }}">
        {!! Form::label('waktu', 'Alokasi Waktu') !!}

        {!! Form::number('waktu', null, ['class' => 'form-control', 'placeholder' => 'Alokasi Waktu','required']) !!}
        {!! $errors->first('waktu', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('jenis_id') ? ' has-error' : '' }}">
        {!! Form::label('jenis_id', 'Jenis Program') !!}

        {!! Form::select('jenis_id', App\Jenis::pluck('nama','id')->all(), null, ['class' => 'form-control js-select2','placeholder'=>'','required']) !!}
        {!! $errors->first('jenis_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('klaster_id') ? ' has-error' : '' }}">
        {!! Form::label('klaster_id', 'Klaster') !!}

        {!! Form::select('klaster_id', App\Klaster::pluck('nama','id')->all(), null, ['class' => 'form-control js-select2','placeholder'=>'','required']) !!}
        {!! $errors->first('klaster_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>

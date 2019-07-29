<div class="box-body">
    <div class="form-group has-feedback{{ $errors->has('jenis_id') ? ' has-error' : '' }}">
        {!! Form::label('jenis_id', 'Jenis Program') !!}

        {!! Form::select('jenis_id', App\Jenis::pluck('nama','id')->all(), null, ['id'=>'jenis', 'class' => 'form-control js-select2','placeholder'=>'','required']) !!}
        {!! $errors->first('jenis_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div id="prokers" class="form-group has-feedback{{ $errors->has('proker_id') ? ' has-error' : '' }}">
        {!! Form::label('proker_id', 'Nama Proker') !!}
        <select name="proker_id" id="proker" class ="form-control js-select2" >
            <option value="" disabled>Pilih Proker</option>
        </select>
        {!! $errors->first('proker_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('keterangan') ? ' has-error' : '' }}">
        {!! Form::label('keterangan', 'Uraian Program Kerja') !!}

        {!! Form::text('keterangan', null, ['class' => 'form-control', 'placeholder' => 'Rincian Program Kerja','required']) !!}
        {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('tanggal') ? ' has-error' : '' }}">
        {!! Form::label('tanggal', 'Tanggal') !!}

        {!! Form::text('tanggal', null, ['class' => 'form-control', 'id' => "datetimepicker" , 'placeholder' => 'Tanggal','required']) !!}
        {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('mulai') ? ' has-error' : '' }}">
        {!! Form::label('mulai', 'Mulai') !!}

        {!! Form::time('mulai', null, ['class' => 'form-control', 'placeholder' => 'Jam Mulai','required']) !!}
        {!! $errors->first('mulai', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('selesai') ? ' has-error' : '' }}">
        {!! Form::label('selesai', 'Selesai') !!}

        {!! Form::time('selesai', null, ['class' => 'form-control', 'placeholder' => 'Jam Mulai','required']) !!}
        {!! $errors->first('selesai', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('upload') ? ' has-error' : '' }}">
        {!! Form::label('dokumentasi', 'Dokumentasi') !!}

        {!! Form::file('dokumentasi',['class' => 'form-control']) !!}
        <p class="help-block">Size file (PDF) maks 2MB</p>
        {!! $errors->first('dokumentasi', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>

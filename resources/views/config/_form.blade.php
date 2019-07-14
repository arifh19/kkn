<div class="box-body">

    <div class="form-group has-feedback{{ $errors->has('pokok_tema') ? ' has-error' : '' }}">
        {!! Form::label('pokok_tema', 'Waktu Pokok Tema') !!}

        {!! Form::number('pokok_tema', null, ['class' => 'form-control', 'placeholder' => 'Waktu Pokok Tema','required']) !!}
        {!! $errors->first('pokok_tema', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('pokok_nontema') ? ' has-error' : '' }}">
        {!! Form::label('pokok_nontema', 'Waktu Pokok Non Tema') !!}

        {!! Form::number('pokok_nontema', null, ['class' => 'form-control', 'placeholder' => 'Waktu Pokok Non Tema','required']) !!}
        {!! $errors->first('pokok_nontema', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('bantu_tema') ? ' has-error' : '' }}">
        {!! Form::label('bantu_tema', 'Waktu Bantu Tema') !!}

        {!! Form::number('bantu_tema', null, ['class' => 'form-control', 'placeholder' => 'Waktu Bantu Tema','required']) !!}
        {!! $errors->first('bantu_tema', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('bantu_nontema') ? ' has-error' : '' }}">
        {!! Form::label('bantu_nontema', 'Waktu Bantu Non Tema') !!}

        {!! Form::number('bantu_nontema', null, ['class' => 'form-control', 'placeholder' => 'Waktu Bantu Non Tema','required']) !!}
        {!! $errors->first('bantu_nontema', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group has-feedback{{ $errors->has('maksimal') ? ' has-error' : '' }}">
        {!! Form::label('maksimal', 'Waktu Maksimal') !!}

        {!! Form::number('maksimal', null, ['class' => 'form-control', 'placeholder' => 'Waktu Maksimal','required']) !!}
        {!! $errors->first('maksimal', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>

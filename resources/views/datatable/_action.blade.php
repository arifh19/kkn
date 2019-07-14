{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
        Lihat
    </button>
    {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}


{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
    <a class="btn btn-info" href="{{ $edit_url }}">Ubah</a>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
        Lihat
    </button>
    {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Dokumentasi</h4>
            </div>
            <div class="modal-body">

                        <div class="form-group">
                            <label>Dokumentasi: </label></br>
                            <img src="{{ asset('/dokumentasi/'+$model->dokumentasi) }}" width="200" height="200" />
                        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

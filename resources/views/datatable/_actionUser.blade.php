{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
    <a class="btn btn-info" href="{{ $edit_url }}">Ubah</a>
    <div class="btn-group">
        <button type="button" class="btn btn-primary">Role</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{ $admin_url }}">Admin</a></li>
          <li><a href="{{ $staff_url }}">Staff</a></li>
          <li><a href="{{ $dosen_url }}">Dosen</a></li>
          <li><a href="{{ $mahasiswa_url }}">Mahasiswa</a></li>
        </ul>
    </div>
    @if($model->is_verified==0)
    <a class="btn btn-warning" href="{{ $verify_url }}">Verifikasi</a>
    @endif
    @if($model->is_verified==1)
    <a class="btn btn-success" href="{{ $blok_url }}">Blokir</a>
    @endif
    {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

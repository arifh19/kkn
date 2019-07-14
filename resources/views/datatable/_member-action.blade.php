{!! Form::model($member, ['url' => route('members.destroy', $member->id), 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => 'Yakin mau menghapus member ' . $member->name . '?'] ) !!}
    <a href="{{ route('admin.members.show', $member->id) }}">Lihat data peminjaman</a> |
    {!! Form::submit('Hapus', ['class' => 'btn btn-xs btn-danger']) !!}
{!! Form::close() !!}

@if($cekpengurus->count()>0)
{{$cekpengurus->first()->pengurus->nama_pengurus}}<br>
<h5><b>Divisi {{$cekpengurus->first()->divisi->divisi}}</h5></b>
@else
{{$user->name}}
@endif
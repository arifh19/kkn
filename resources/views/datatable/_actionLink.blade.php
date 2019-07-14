@if($dokumen->count() > 0)
<a class="btn btn-info" href="/lampiran/{{$dokumen->first()->lampiran}}">Lampiran</a>
@else
-
@endif
@if(Auth::user()->Reviews()->where('proposal_id', $proposal_id)->where('user_id',Auth::user()->id)->where('is_review', 1)->count() > 0)
<h4><span class="label label-info label-md">Sudah anda Review</span></h4>
@else
<h4><span class="label label-warning label-md">Belum anda Review</span></h4>
@endif
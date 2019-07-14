@if(Auth::user()->Reviews()->where('proposal_id', $proposal_id)->where('user_id',Auth::user()->id)->count() > 0)
{{Auth::user()->Komentars()->where('proposal_id', $proposal_id)->where('user_id',Auth::user()->id)->count()}}
@else
0
@endif
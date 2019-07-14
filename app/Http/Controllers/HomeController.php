<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use App\Logbook;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $maxpt = Config::first()->pokok_tema;
        $maxpn = Config::first()->pokok_nontema;
        $maxbt = Config::first()->bantu_tema;
        $maxbn = Config::first()->bantu_nontema;
        $pts = Logbook::where('user_id', Auth::user()->id)->where('jenis_id',1)->get();
        $pns = Logbook::where('user_id', Auth::user()->id)->where('jenis_id',2)->get();
        $bts = Logbook::where('user_id', Auth::user()->id)->where('jenis_id',3)->get();
        $bns = Logbook::where('user_id', Auth::user()->id)->where('jenis_id',4)->get();
        $sum_pt = 0;
        $sum_pn = 0;
        $sum_bt = 0;
        $sum_bn = 0;
        foreach ($pts as $pt) {
            $sum_pt += $pt->waktu;
        }
        foreach ($pns as $pn) {
            $sum_pn += $pn->waktu;
        }
        foreach ($bts as $bt) {
            $sum_bt += $bt->waktu;
        }
        foreach ($bns as $bn) {
            $sum_bn += $bn->waktu;
        }

        $pres_pt = number_format(($sum_pt/$maxpt)*100,2);
        $pres_pn = number_format(($sum_pn/$maxpt)*100,2);
        $pres_bt = number_format(($sum_bt/$maxpt)*100,2);
        $pres_bn = number_format(($sum_bn/$maxpt)*100,2);
        $sum=$pres_pt+$pres_pn+$pres_bt+$pres_bn;
        return view('home')->with(compact('pres_pt','pres_pn','pres_bt','pres_bn','sum_pt','sum_pn','sum_bt','sum_bn','sum'));
    }
}

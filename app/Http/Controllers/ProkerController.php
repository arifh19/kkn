<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proker;
use App\Logbook;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;


class ProkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
             if ($request->ajax()) {
                $prokers = Proker::with('jenis')->with('klaster')->with('user')->where('user_id', Auth::user()->id)->get();

                return Datatables::of($prokers)
                     ->addColumn('jam', function($proker) {
                        return view('datatable._waktu', [
                           'model'             => $proker,
                        ]);
                    })
                    ->addColumn('action', function($proker) {
                        return view('datatable._actionProker', [
                           'model'             => $proker,
                           'form_url'          => route('proker.destroy', $proker->id),
                           'edit_url'          => route('proker.edit', $proker->id),
                           'view_url'          => route('proker.show', $proker->id),
                            'confirm_message'    => 'Yakin mau menghapus ' . $proker->keterangan . '?'
                        ]);
                    })
                    ->addColumn('progress', function($proker) {
                        $logs = Logbook::where('proker_id',$proker->id)->get();
                        $sum = 0;
                        foreach ($logs as $log) {
                            $sum +=$log->waktu;
                        }
                        return view('datatable._progress', [
                           'model'             => $proker,
                           'sum'             => $sum,
                        ]);
                    })->rawColumns(['jam','progress','action'])->make(true);
            }

            $html = $htmlBuilder
                ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama Proker'])
                ->addColumn(['data' => 'jam', 'name' => 'jam', 'title' => 'Alokasi Waktu'])
                ->addColumn(['data' => 'jenis.nama', 'name' => 'jenis.nama', 'title' => 'Jenis Proker'])
                ->addColumn(['data' => 'klaster.nama', 'name' => 'klaster.nama', 'title' => 'Klaster'])
                ->addColumn(['data' => 'progress', 'name' => 'progress', 'title' => 'Progress'])
                //->addColumn(['data' => 'user.name', 'name' => 'user_id', 'title' => 'Nama Tim'])
                ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Tanggal Input'])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action']);

            return view('proker.index')->with(compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $proker = new Proker;
        $proker->nama = $request->nama;
        $proker->waktu = $request->waktu;
        $proker->jenis_id = $request->jenis_id;
        $proker->klaster_id = $request->klaster_id;
        $proker->user_id = $user;

        $proker->save();
        return redirect()->route('proker.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proker = Proker::findOrfail($id);
        return view('proker.edit')->with(compact('proker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $proker = Proker::find($id);
        $proker->nama = $request->nama;
        $proker->waktu = $request->waktu;
        $proker->jenis_id = $request->jenis_id;
        $proker->klaster_id = $request->klaster_id;
        $proker->user_id = $user;

        $logs = Logbook::where('proker_id', $proker->id)->get();
        foreach ($logs as $log) {
            $log->jenis_id = $request->jenis_id;
            $log->save();

        }
        $proker->save();
        return redirect()->route('proker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $proker = Proker::find($id);

        if (!$proker->delete()) return redirect()->back();

        // Handle hapus log via ajax
        if ($request->ajax()) return response()->json(['id' => $id]);


        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Proker berhasil dihapus"
        ]);
        return redirect()->route('proker.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proker;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;

class ProkerController extends Controller
{
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
                     ->addColumn('action', function($proker) {
                       //  return view('datatable._waktu', [
                           // 'model'             => $proker,
                //            'form_url'          => route('proposalz.destroy', $proposal->id),
                //            'edit_url'          => route('proposalz.edit', $proposal->id),
                //            'view_url'          => route('proposalz.show', $proposal->id),
                //             'confirm_message'    => 'Yakin mau menghapus ' . $proposal->judul . '?'
                     //    ]);
                        })
                    ->addColumn('progress', function($proker) {
                        return view('datatable._waktu', [
                           'model'             => $proker,
                        ]);
                    })->rawColumns(['action','progress'])->make(true);
            }

            $html = $htmlBuilder
                ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama Proker'])
                ->addColumn(['data' => 'waktu', 'name' => 'waktu', 'title' => 'Alokasi Waktu'])
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

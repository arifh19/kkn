<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Logbook;
use App\Proker;
use Illuminate\Support\Facades\File;
use Session;


class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function get_proker(Request $request)
    {

        if (!$request->jenis_id) {
            $html = '<option value="">Silahkan log in kembali</option>';
        } else {
            $html = '';
            if($request->jenis_id==1||$request->jenis_id==2){
                $prokers = Proker::where('jenis_id',$request->jenis_id)->where('user_id', Auth::user()->id)->get();
            }
            else{
                $prokers = Proker::where('user_id','!=', Auth::user()->id)->get();
            }
            $html .= '<option value=""></option>';
            foreach ($prokers as $proker) {
                $html .= '<option value="'.$proker->id.'">'.$proker->nama.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
             if ($request->ajax()) {
                $logs = Logbook::with('jenis')->with('proker')->with('user')->where('user_id', Auth::user()->id)->orderBy('tanggal','desc')->get();

                return Datatables::of($logs)
                     ->addColumn('action', function($log) {
                        return view('datatable._action', [
                           'model'             => $log,
                           'form_url'          => route('log.destroy', $log->id),
                           'edit_url'          => route('log.edit', $log->id),
                           'view_url'          => route('log.show', $log->id),
                            'confirm_message'    => 'Yakin mau menghapus ' . $log->keterangan . '?'
                        ]);
                 })
                ->addColumn('jam', function($log) {
                    return view('datatable._waktu', [
                       'model'             => $log,
                    ]);
                })
                ->addColumn('nama', function($log) {
                    return view('datatable._proker', [
                       'model'             => $log,
                    ]);
                })->rawColumns(['jam','action','nama'])->make(true);
            }

            $html = $htmlBuilder
                // ->addColumn(['data' => 'tes', 'name' => 'tes', 'title' => 'Action'])
                ->addColumn(['data' => 'keterangan', 'name' => 'keterangan', 'title' => 'Rincian Proker'])
                ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama Proker'])
                ->addColumn(['data' => 'jenis.nama', 'name' => 'jenis.nama', 'title' => 'Jenis Proker'])
                ->addColumn(['data' => 'tanggal', 'name' => 'tanggal', 'title' => 'Tanggal'])
                ->addColumn(['data' => 'jam', 'name' => 'jam', 'title' => 'Waktu'])
                ->addColumn(['data' => 'mulai', 'name' => 'mulai', 'title' => 'Mulai'])
                ->addColumn(['data' => 'selesai', 'name' => 'selesai', 'title' => 'Selesai'])
                //->addColumn(['data' => 'user.name', 'name' => 'user_id', 'title' => 'Nama Tim'])
                ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Tanggal Input'])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action']);

            return view('log.index')->with(compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('log.create');
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
        $log = new Logbook;
        $log->keterangan = $request->keterangan;
        $log->jenis_id = $request->jenis_id;
        $log->proker_id = $request->proker_id;
        $log->tanggal = $request->tanggal;
        $log->mulai = $request->mulai;
        $log->selesai = $request->selesai;
        $mulai= strtotime($request->mulai);
        $selesai= strtotime($request->selesai);
        $selisih = $selesai-$mulai;
        $log->waktu = number_format($selisih / (60 * 60),2);

        $log->user_id = $user;
        if ($request->hasFile('dokumentasi')) {

            // Mengambil file yang diupload
            $uploaded_upload = $request->file('dokumentasi');

            // Mengambil extension file
            $extension = $uploaded_upload->getClientOriginalExtension();

            // Membuat nama file random berikut extension
            $filename = md5(time()) . "." . $extension;

            // Menyimpan log ke folder public/log
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'dokumentasi';
            $uploaded_upload->move($destinationPath, $filename);

            // Mengisi field upload di tabel log dengan filename yang baru dibuat
            $log->dokumentasi = $filename;
            $log->save();
        }
        $log->save();
        return redirect()->route('log.index');

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
        $log = Logbook::findOrfail($id);
        return view('log.edit')->with(compact('log'));
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
        $log = Logbook::find($id);
        $log->keterangan = $request->keterangan;
        $log->jenis_id = $request->jenis_id;
        $log->proker_id = $request->proker_id;
        $log->tanggal = $request->tanggal;
        $log->mulai = $request->mulai;
        $log->selesai = $request->selesai;
        $mulai= strtotime($request->mulai);
        $selesai= strtotime($request->selesai);
        $selisih = $selesai-$mulai;
        $log->waktu = number_format($selisih / (60 * 60),2);
        $log->user_id = $user;

        if ($request->hasFile('dokumentasi')) {
            // Mengambil log yang diupload berikut ektensinya
            $filename = null;
            $uploaded_upload = $request->file('dokumentasi');
            $extension = $uploaded_upload->getClientOriginalExtension();
            // Membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            // Menyimpan log ke folder public/log
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'dokumentasi';
            $uploaded_upload->move($destinationPath, $filename);
            // Hapus log lama, jika ada
            if ($log->upload) {
                $old_upload = $log->dokumentasi;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'dokumentasi' . DIRECTORY_SEPARATOR . $log->dokumentasi;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            // Ganti field log dengan log yang baru
            $log->dokumentasi = $filename;
            $log->save();
        }
        $log->save();
        return redirect()->route('log.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $log = Logbook::find($id);

        $dokumentasi = $log->dokumentasi;

        if (!$log->delete()) return redirect()->back();

        // Handle hapus log via ajax
        if ($request->ajax()) return response()->json(['id' => $id]);

        // Hapus log lama, jika ada
        if ($dokumentasi) {

            $filepath = public_path() . DIRECTORY_SEPARATOR . 'dokumentasi' . DIRECTORY_SEPARATOR . $log->dokumentasi;

            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }

        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Log berhasil dihapus"
        ]);
        return redirect()->route('log.index');

    }
}

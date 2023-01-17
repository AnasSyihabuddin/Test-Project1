<?php

namespace App\Http\Controllers;

use App\Models\DataOnline;
use Illuminate\Http\Request;

/**
* Class MstPangkatController
* @package App\Http\Controllers
*/

class DataOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = \Request::get('search');
        $p = DataOnline::paginate();

        //$data_Online = \DB::table('data_online')        
        // ->select('data_online.no_pendaftaran','data_online.nama',
        //         'data_online.alamat','data_online.nilai_ind',
        //         'data_online.nilai_ipa','data_online.nilai_mtk')
        
        $data_Online = \DB::table('data_online')
        ->where('no_pendaftaran','LIKE','%'.$search.'%')
        ->orwhere('nama','LIKE','%'.$search.'%')
        ->orwhere('alamat','LIKE','%'.$search.'%')
        ->orwhere('tanggal_lahir','LIKE','%'.$search.'%')
        ->orwhere('jenis_kelamin','LIKE','%'.$search.'%')
        ->orwhere('asal_sekolah','LIKE','%'.$search.'%')
        ->orwhere('agama_id','LIKE','%'.$search.'%')
        ->orwhere('nilai_ind','LIKE','%'.$search.'%')
        ->orwhere('nilai_ipa','LIKE','%'.$search.'%')
        ->orwhere('nilai_mtk','LIKE','%'.$search.'%')
        ->paginate($p->perPage());

        // dd($data_Online);
        return view('data-online.index', compact('data_Online'))
                    ->with('i', (request()->input('page',1)-1) * 
                    $p->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_Online = new DataOnline();
        return view('data-online.create', compact('data_Online'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cek validasi
        request()->validate(DataOnline::$rules);

        //mulai transaksi
        \DB::beginTransaction();
        try{
        //simpan ke tabel kota
        \DB::table('data_online')->insert([
        'nama'=>$request->nama,
        'alamat'=>$request->alamat,
        'tanggal_lahir'=>$request->tanggal_lahir,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'asal_sekolah'=>$request->asal_sekolah,
        'agama_id'=>$request->agama_id,
        'nilai_ind'=>$request->nilai_ind,
        'nilai_ipa'=>$request->nilai_ipa,
        'nilai_mtk'=>$request->nilai_mtk
        ]);
        //jika tidak ada kesalahan commit/simpan
        \DB::commit();
        return redirect()->route('data-online.index')
        ->with('success', 'Master Pendaftaran created successfully.');
        } catch (\Throwable $e) {
        //jika terjadi kesalahan batalkan semua
        \DB::rollback();
        return redirect()->route('data-online.index')
        ->with('success',
        'Penyimpanan dibatalkan semua, ada kesalahan......');
        } 
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
        $dataOnline = DataOnline::find($id);
        return view('data-online.edit', compact('dataOnline'));

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
        request()->validate(DataOnline::$rules);
        //mulai transaksi
        \DB::beginTransaction();
        try{
        \DB::table('data_online')->where('no_pendaftaran',$id)->update([
        'nama'=>$request->nama_pangkat,
        'pangkat_gol'=>$request->pangkat_gol,
        'updated_at'=>date('Y-m-d H:m:s')]);
        \DB::commit();
        return redirect()->route('mst-pangkat.index')
        ->with('success', 'MstPangkat updated successfully');
        } catch (\Throwable $e) {
        //jika terjadi kesalahan batalkan semua
        \DB::rollback();
        return redirect()->route('mst-pangkat.index')
        ->with('success',
        'Tabel Pangkat Batal diubah, ada kesalahan');
        }
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

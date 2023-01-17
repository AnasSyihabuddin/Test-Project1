<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstJabatan;

class MstJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = \Request::get('search');
        $p = MstJabatan::paginate();

        $mstJabatan = \DB::table('mst_jabatan')
            ->where('nama_jabatan','LIKE','%'.$search.'%')
            ->paginate($p->perPage());

        return view('mst-jabatan.index', compact('mstJabatan'))
            ->with('i', (request()->input('page', 1) - 1) *
            $p->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mstJabatan = new MstJabatan();
        return view('mst-jabatan.create', compact('mstJabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MstJabatan::$rules);

        \DB::beginTransaction();
        try{

            $jabatan= new MstJabatan();
            $jabatan->nama_jabatan=$request->nama_jabatan;
            $jabatan->tunjangan =$request->tunjangan;
            $jabatan->save();

        \DB::commit();

            return redirect()->route('mst-jabatan.index')
            ->with('success', 'MstJabatan telah berhasil disimpan.');
        } catch (\Throwable $e) {
            echo $e;
            \DB::rollback();
            // return redirect()->route('mst-jabatan.index')
            // ->with('success', 'Penyimpanan dibatalkan semua, ada kesalahan...');
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
        $mstJabatan = MstJabatan::find($id);
        return view('mst-jabatan.show', compact('mstJabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mstJabatan = MstJabatan::find($id);
        return view('mst-jabatan.edit', compact('mstJabatan'));
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
        request()->validate(MstJabatan::$rules);
        \DB::beginTransaction();
        try{

            $jabatan= MstJabatan::find($id);
            $jabatan->nama_jabatan=$request->nama_jabatan;
            $jabatan->tunjangan =$request->tunjangan;
            $jabatan->save();
            \DB::commit();
                return redirect()->route('mst-jabatan.index')
                ->with('success', 'MstJabatan berhasil diubah');
        } catch (\Throwable $e) {
            \DB::rollback();
                return redirect()->route('mst-jabatan.index')
                ->with('success', 'MstJabatan batal diubah, ada kesalahan');
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
        \DB::beginTransaction();
        try{
            $mstJabatan = MstJabatan::find($id)->delete();
            \DB::commit();
                return redirect()->route('mst-jabatan.index')
                ->with('success', 'MstJabatan berhasil dihapus');
        } catch (\Throwable $e) {
        \DB::rollback();
            return redirect()->route('mst-jabatan.index')
            ->with('success',
            'MstJabatan ada kesalahan hapus batal... ');
        }
    }
}

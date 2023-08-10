<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinas;
use App\Models\Ruangan;
use App\Models\User;
use App\Models\Peminjaman;
use Auth;


class RuangController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $level = Auth::user()->level;
        $ids = Auth::user()->id;
        if ($level == 'admin') {
            $data = Ruangan::all();
            return view('ruang.index')->with('data', $data);
        } else if ($level == 'operator') {

            $data = Ruangan::where('dinas_id', '=', $ids)->get();
            return view('ruang.index')->with('data', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data_dinas = Dinas::all();

        return view('ruang.create')->with(compact('data_dinas'));
    }

    public function create2(){
        $data_dinas = Dinas::all();

        return view('ruang.create2')->with(compact('data_dinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        Ruangan::insert([
            'nama_ruangan' => $request->nama_ruang,
            'fasilitas' => $request->fasilitas,
            'kapasitas' => $request->kapasitas,
            'dinas_id' => $request->dinas_id,
        ]);
        $request->session()->flash('message1');
        return redirect()->route('ruang.index');
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
    public function edit($id){
        $data = Ruangan::find($id);
        return view('ruang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'nama_ruang' => 'required',
            'fasilitas' => 'required',
            'kapasitas' => 'required',
        ]);
        $ruang = Ruangan::find($id);
        $ruang->nama_ruangan = $request->nama_ruang;
        $ruang->fasilitas = $request->fasilitas;
        $ruang->kapasitas = $request->kapasitas;
        $ruang->save();
        $request->session()->flash('message1');
        return redirect()->route('ruang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        Ruangan::where('id', $id)->delete();
        $request->session()->flash('message2');
        return redirect()->route('ruang.index');
    }

    public function ruang1(){
        $data = Ruangan::where('dinas_id', Auth::user()->id)->get();
        return view('ruang.ListRuangan', compact('data'));
    }

    public function detail(Request $req){
        $ids = $req->id;
        $data = Ruangan::where('id', $ids)->get(); //data ruangan
        $data2 = Dinas::where('id', $data[0]->dinas_id)->get(); //data dinas
        $data3 = User::where('dinas_id', $data2[0]->id)->get(); //data penanggung jawab
        return view('ruang.DetailRuangan', compact('data', 'data2', 'data3'));
    }
}

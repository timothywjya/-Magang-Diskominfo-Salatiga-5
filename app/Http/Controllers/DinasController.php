<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DinasController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $dinas = Dinas::all();
        return view('dinas.index', [
            'dinas' => $dinas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('dinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'nama_dinas' => 'required',
            'alamat' => 'required',
        ]);

        Dinas::insert([
            'nama_dinas' => $request->nama_dinas,
            'alamat' => $request->alamat,
        ]);

        $request->session()->flash('message1');
        return redirect()->route('dinas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Dinas::find($id);
        return view('dinas.edit', compact('data'));
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
            'nama_dinas' => 'required',
            'alamat' => 'required',
        ]);
        $dinas = Dinas::find($id);
        $dinas->nama_dinas = $request->nama_dinas;
        $dinas->alamat = $request->alamat;
        $dinas->save();
        $request->session()->flash('message1');
        return redirect()->route('dinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        $id_login = Auth::id();
        $dinas_id_login = User::where('id', $id_login)->value('dinas_id');
        
        if ($id == $dinas_id_login){
            $request->session()->flash('message3');
        }else{
            $request->session()->flash('message2');
            $dinas = Dinas::find($id);
            $dinas->delete();
            $ruangan = Ruangan::where('dinas_id', $id)->delete();
            $operator = User::where('dinas_id', $id)->delete();
        }
        
        return redirect()->route('dinas.index');
        $request->session()->flash('message2');
    }
}

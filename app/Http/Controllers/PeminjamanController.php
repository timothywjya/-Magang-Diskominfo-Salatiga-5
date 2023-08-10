<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinas;
use App\Models\Ruangan;
use App\Models\User;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotifications;
use App\Mail\EmailNotificationsStatus;

class PeminjamanController extends Controller
{
    public function pinjam()
    {
        $operator_dinas_id = User::get('dinas_id'); 
        $data = Dinas::whereIn('id', $operator_dinas_id)->get();
        // $dinas_id = Dinas::get('id');
        $data_ruangan = Ruangan::all();
        
        // return Dinas::where('id', 102)->get('nama_dinas');
        
        return view('peminjaman.ViewPinjam', compact('data'));
    }
    
    public function simpanpinjaman(Request $request)
    {

        $ruang = Ruangan::find($request->ruangan_id);
        $dari = $request->waktu_awal;
        $sudah_dipinjam = false;
        foreach ($ruang->Peminjaman as $pinjam) {
            $awal = Carbon::parse($pinjam->waktu_awal);
            $akhir = Carbon::parse($pinjam->waktu_akhir);
            $sudah_dipinjam = Carbon::parse($dari)->between($awal, $akhir);
        }

        if ($sudah_dipinjam)
            return redirect(route('detail', ['id' => $request->ruangan_id]))->withInput($request->input())
                ->with('error', 'Maaf ruangan tersebut telah dipesan pada waktu dan tanggal tersebut, silahkan pilih waktu dan tanggal lain.');

        $pinjam = Peminjaman::insert([
            'dinas_dipinjam_id' => $request->dinas_dipinjam_id,
            'ruangan_id' => $request->ruangan_id,
            'waktu_awal' => $request->waktu_awal,
            'waktu_akhir' => $request->waktu_akhir,
            'dinas_peminjam_id' => $request->dinas_id,
            'nama_peminjam' => $request->nama,
            'keperluan' => $request->keperluan,
            'no_hp' => $request->no_hp
        ]);
        Mail::to($request->user_gmail)->send(new EmailNotifications);
        return redirect(route('detail', ['id' => $request->ruangan_id]))->with('success', 'Request anda sedang diproses');
    }

    public function lihatrequest()
    {
        $data = Peminjaman::where('dinas_dipinjam_id', Auth::user()->id)->get();
        return view('peminjaman.viewrequest', compact('data'));
    }

    public function KonfirmasiPinjaman(Request $request)
    {
        $ids = $request->id;
        $data = Peminjaman::where('id', $ids)->get();
        $data1 = user::where('id', $data[0]->dinas_peminjam_id)->get();
        return view('peminjaman.KonfirmasiPinjaman', compact('data', 'data1'));
    }

    public function KonfirmasiStore(Request $request, $id)
    {
        Peminjaman::find($id)->update([
            'status' => $request->status,
            'nama_peminjam' => $request->nama_peminjam,
            'keperluan' => $request->keperluan,
            'no_hp' => $request->no_hp
        ]);
        Mail::to($request->user_gmail)->send(new EmailNotificationsStatus);
        $request->session()->flash('message1');
        return redirect(route('lihatrequest'));
    }

    public function reqsaya()
    {
        $data = Peminjaman::where('dinas_peminjam_id', Auth::User()->id)->get();
        return view('peminjaman.PinjamanSaya', compact('data'));
    }
}

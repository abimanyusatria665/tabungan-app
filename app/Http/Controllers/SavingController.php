<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /* get untuk mendapatkan data yang ada di table saving lalu di simpan ke dalam variabel $saving yang nanti akan
           di kirim ke halaman index
        */
        $saving = Saving::get();
        //function sum berfungsi untuk menjumlahkan semua data yang ada di dalam table saving
        //hasil penjumlahan di simpan ke dalam variabel $money, jadi ketika pemanggilan total yang di panggil adalah $money
        $money = $saving->sum('saving');
        //fungsi compact adalah mengirim data yang ada di dalam variabel ke halaman tertentu
        return view ('Dashboard.index', compact('saving', 'money'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*validate berfungsi untuk validasi data sebelum data di masukan ke dalam database
         jadi sebelum data nya di kirim ke database di liat dulu data yang di input memenuhi kriteria
         atau belum, contoh di collumn name itu minimal 3 karakter, kalau input yang di masukan kurang dari
         3 karakter data nya gaakan di kirim, karena di validasi nya ada yang salah
        */
        $request->validate([
            'saving' => 'required',
            'name' => 'required|min:3',
            'nis' => 'required',
            'rombel' => 'required',
        ]);
        /* create berfungsi untuk membuat data, setelah di validasi baru di buat datanya
           jadi cara bacanya gini "buatlah data dari input saving, name, nis, dll ke dalam model Saving
           nanti model Saving akan mengirim data ke database, Fungsi \Carbon\Carbon::now() itu untuk mengambil waktu sekarang
           jadi data waktu yang akan di kirim ke database adalah detik pada saat kamu membuat data baru 
        */
        Saving::create([
            'saving'=>$request->saving,
            'name'=>$request->name,
            'nis'=>$request->nis,   
            'date_save'=> \Carbon\Carbon::now(),
            'rombel'=>$request->rombel,
           
        ]);

        return redirect('/dashboard')->with('successCreate', 'Successfullfy Saving');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function show(Saving $saving)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function setor($id)
    {
        /* Berfungsi mencari data dengan id tertentu sesuai dengan siswa tententu yang kamu pilih sebelumnya di halaman index */
        $saving = Saving::where('id', $id)->first();
        return view ('Dashboard.setor', compact('saving'));
    }

    public function tarik($id)
    {
        /* sama kayak yang setor */
        $saving = Saving::where('id', $id)->first();
        return view('Dashboard.tarik', compact('saving'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function updateTarik(Request $request, $id)
    {
        /* membuat validasi sebelum di update data uangnya */
        $request->validate([
            'uang' => 'required',
            'saving' => 'required'
        ]);
        /* mencari data spesifik siswa dengan id tertentu lalu mengambil data baru yang di masukan ke dalam input */
        Saving::where('id', $id)->update([
            'uang' => $request->uang,
           'saving' => $request->saving - $request->uang
        ]);
        /* return redirect berfungsi untuk mengarahkan kita ke halaman tertentu 
        setelah berhasil menjalankan function yang sudah di buat, with berfungsi membawa pesan ke dalam halaman
        yang di arahkan "redirect"
        */
        return redirect('/dashboard')->with('successEdit', 'YUHUUUUUUUUU!!');
    }


    public function updateSetor(Request $request, $id)
    {
    
        /* sama kayak yang updateTarik */

        $request->validate([
            'uang' => 'required',
            'saving' => 'required'
        ]);
        Saving::where('id', $id)->update([
            'uang' => $request->uang,
           'saving' => $request->saving + $request->uang
        ]);
        return redirect('/dashboard')->with('successEdit', 'YUHUUUUUUUUU!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saving  $saving
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* mencari data dengan id tertentu, lalu manjalankan function delete,
        function delete akan menghapus data dalam 1 row atau 1 baris. */
        $saving = Saving::findOrFail($id);
        $saving->delete();
        return redirect('/dashboard')->with('success-delete', 'Siiuuuuu');
    }
}

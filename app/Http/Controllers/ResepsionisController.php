<?php

namespace App\Http\Controllers;

use App\Models\add_fasilitas_ruangan;
use App\Models\Hotel;
use App\Models\jenis_ruangan;
use App\Models\Fasilitas;
use App\Models\reservasi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
use Carbon\Carbon;

class ResepsionisController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {

        if ($request->has('search')) {
            $reservasis = reservasi::where('id', 'LIKE', "%$request->search%")
                ->orWhere('nama', 'LIKE', "%$request->search%")
                ->orWhere('nik', 'LIKE', "%$request->search%")
                ->orWhere('no_kamar', 'LIKE', "%$request->search%")
                ->orWhere('tanggal_masuk', 'LIKE', "%$request->search%")
                ->orWhere('tanggal_keluar', 'LIKE', "%$request->search%")
                ->orWhere('tanggal_checkin', 'LIKE', "%$request->search%")
                ->orWhere('tanggal_checkout', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $reservasis = reservasi::latest()->paginate(10);
        }


        //render view with warehouse
        return view('resepsionis.index', compact('reservasis'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        

        //validate form
        $this->validate($request, [
            'no_kamar' => 'required',
            'nama' => 'required|min:5',
            'Jenis_suite' => 'required',
            'Jenis_kasur' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
        ]);

        //create post
        jenis_ruangan::create([
            'no_kamar' => $request->no_kamar,
            'nama' => $request->nama,
            'jenis_suite' => $request->Jenis_suite,
            'jenis_kasur' => $request->Jenis_kasur,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
        ]);

        //redirect to index
        return redirect()->route('jenis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $jenis_suite): View
    {
        //get  by jenis_suite
        $jenis_ruangan = DB::table('jenis_ruangan')
            ->where('jenis_suite', $jenis_suite)
            ->where('ketersediaan', 'ya')
            ->first();

        //render view with jenis_ruangan
        return view('reservasi.create', compact('jenis_ruangan'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'no_kamar' => 'required',
            'nama' => 'required|min:5',
            'email' => 'required',
            'no_telp' => 'required',
            'nik' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        $post = jenis_ruangan::findOrFail($id);

        $tanggal_masuk = Carbon::createFromFormat('m/d/Y', $request->input('tanggal_masuk'))->format('Y-m-d');
        $tanggal_keluar = Carbon::createFromFormat('m/d/Y', $request->input('tanggal_keluar'))->format('Y-m-d');

        reservasi::create([
            'no_kamar' => $request->no_kamar,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'nik' => $request->nik,
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_keluar' => $tanggal_keluar,
        ]);

        $tidak = "tidak";
        $post->update([
            'ketersediaan' => $tidak,
        ]);

        //redirect to index
        return redirect()->route('jenis.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Request $request, $id): RedirectResponse
    {

        //get jenis by ID
        $jenis = jenis_ruangan::findOrFail($id);

        //delete jenis
        $jenis->delete();

        //redirect to index
        return redirect()->route('jenis.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
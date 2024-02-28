<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_fasilitas_ruangan;
use App\Models\Hotel;
use App\Models\jenis_ruangan;
use App\Models\Fasilitas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $Hasilbasic = DB::table('jenis_ruangan')
            ->where('jenis_suite', 'basic')
            ->first();

        $Hasildeluxe = DB::table('jenis_ruangan')
            ->where('jenis_suite', 'deluxe')
            ->first();

        $Hasilexecutive = DB::table('jenis_ruangan')
            ->where('jenis_suite', 'executive')
            ->first();

        $harga_basic = $Hasilbasic ? $Hasilbasic->harga : 0;
        $harga_deluxe = $Hasildeluxe ?  $Hasildeluxe->harga : 0;
        $harga_executive = $Hasilexecutive ? $Hasilexecutive->harga : 0;

        $basicCount = DB::table('jenis_ruangan')
            ->where('jenis_suite', 'Basic')
            ->where('ketersediaan', 'ya')
            ->count();

        $deluxeCount = DB::table('jenis_ruangan')
            ->where('jenis_suite', 'Deluxe')
            ->where('ketersediaan', 'ya')
            ->count();

        $executiveCount = DB::table('jenis_ruangan')
            ->where('jenis_suite', 'Executive')
            ->where('ketersediaan', 'ya')
            ->count();

        //render view with warehouse
        return view('kamar.index', compact('harga_basic', 'harga_deluxe', 'harga_executive', 'basicCount', 'deluxeCount', 'executiveCount'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('jenis.create');
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
            'nama' => 'required|min:5',
            'Jenis_suite' => 'required',
            'Jenis_kasur' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
        ]);

        //create post
        jenis_ruangan::create([
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
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get Fasilitas by ID
        $Fasilitas = Fasilitas::findOrFail($id);

        //render view with Fasilitas
        return view('Fasilitas.show', compact('Fasilitas'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get Fasilitas by ID
        $Fasilitas = Fasilitas::findOrFail($id);

        //render view with Fasilitas
        return view('jenis.edit', compact('Fasilitas'));
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
            'nama' => 'required|min:5',
        ]);

        //get post by ID
        $post = Fasilitas::findOrFail($id);

        //update post with new image
        $post->update([
            'nama' => $request->nama,

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

<?php

namespace App\Http\Controllers;

use App\Models\add_fasilitas_ruangan;
use App\Models\Hotel;
use App\Models\jenis_ruangan;
use App\Models\Fasilitas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class Jenis_ruanganController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {

        if ($request->has('search')) {
            $jenis_ruangan = jenis_ruangan::where('id', 'LIKE', "%$request->search%")
                ->orWhere('nama', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $jenis_ruangan = jenis_ruangan::latest()->paginate(10);
        }


        //render view with warehouse
        return view('jenis.index', compact('jenis_ruangan'));
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
            'no_kamar' => 'required',
            'nama' => 'required|min:5',
            'Jenis_suite' => 'required',
            'Jenis_kasur' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
            'ketersediaan' => 'required',
        ]);

        //create post
        jenis_ruangan::create([
            'no_kamar' => $request->no_kamar,
            'nama' => $request->nama,
            'jenis_suite' => $request->Jenis_suite,
            'jenis_kasur' => $request->Jenis_kasur,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'ketersediaan' => $request->ketersediaan,
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
    public function edit(string $id): View
    {
        //get Fasilitas by ID
        $jenis_ruangan = jenis_ruangan::findOrFail($id);

        //render view with jenis_ruangan
        return view('jenis.edit', compact('jenis_ruangan'));
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
            'Jenis_suite' => 'required',
            'Jenis_kasur' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
        ]);

        //get post by ID
        $post = jenis_ruangan::findOrFail($id);

        //update post with new image
        $post->update([
            'no_kamar' => $request->no_kamar,
            'nama' => $request->nama,
            'jenis_suite' => $request->Jenis_suite,
            'jenis_kasur' => $request->Jenis_kasur,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
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
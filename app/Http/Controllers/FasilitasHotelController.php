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


class FasilitasHotelController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {

        if ($request->has('search')) {
            $fasilitas = fasilitas::where('id', 'LIKE', "%$request->search%")
                ->orWhere('nama', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $fasilitas = fasilitas::latest()->paginate(10);
        }


        //render view with warehouse
        return view('fasilitas_hotel.index', compact('fasilitas'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('fasilitas_hotel.create');
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
            'nama' => 'required',
        ]);

        //create post
        Fasilitas::create([
            'nama' => $request->nama,
        ]);

        //redirect to index
        return redirect()->route('fasilitashotel.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $fasilitas = fasilitas::findOrFail($id);

        //render view with jenis_ruangan
        return view('fasilitas_hotel.edit', compact('fasilitas'));
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
            'nama' => 'required',
        ]);

        //get post by ID
        $post = fasilitas::findOrFail($id);

        //update post with new image
        $post->update([
            'nama' => $request->nama,
        ]);


        //redirect to index
        return redirect()->route('fasilitashotel.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Request $request, $id): RedirectResponse
    {

        //get Fasilitas by ID
        $Fasilitas = Fasilitas::findOrFail($id);

        //delete Fasilitas
        $Fasilitas->delete();

        //redirect to index
        return redirect()->route('fasilitashotel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

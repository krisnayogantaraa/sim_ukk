<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {

        if ($request->has('search')) {
            $fasilitas = Fasilitas::where('id', 'LIKE', "%$request->search%")
                ->orWhere('nama', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $fasilitas = Fasilitas::latest()->paginate(10);
        }


        //render view with warehouse
        return view('fasilitas.index', compact('fasilitas'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('fasilitas.create');
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
        ]);

        //create post
        Fasilitas::create([
            'nama' => $request->nama,
        ]);

        //redirect to index
        return redirect()->route('fasilitas.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        return view('fasilitas.edit', compact('Fasilitas'));
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
        return redirect()->route('fasilitas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Request $request, $id): RedirectResponse
    {

        //get fasilitas by ID
        $fasilitas = Fasilitas::findOrFail($id);

        //delete fasilitas
        $fasilitas->delete();

        //redirect to index
        return redirect()->route('fasilitas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

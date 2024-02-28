<?php

namespace App\Http\Controllers;

use App\Models\add_fasilitas_ruangan;
use App\Models\Hotel;
use App\Models\Fasilitas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {

        $hotel = Hotel::latest()->first();


        //render view with warehouse
        return view('hotel.index', compact('hotel'));
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id_hotel): View
    {
        //get hotel by ID
        $Hotel = Hotel::findOrFail($id_hotel);

        //render view with hotel
        return view('hotel.edit', compact('Hotel'));
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
            'alamat' => 'required|min:5',
        ]);

        //get post by ID
        $post = Hotel::findOrFail($id);

        //update post with new image
        $post->update([
            'nama' => $request->nama,

        ]);


        //redirect to index
        return redirect()->route('hotel.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}

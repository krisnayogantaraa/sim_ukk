@extends('layouts.app')

@section('content')
<p class="text-5xl mb-24 dark:text-white">Data Hotel</p>



<div class="h-96">
    <div class="relative overflow-x-auto  sm:rounded-lg h-72 p-3 text-xl">
        <table class="w-full">
            <tr>
                <td style="width: 15%;">
                    <h1>Nama Hotel </h1>
                </td>
                <td style="width: 1%">: </td>
                <td>
                    <h1>{{ $hotel->nama }}</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <h1>Alamat</h1>
                </td>
                <td>: </td>
                <td>
                    <h1>{{ $hotel->alamat }}</h1>
                </td>
            </tr>
        </table>
        <div class="flex mt-10">
            <div class="mr-auto">
                <a href="{{ route('hotel.edit', $hotel->id) }}">
                    <button type="button"
                        class="focus:outline-none text-white font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-40">Ubah
                        Data Hotel</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
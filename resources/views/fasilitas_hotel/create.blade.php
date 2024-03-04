@extends('layouts.app')

@section('content')

<p class="text-5xl mb-3 text-gray-900 dark:text-white">DAFTAR FASILITAS HOTEL BARU</p>
<form action="{{ route('fasilitashotel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="ketersediaan" value="ya">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kamar</label>
            <input type="text" id="Nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Kolam Renang" required name="nama">
        </div>
        <input type="hidden" name="ketersediaan" value="ya">
    </div>
    <button type="submit" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
    <button type="reset" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-yellow-400 focus:ring-yellow-300  ">Reset</button>

</form>
</div>
@endsection
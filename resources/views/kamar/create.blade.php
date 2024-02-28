@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 text-gray-900 dark:text-white">DAFTAR JENIS KAMAR BARU</p>
<form action="{{ route('jenis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Jenis Kamar</label>
            <input type="text" id="Nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Bathub" required name="nama">
        </div>
        <div>
            <label for="jenis_suite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Jenis Suite</label>
            <select id="jenis_suite" name="Jenis_suite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>pilih jenis suite</option>
                <option value="Basic">Basic</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Executive">Executive</option>
            </select>
        </div>
        <div>
            <label for="Jenis_kasur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Jenis Kasur</label>
            <select id="Jenis_kasur" name="Jenis_kasur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>pilih jenis Kasur</option>
                <option value="Single">Single</option>
                <option value="Twin">Twin</option>
                <option value="Queen">Queen</option>
                <option value="King">King</option>
            </select>
        </div>
        <div>
            <label for="kapasitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">kapasitas Kamar</label>
            <input type="text" id="kapasitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Bathub" required name="kapasitas">
        </div>
        <div>
            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">harga Kamar / malam</label>
            <input type="text" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Bathub" required name="harga">
        </div>
    </div>
    <button type="submit" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
    <button type="reset" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-yellow-400 focus:ring-yellow-300  ">Reset</button>

</form>
</div>
@endsection
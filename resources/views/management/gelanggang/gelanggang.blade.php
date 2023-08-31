@extends('layouts.dashboard')
@section('container')
<header class="flex-col mt-[4%]">
    <p class="text-2xl">Gelanggang</p>
    <div class="lg:flex lg:justify-between my-4">
        <form action="#" method="get" enctype="multipart/form-data">
            <div class="relative py-2">
                <input type="search" name="search" value="{{ request('search') != '' ? request('search') : '' }}" class="block lg:w-[392px] w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
            </div>
        </form>

        <div class="flex justify-between">
            <!-- Tambah toggle -->
            <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button" class="w-full lg:w-auto text-white bg-blueDefault hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                Add
            </button>
        </div>

        <!-- Tambah modal -->
        <div id="add-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative lg:w-[50%] w-[95%] max-h-full">
                <!-- Tambah content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Gelanggang</h3>
                        <div class="border border-gray-300 my-6"></div>
                        <form class="space-y-6" action="/management/create-gelanggang" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="grid lg:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="nama_gelanggang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input value="{{ old('nama_gelanggang') }}" type="text" name="nama_gelanggang" id="nama_gelanggang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                </div>
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="juri1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Juri 1</label>
                                    <select id="juri1" name="juri1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Pilih Juri 1</option>
                                        @foreach($juri1C as $j1)
                                        <option value={{$j1->id}}>{{$j1->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid lg:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="juri2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Juri 2</label>
                                    <select id="juri2" name="juri2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Pilih Juri 2</option>
                                        @foreach($juri2C as $j2)
                                        <option value={{$j2->id}}>{{$j2->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="juri3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Juri 3</label>
                                    <select id="juri3" name="juri3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Pilih Juri 3</option>
                                        @foreach($juri3C as $j3)
                                        <option value={{$j3->id}}>{{$j3->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid lg:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="dewan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dewan</label>
                                    <select id="dewan" name="dewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Pilih Dewan</option>
                                        @foreach($dewanC as $d)
                                        <option value={{$d->id}}>{{$d->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="operator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operator</label>
                                    <select id="operator" name="operator" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Pilih Operator</option>
                                        @foreach($operatorC as $o)
                                        <option value={{$o->id}}>{{$o->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-[35px]">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Gelanggang
            </th>
            <th scope="col" class="px-6 py-3">
                Juri 1
            </th>
            <th scope="col" class="px-6 py-3">
                Juri 2
            </th>
            <th scope="col" class="px-6 py-3">
                Juri 3
            </th>
            <th scope="col" class="px-6 py-3">
                Dewan
            </th>
            <th scope="col" class="px-6 py-3">
                Operator
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            @foreach($gelanggangs as $g)
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
            </th>
            <td class="px-6 py-4">
                {{ $g['nama_gelanggang'] }}
            </td>
            @foreach(['Juri Pertama', 'Juri Kedua', 'Juri Ketiga', 'Dewan', 'Operator'] as $role)
            <td class="px-6 py-4">
                @foreach($g['peran_user'] as $pu)
                @if ($pu['nama_role'] == $role)
                {{ $pu['nama_user'] }}
                @endif
                @endforeach
            </td>
            @endforeach
            <td class="px-6 py-4 flex">
                <!-- Edit Modal -->
                <button data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="mr-4 whitespace-nowrap block text-white bg-blueDefault hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center" type="button">
                    Edit Pertandingan
                </button>
                <!-- Delete Modal -->
                <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="whitespace-nowrap block text-white bg-redDefault hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center" type="button">
                    Delete Pertandingan
                </button>

                <!-- Edit modal -->
                <div id="edit-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative lg:w-[50%] w-[95%] max-h-full">
                        <!-- Tambah content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Pertandingan</h3>
                                <div class="border border-gray-300 my-6"></div>
                                <form class="space-y-6" action="#" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid lg:grid-cols-2 md:gap-6">
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="nama_gelanggang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                            <input value="{{ old('nama_gelanggang') }}" type="text" name="nama_gelanggang" id="nama_gelanggang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="juri1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Juri 1</label>
                                            <select id="juri1" name="juri1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Juri 1</option>
                                                @foreach($juri1C as $j1)
                                                <option value={{$j1->id}}>{{$j1->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid lg:grid-cols-2 md:gap-6">
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="juri2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Juri 2</label>
                                            <select id="juri2" name="juri2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Juri 2</option>
                                                @foreach($juri2C as $j2)
                                                <option value={{$j2->id}}>{{$j2->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="juri3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Juri 3</label>
                                            <select id="juri3" name="juri3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Juri 3</option>
                                                @foreach($juri3C as $j3)
                                                <option value={{$j3->id}}>{{$j3->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid lg:grid-cols-2 md:gap-6">
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="dewan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dewan</label>
                                            <select id="dewan" name="dewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Dewan</option>
                                                @foreach($dewanC as $d)
                                                <option value={{$d->id}}>{{$d->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="operator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operator</label>
                                            <select id="operator" name="operator" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Operator</option>
                                                @foreach($operatorC as $o)
                                                <option value={{$o->id}}>{{$o->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete modal -->
                <div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin menghapus pertandingan ini?</h3>
                                <button data-modal-hide="delete-modal" type="button" class="text-white bg-redDefault hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Iya, saya yakin
                                </button>
                                <button data-modal-hide="delete-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Tidak, batalkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

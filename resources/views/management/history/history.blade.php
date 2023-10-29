@extends('layouts.dashboard')
@section('container')
<header class="flex-col mt-[4%]">
    <p class="text-2xl">History</p>
    <div class="lg:flex lg:justify-between my-4">
        <form action="#" method="get" enctype="multipart/form-data">
            <div class="relative py-2">
                <input type="search" name="search" value="{{ request('search') != '' ? request('search') : '' }}" class="block lg:w-[392px] w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
            </div>
        </form>

{{--        <button type="button" class="w-full lg:w-auto text-white bg-blueDefault hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">--}}
{{--            Export--}}
{{--        </button>--}}
    </div>
</header>
@if ($message = session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400 text-center" role="alert">
        <span class="font-medium">{{ $message }}</span>
    </div>
@endif

@if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400 text-center" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li><span class="font-medium">{{ $error }}</span></li>
            @endforeach
        </ul>
    </div>
@endif
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-[35px]">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Partai
            </th>
            <th scope="col" class="px-6 py-3">
                Babak
            </th>
            <th scope="col" class="px-6 py-3">
                Round Terakhir
            </th>
            <th scope="col" class="px-6 py-3">
                Jenis kelamin
            </th>
            <th scope="col" class="px-6 py-3">
                Sudut Merah
            </th>
            <th scope="col" class="px-6 py-3">
                Sudut Biru
            </th>
            <th scope="col" class="px-6 py-3">
                Kontingen Merah
            </th>
            <th scope="col" class="px-6 py-3">
                Kontingen Biru
            </th>
            <th scope="col" class="px-6 py-3">
                Pemenang
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $record)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{$record->partai}} {{$record->kelas}}
                </td>
                <td class="px-6 py-4">
                    {{$record->babak}}
                </td>
                <td class="px-6 py-4">
                    {{$record->round_time}}
                </td>
                <td class="px-6 py-4">
                    {{$record->jenis_kelamin}}
                </td>
                <td class="px-6 py-4">
                    {{$record->sudut_merah}}
                </td>
                <td class="px-6 py-4">
                    {{$record->sudut_biru}}
                </td>
                <td class="px-6 py-4">
                    {{$record->kontingen_merah}}
                </td>
                <td class="px-6 py-4">
                    {{$record->kontingen_biru}}
                </td>
                <td class="px-6 py-4">
                    {{$record->pemenang}}
                </td>
                <td class="px-6 py-4 flex">
                    <!-- Edit Modal -->
                    <button data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="mr-4 whitespace-nowrap block text-white bg-blueDefault hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center" type="button">
                        Detail
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
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Peserta</h3>
                                    <div class="border border-gray-300 my-6"></div>
                                    <form class="space-y-6" action="#" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid lg:grid-cols-2 md:gap-6">
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                <input value="{{ old('name') }}" type="text" name="name" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis kelamin</label>
                                                <input value="{{ old('kelamin') }}" type="text" name="kelamin" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="grid lg:grid-cols-1 md:gap-6">
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="kontigen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontigen</label>
                                                <input value="{{ old('kontigen') }}" type="text" name="kontigen" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="grid lg:grid-cols-2 md:gap-6">
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="bb" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat badan</label>
                                                <input value="{{ old('bb') }}" type="number" name="bb" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="tb" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi badan</label>
                                                <input value="{{ old('tb') }}" type="number" name="tb" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                        </div>
                                    </form>
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
{{ $data->appends(request()->except('page'))->onEachSide(1)->links('partials.pagination') }}
@endsection

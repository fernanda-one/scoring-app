@extends('layouts.dashboard')
@section('container')
<header class="flex-col mt-[4%]">
    <p class="text-2xl">Riwayat Pertandingan</p>
    <div class="lg:flex lg:justify-between my-4">
        <form action="#" method="get" enctype="multipart/form-data">
            <div class="relative py-2">
                <input type="search" name="search" value="{{ request('search') != '' ? request('search') : '' }}" class="block lg:w-[392px] w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari . . .">
            </div>
        </form>

{{--        <button type="button" class="w-full lg:w-auto text-white bg-blueDefault hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">--}}
{{--            Expor--}}
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
                Ronde Terakhir
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
                Tindakan
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
                    <button data-modal-target="delete-modal-{{$record->id}}" data-modal-toggle="delete-modal-{{$record->id}}" class="whitespace-nowrap block text-white bg-redDefault hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center" type="button">
                        Hapus
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @foreach($data as $record)
        <div id="delete-modal-{{$record->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal-{{$record->id}}">
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
                        <form action="/delete-history/{{$record->partai}}" method="post" class="inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Iya, saya yakin
                            </button>
                        </form>
                        <button data-modal-hide="delete-modal-{{$record->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Tidak, batalkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $data->appends(request()->except('page'))->onEachSide(1)->links('partials.pagination') }}
@endsection

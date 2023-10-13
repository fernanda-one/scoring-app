<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PENCAK SILAT | {{ $title }}</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        body {
            font-family: "Poppins";
        }
    </style>
</head>
<body>
    <label for="user"></label><input id="user" type="text" hidden="hidden" data-user="{{$gelanggang}}">
    <div class="w-[52.75rem] h-[24.375rem] mx-auto my-auto">
        <div class="mx-auto mt-3">
            <div  class="mx-auto flex justify-center space-x-[3.125rem] mt-1">
                <button id="status_dewan" disabled class="w-[12.5rem] border-black border-[1px] h-9 bg-gray-200">
                    DEWAN
                </button>
                <button id="status_ketua" disabled class="w-[12.5rem] border-black border-[1px] h-9 bg-gray-200">
                    KETUA
                </button>
            </div>
            <div class="mx-auto flex justify-center mt-4 space-x-[3.125rem]">
                <button id="status_juri_pertama" disabled class="w-[12.5rem] border-black border-[1px] bg-yellowDefault h-9">
                    JURI 1
                </button>
                <button id="status_juri_kedua" disabled class="w-[12.5rem] border-black border-[1px] h-9 bg-gray-200">
                    JURI II
                </button>
                <button id="status_juri_ketiga" disabled class="w-[12.5rem] border-black border-[1px] h-9 bg-gray-200">
                    JURI III
                </button>
            </div>
        </div>
        <div class="flex mt-4 justify-between mx-4">
            <div class="flex-row space-y-[2.625rem] my-4 ">
                <div class="flex space-x-3">
                    <span class="flex justify-center items-center w-16 h-16 border-[2px] border-black font-bold">
                        {{$partai_pertama[0]->id}} {{$partai_pertama[0]->kelas}}
                    </span>
                    <div class="flex-row space-y-2">
                        <span class="flex justify-center items-center w-48 h-7 font-bold text-white bg-redDark">
                           {{$partai_pertama[0]->sudut_merah}}
                        </span>
                        <span class="flex justify-center items-center w-48 h-7 font-bold text-black border-black border-[2px] ">
                           JEPARA
                        </span>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <span class="flex justify-center items-center w-16 h-16 border-[2px] border-black font-bold">
                        {{$partai_kedua[0]->id}} {{$partai_kedua[0]->kelas}}
                    </span>
                    <div class="flex-row space-y-2">
                        <span class="flex justify-center items-center w-48 h-7 font-bold text-white bg-redDark">
                           {{$partai_kedua[0]->sudut_merah}}
                        </span>
                        <span class="flex justify-center items-center w-48 h-7 font-bold text-black border-black border-[2px] ">
                           JEPARA
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-[0.875rem]">
                <button class="w-36 h-14 bg-yellowDefault border-[2px] border-black font-medium">
                    Rounde I
                </button>
                <button class="w-36 h-14 border-[2px] border-black font-medium">
                    Rounde II
                </button>
                <button class="w-36 h-14 border-[2px] border-black font-medium">
                    Rounde III
                </button>
            </div>
            <div class="flex-row space-y-[2.625rem] my-4">
                <div class="flex space-x-3">
                    <div class="flex-row space-y-2">
                        <span class="flex justify-center items-center w-48 h-7 font-bold text-white bg-blueDark">
                             {{$partai_pertama[0]->sudut_biru}}
                        </span>
                        <span class="flex justify-center items-center w-48 h-7 font-bold text-black border-black border-[2px] ">
                           JEPARA
                        </span>
                    </div>
                    <span class="flex justify-center items-center w-16 h-16 border-[2px] border-black font-bold">
                        {{$partai_pertama[0]->id}} {{$partai_pertama[0]->kelas}}
                    </span>
                </div>
                <div class="flex space-x-3">
                    <div class="flex-row space-y-2">
                        <span class="flex justify-center items-center w-48 h-7 font-bold text-white bg-blueDark">
                             {{$partai_kedua[0]->sudut_biru}}
                        </span>
                        <span class="flex justify-center items-center w-48 h-7 font-bold text-black border-black border-[2px] ">
                           JEPARA
                        </span>
                    </div>
                    <span class="flex justify-center items-center w-16 h-16 border-[2px] border-black font-bold">
                        {{$partai_kedua[0]->id}} {{$partai_kedua[0]->kelas}}
                    </span>
                </div>
            </div>
        </div>
        <div class="flex justify-center mx-auto space-x-5 mt-6">
            <button class="w-24 h-8 border-[2px] border-black">
                START
            </button>
            <button class="w-24 h-8 border-[2px] border-black">
                PAUSE
            </button><button class="w-24 h-8 border-[2px] border-black">
                FINISH
            </button>
            <a href="{{ $partai_pertama->previousPageUrl() }}">
                <button class="w-24 h-8 border-[2px] border-black">
                    PREV
                </button>
            </a>
            <a href="{{ $partai_pertama->nextPageUrl() }}">
                <button class="w-24 h-8 border-[2px] border-black">
                    NEXT
                </button>
            </a>
        </div>
    </div>
    <script src="{{ mix('js/scoreUpdate.js') }}"></script>
</body>
</html>

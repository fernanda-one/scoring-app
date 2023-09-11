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
<div class="flex justify-center mt-[5%] ml-[1%] mr-[1%]">
    <!--center side-->
    <div class="flex flex-col justify-center items-center w-[70%]">
        <div class="flex justify-between w-[100%]">
            <button type="button" class="flex justify-center items-center w-[25%] bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-6 mb-6">
                <p class="font-bold text-whiteDefault text-lg">START ROUND</p>
            </button>
            <button type="button" class="flex justify-center items-center w-[25%] bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-6 mb-6">
                <p class="font-bold text-whiteDefault text-lg">FINISH ROUND</p>
            </button>
            <button type="button" class="flex justify-center items-center w-[25%] bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-6 mb-6">
                <p class="font-bold text-whiteDefault text-lg">PREF ROUND</p>
            </button>
            <button type="button" class="flex justify-center items-center w-[25%] bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-6 mb-6">
                <p class="font-bold text-whiteDefault text-lg">NEXT ROUND</p>
            </button>
        </div>
        <div class="flex justify-between w-[100%]">
            <button type="button" class="flex justify-center items-center w-[25%] bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-6 mb-6">
                <p class="font-bold text-whiteDefault text-lg">START PARTAi</p>
            </button>
            <button type="button" class="flex justify-center items-center w-[25%] bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-6 mb-6">
                <p class="font-bold text-whiteDefault text-lg">FINISH PARTAI</p>
            </button>
            <button type="button" class="flex justify-center items-center w-[25%] bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-6 mb-6">
                <p class="font-bold text-whiteDefault text-lg">PREF PARTAI</p>
            </button>
            <button type="button" class="flex justify-center items-center w-[25%] bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-6 mb-6">
                <p class="font-bold text-whiteDefault text-lg">NEXT PARTAI</p>
            </button>
        </div>
    </div>
</div>
</body>
</html>

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
<header>
    <div class="flex justify-between">
        <div>
            <div class="flex justify-start pl-6 w-[200px] 2xl:w-[600px] xl:w-[500px] lg:w-[395px] md:w-[280px] bg-redDefault py-3 rounded-br-[90px]">
                <p class="font-bold text-whiteDefault text-xl">Adi Nugraha</p>
            </div>
            <div class="flex justify-start pl-6 w-[150px] xl:w-[300px] lg:w-[250px] md:w-[200px] bg-redDark py-2 rounded-br-[90px]">
                <p class="text-whiteDefault text-base">Jepara</p>
            </div>
        </div>
        <div>
            <div class="flex mx-auto justify-center w-[150px] 2xl:w-[325px] xl:w-[285px] lg:w-[230px] md:w-[205px] bg-grayDefault py-3 rounded-b-[90px]">
                <p class="font-bold text-whiteDefault text-xl">SEMI-FINAL</p>
            </div>
            <div class="flex mx-auto justify-center w-[100px] 2xl:w-[200px] xl:w-[185px] lg:w-[140px] md:w-[105px] bg-grayDark py-2 rounded-b-[90px]">
                <p class="font-bold text-whiteDefault text-base">ROUND 1</p>
            </div>
        </div>
        <div>
            <div class="flex justify-end pr-6 w-[200px] 2xl:w-[600px] xl:w-[500px] lg:w-[395px] md:w-[280px] sm:w-[200px] bg-blueDefault py-3 rounded-bl-[90px]">
                <p class="font-bold text-whiteDefault text-xl">Adi Nugraha</p>
            </div>
            <div class="flex ml-auto justify-end pr-6 w-[150px] xl:w-[300px] lg:w-[250px] md:w-[200px] bg-blueDark py-2 rounded-bl-[90px]">
                <p class="text-whiteDefault text-base">Jepara</p>
            </div>
        </div>
    </div>
</header>

<div class="flex justify-between">
    <div class="w-full flex mt-[5%]">
        <div class="bg-redDefault py-3 w-[70%] rounded-r-[20px] pl-6">
            <p class="text-whiteDefault">1, 2, 1, 1, 1, 2</p>
        </div>
        <div class="flex items-center justify-center w-[54px] h-[54px] bg-redDefault rounded-full ml-[2%]">
            <p class="text-whiteDefault">8</p>
        </div>
    </div>
    <div class="w-full flex mt-[5%] justify-end">
        <div class="flex items-center justify-center w-[54px] h-[54px] bg-blueDefault rounded-full mr-[2%]">
            <p class="text-whiteDefault">8</p>
        </div>
        <div class="bg-blueDefault py-3 w-[70%] rounded-l-[20px] pr-6">
            <p class="text-whiteDefault text-right">1, 2, 1, 1, 1, 2</p>
        </div>
    </div>
</div>
<div class="flex justify-between">
    <div class="w-full flex mt-[2%]">
        <div class="bg-grayDefault py-3 w-[70%] rounded-r-[20px] pl-6">
            <p class="text-whiteDefault"></p>
        </div>
        <div class="flex items-center justify-center w-[54px] h-[54px] bg-grayDefault rounded-full ml-[2%]">
            <p class="text-whiteDefault"></p>
        </div>
    </div>
    <div class="w-full flex mt-[2%] justify-end">
        <div class="flex items-center justify-center w-[54px] h-[54px] bg-grayDefault rounded-full mr-[2%]">
            <p class="text-whiteDefault"></p>
        </div>
        <div class="bg-grayDefault py-3 w-[70%] rounded-l-[20px] pr-6">
            <p class="text-whiteDefault text-right"></p>
        </div>
    </div>
</div>
<div class="flex justify-between">
    <div class="w-full flex mt-[2%]">
        <div class="bg-grayDefault py-3 w-[70%] rounded-r-[20px] pl-6">
            <p class="text-whiteDefault"></p>
        </div>
        <div class="flex items-center justify-center w-[54px] h-[54px] bg-grayDefault rounded-full ml-[2%]">
            <p class="text-whiteDefault"></p>
        </div>
    </div>
    <div class="w-full flex mt-[2%] justify-end">
        <div class="flex items-center justify-center w-[54px] h-[54px] bg-grayDefault rounded-full mr-[2%]">
            <p class="text-whiteDefault"></p>
        </div>
        <div class="bg-grayDefault py-3 w-[70%] rounded-l-[20px] pr-6">
            <p class="text-whiteDefault text-right"></p>
        </div>
    </div>
</div>

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

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
                <p class="font-bold text-whiteDefault text-xl">DEWAN JURI</p>
            </div>
            <div class="flex mx-auto justify-center w-[100px] 2xl:w-[200px] xl:w-[185px] lg:w-[140px] md:w-[105px] bg-grayDark py-2 rounded-b-[90px]">
                <p class="flex items-center text-whiteDefault font-bold text-base">6 - 10
                    <button class="ml-1 mb-[10%]" data-popover-target="popover-description" data-popover-placement="bottom-start" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 9 9" fill="none">
                            <g clip-path="url(#clip0_154_1275)">
                                <path d="M4.125 6.375H4.875V4.125H4.125V6.375ZM4.5 3.375C4.60625 3.375 4.69538 3.339 4.76738 3.267C4.83938 3.195 4.87525 3.106 4.875 3C4.875 2.89375 4.839 2.80463 4.767 2.73263C4.695 2.66063 4.606 2.62475 4.5 2.625C4.39375 2.625 4.30463 2.661 4.23263 2.733C4.16063 2.805 4.12475 2.894 4.125 3C4.125 3.10625 4.161 3.19538 4.233 3.26738C4.305 3.33938 4.394 3.37525 4.5 3.375ZM4.5 8.25C3.98125 8.25 3.49375 8.1515 3.0375 7.9545C2.58125 7.7575 2.18438 7.49038 1.84688 7.15313C1.50938 6.81563 1.24225 6.41875 1.0455 5.9625C0.84875 5.50625 0.75025 5.01875 0.75 4.5C0.75 3.98125 0.8485 3.49375 1.0455 3.0375C1.2425 2.58125 1.50963 2.18438 1.84688 1.84688C2.18438 1.50938 2.58125 1.24225 3.0375 1.0455C3.49375 0.84875 3.98125 0.75025 4.5 0.75C5.01875 0.75 5.50625 0.8485 5.9625 1.0455C6.41875 1.2425 6.81563 1.50963 7.15313 1.84688C7.49063 2.18438 7.75788 2.58125 7.95488 3.0375C8.15188 3.49375 8.25025 3.98125 8.25 4.5C8.25 5.01875 8.1515 5.50625 7.9545 5.9625C7.7575 6.41875 7.49038 6.81563 7.15313 7.15313C6.81563 7.49063 6.41875 7.75788 5.9625 7.95488C5.50625 8.15188 5.01875 8.25025 4.5 8.25ZM4.5 7.5C5.3375 7.5 6.04688 7.20938 6.62813 6.62813C7.20938 6.04688 7.5 5.3375 7.5 4.5C7.5 3.6625 7.20938 2.95313 6.62813 2.37188C6.04688 1.79063 5.3375 1.5 4.5 1.5C3.6625 1.5 2.95313 1.79063 2.37188 2.37188C1.79063 2.95313 1.5 3.6625 1.5 4.5C1.5 5.3375 1.79063 6.04688 2.37188 6.62813C2.95313 7.20938 3.6625 7.5 4.5 7.5Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_154_1275">
                                    <rect width="9" height="9" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </p>
                <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-whiteDefault transition-opacity duration-300 bg-greenDefault border border-gray-200 rounded-lg shadow-sm opacity-0 w-72">
                    <div class="p-3 space-y-2">
                        <div class="p-4">
                            <table class="w-full">
                                <tbody>
                                    <tr>
                                        <td class="py-2">CLASS/GENDER</td>
                                        <td class="py-2">: F/M</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">COMPETITION NO</td>
                                        <td class="py-2">: 50</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">REFEREE NAME</td>
                                        <td class="py-2">: IPSI</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div data-popper-arrow></div>
                </div>
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

<!--round 1-->
<div class="flex justify-between">
    <!--left side-->
    <div class="flex flex-col w-[38%] h-[288px] rounded-[8px] ml-[1%] mt-[5%] border-[1px] border-grayDefault drop-shadow-xl">
        <div class="border-b border-grayDefault bg-redDefault rounded-t-[7px]">
            <p class="flex justify-center my-2 text-whiteDefault">RED</p>
        </div>
        <div class="flex bg-redOpacity rounded-b-[8px]">
            <div class="w-[25%]">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center text-base h-[40px] ml-[4%]">Juror 1</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">Juror 2</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">Juror 3</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">POINT</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">DROPPING</p>
                </div>
                <div>
                    <p class="flex items-center h-[40px] ml-[4%]">Penalty</p>
                </div>
            </div>
            <div class="w-[75%] border-l border-grayDefault">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div>
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
            </div>
        </div>
    </div>

    <!--center side-->
    <div class="flex items-center mt-[5%] w-[15%] h-[288px] drop-shadow-xl">
        <div class="flex flex-col w-full h-[190px] rounded-[8px] bg-greenDefault">
            <div class="flex flex-col items-center justify-center border-b-[2px] h-[50%]">
                <p class="font-bold text-2xl text-whiteDefault">ROUND</p>
                <p class="font-bold text-2xl text-whiteDefault">1</p>
            </div>
            <div class="flex justify-between w-full h-[50%]">
                <p class="flex items-center justify-center w-[50%] border-r-[2px] font-bold text-xl text-whiteDefault">6</p>
                <p class="flex items-center justify-center w-[50%] font-bold text-xl text-whiteDefault">10</p>
            </div>
        </div>
    </div>

    <!--right side-->
    <div class="flex flex-col w-[38%] h-[288px] rounded-[8px] mr-[1%] mt-[5%] border-[1px] border-grayDefault drop-shadow-xl">
        <div class="border-b border-grayDefault bg-blueDefault rounded-t-[7px]">
            <p class="flex justify-center my-2 text-whiteDefault">BLUE</p>
        </div>
        <div class="flex bg-blueOpacity rounded-b-[8px]">
            <div class="w-[75%] border-r border-grayDefault">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div>
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
            </div>
            <div class="w-[25%]">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 1</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 2</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 3</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">POINT</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">DROPPING</p>
                </div>
                <div>
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Penalty</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--round 2-->
<div class="flex justify-between">
    <!--left side-->
    <div class="flex flex-col w-[38%] h-[288px] rounded-[8px] ml-[1%] mt-[5%] border-[1px] border-grayDefault drop-shadow-xl">
        <div class="border-b border-grayDefault bg-redDefault rounded-t-[7px]">
            <p class="flex justify-center my-2 text-whiteDefault">RED</p>
        </div>
        <div class="flex bg-redOpacity rounded-b-[8px]">
            <div class="w-[25%]">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center text-base h-[40px] ml-[4%]">Juror 1</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">Juror 2</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">Juror 3</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">POINT</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">DROPPING</p>
                </div>
                <div>
                    <p class="flex items-center h-[40px] ml-[4%]">Penalty</p>
                </div>
            </div>
            <div class="w-[75%] border-l border-grayDefault">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div>
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
            </div>
        </div>
    </div>

    <!--center side-->
    <div class="flex items-center mt-[5%] w-[15%] h-[288px] drop-shadow-xl">
        <div class="flex flex-col w-full h-[190px] rounded-[8px] bg-greenDefault">
            <div class="flex flex-col items-center justify-center border-b-[2px] h-[50%]">
                <p class="font-bold text-2xl text-whiteDefault">ROUND</p>
                <p class="font-bold text-2xl text-whiteDefault">2</p>
            </div>
            <div class="flex justify-between w-full h-[50%]">
                <p class="flex items-center justify-center w-[50%] border-r-[2px] font-bold text-xl text-whiteDefault">6</p>
                <p class="flex items-center justify-center w-[50%] font-bold text-xl text-whiteDefault">10</p>
            </div>
        </div>
    </div>

    <!--right side-->
    <div class="flex flex-col w-[38%] h-[288px] rounded-[8px] mr-[1%] mt-[5%] border-[1px] border-grayDefault drop-shadow-xl">
        <div class="border-b border-grayDefault bg-blueDefault rounded-t-[7px]">
            <p class="flex justify-center my-2 text-whiteDefault">BLUE</p>
        </div>
        <div class="flex bg-blueOpacity rounded-b-[8px]">
            <div class="w-[75%] border-r border-grayDefault">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div>
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
            </div>
            <div class="w-[25%]">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 1</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 2</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 3</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">POINT</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">DROPPING</p>
                </div>
                <div>
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Penalty</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--round 3-->
<div class="flex justify-between">
    <!--left side-->
    <div class="flex flex-col w-[38%] h-[288px] rounded-[8px] ml-[1%] mt-[5%] border-[1px] border-grayDefault drop-shadow-xl">
        <div class="border-b border-grayDefault bg-redDefault rounded-t-[7px]">
            <p class="flex justify-center my-2 text-whiteDefault">RED</p>
        </div>
        <div class="flex bg-redOpacity rounded-b-[8px]">
            <div class="w-[25%]">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center text-base h-[40px] ml-[4%]">Juror 1</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">Juror 2</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">Juror 3</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">POINT</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[4%]">DROPPING</p>
                </div>
                <div>
                    <p class="flex items-center h-[40px] ml-[4%]">Penalty</p>
                </div>
            </div>
            <div class="w-[75%] border-l border-grayDefault">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
                <div>
                    <p class="flex items-center h-[40px] ml-[2%]"></p>
                </div>
            </div>
        </div>
    </div>

    <!--center side-->
    <div class="flex items-center mt-[5%] w-[15%] h-[288px] drop-shadow-xl">
        <div class="flex flex-col w-full h-[190px] rounded-[8px] bg-greenDefault">
            <div class="flex flex-col items-center justify-center border-b-[2px] h-[50%]">
                <p class="font-bold text-2xl text-whiteDefault">ROUND</p>
                <p class="font-bold text-2xl text-whiteDefault">3</p>
            </div>
            <div class="flex justify-between w-full h-[50%]">
                <p class="flex items-center justify-center w-[50%] border-r-[2px] font-bold text-xl text-whiteDefault">6</p>
                <p class="flex items-center justify-center w-[50%] font-bold text-xl text-whiteDefault">10</p>
            </div>
        </div>
    </div>

    <!--right side-->
    <div class="flex flex-col w-[38%] h-[288px] rounded-[8px] mr-[1%] mt-[5%] border-[1px] border-grayDefault drop-shadow-xl">
        <div class="border-b border-grayDefault bg-blueDefault rounded-t-[7px]">
            <p class="flex justify-center my-2 text-whiteDefault">BLUE</p>
        </div>
        <div class="flex bg-blueOpacity rounded-b-[8px]">
            <div class="w-[75%] border-r border-grayDefault">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
                <div>
                    <p class="flex items-center justify-end h-[40px] mr-[2%]"></p>
                </div>
            </div>
            <div class="w-[25%]">
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 1</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 2</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Juror 3</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">POINT</p>
                </div>
                <div class="border-b border-grayDefault">
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">DROPPING</p>
                </div>
                <div>
                    <p class="flex items-center justify-end h-[40px] mr-[4%]">Penalty</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

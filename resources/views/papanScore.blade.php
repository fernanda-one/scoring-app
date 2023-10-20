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
</head>
<body class="font-poppins">
    <header>
        <label for="user"></label><input id="user" type="text" hidden="hidden" data-user="{{$gelangang}}" detail-user="{{auth()->user()}}">
        <div class="flex justify-between uppercase">
            <div>
                <div class="flex justify-start pl-6 w-[200px] 2xl:w-[600px] xl:w-[500px] lg:w-[395px] md:w-[280px] bg-redDefault py-3 rounded-br-[90px] shadow-inset-custom">
                    <p id="nama_merah" class="font-bold text-whiteDefault text-base lg:text-2xl">SUDUT MERAH</p>
                </div>
                <div class="flex justify-start pl-6 w-[150px] xl:w-[300px] lg:w-[250px] md:w-[200px] bg-redDark py-2 rounded-br-[90px] shadow-inset-custom">
                    <p id="kontingen_merah" class="text-whiteDefault text-sm lg:text-xl">Kontingen</p>
                </div>
            </div>
            <div>
                <div class="flex mx-auto justify-center w-[150px] 2xl:w-[325px] xl:w-[285px] lg:w-[230px] md:w-[205px] bg-grayDefault py-3 rounded-b-[90px] shadow-inset-custom">
                    <p id="babak" class="font-extrabold text-whiteDefault text-lg lg:text-xl">BABAK</p>
                </div>
                <div class="flex mx-auto justify-center w-[100px] 2xl:w-[200px] xl:w-[185px] lg:w-[140px] md:w-[105px] bg-grayDark py-2 rounded-b-[90px] shadow-inset-custom">
                    <p id="round" class="font-extrabold text-whiteDefault text-sm lg:text-base">ROUND</p>
                </div>
            </div>
            <div>
                <div class="flex justify-end pr-6 w-[200px] 2xl:w-[600px] xl:w-[500px] lg:w-[395px] md:w-[280px] sm:w-[200px] bg-blueDefault py-3 rounded-bl-[90px] shadow-inset-custom">
                    <p id="nama_biru" class="font-bold text-whiteDefault text-base lg:text-2xl">SUDUT BIRU</p>
                </div>
                <div class="flex ml-auto justify-end pr-6 w-[150px] xl:w-[300px] lg:w-[250px] md:w-[200px] bg-blueDark py-2 rounded-bl-[90px] shadow-inset-custom">
                    <p id="kontingen_biru" class="text-whiteDefault text-sm lg:text-xl">Kontingen</p>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center w-full h-[200px]">
                <div class="w-[12rem] h-[8rem] bg-grayDark rounded-xl flex flex-col items-center justify-center gap-5 text-whiteDefault shadow-inset-custom">
                    <p class="text-base lg:text-lg font-semibold">Timer</p>
                    <p class="text-base lg:text-lg font-semibold">00 : 00</p>
                </div>
        </div>
        <x-drop-verification-result/>
    </header>

    <div class="flex justify-between mt-[3%] overflow-hidden">
        <div class="flex h-[450px] w-[50%]">
            <div class="flex items-center justify-center w-[40%] lg:w-[45%] h-screen lg:h-[70%] rounded-r-[30px] bg-redDefault">
                <p id="redScore" class="text-whiteDefault text-6xl md:text-8xl lg:text-9xl font-bold">0</p>
            </div>

            <div class="flex flex-col justify-start w-[60%] lg:w-[55%] h-screen lg:h-[70%] mx-[3.5%]">
                <div class="flex justify-between w-[100%]">
                    <div class="flex justify-center items-center w-[25%] bg-redDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="47" viewBox="0 0 45 47" fill="none">
                            <path d="M23.6406 14.708L18.735 10.7835C18.0497 10.2352 17.2062 9.95971 16.3506 10.0048C15.495 10.0498 14.681 10.4126 14.0497 11.0303L6.47095 18.4406C5.71271 19.1808 5.28126 20.2266 5.28126 21.3252L5.28126 30.3747C5.28126 35.0747 8.95314 38.208 12.625 38.208L28.3608 38.208C32.5578 38.208 32.5578 32.333 28.3608 32.333L27.3125 32.333" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M27.3125 32.333L30.4593 32.333C34.6562 32.333 34.6562 26.458 30.4593 26.458L27.3125 26.458L31.9023 26.458C36.0993 26.458 36.0993 20.583 31.9023 20.583L27.3125 20.583L39.2479 20.583C39.978 20.5825 40.678 20.2728 41.194 19.7219C41.7101 19.1711 42 18.4242 42 17.6455C42 16.8664 41.7099 16.1193 41.1934 15.5684C40.6769 15.0175 39.9765 14.708 39.2461 14.708L18.1328 14.708" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex justify-center items-center w-[25%] bg-redDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mx-4 mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 47 45" fill="none">
                            <path d="M14.708 21.8679L10.7835 26.7735C10.2352 27.4588 9.95971 28.3023 10.0048 29.1579C10.0498 30.0136 10.4126 30.8275 11.0303 31.4588L18.4406 39.0376C19.1808 39.7958 20.2266 40.2273 21.3252 40.2273H30.3747C35.0747 40.2273 38.208 36.5554 38.208 32.8835L38.208 17.1477C38.208 12.9508 32.333 12.9508 32.333 17.1477L32.333 18.196" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M32.333 18.1562L32.333 15.0095C32.333 10.8125 26.458 10.8125 26.458 15.0095L26.458 18.1562L26.458 13.5664C26.458 9.36945 20.583 9.36945 20.583 13.5664L20.583 18.1562L20.583 6.22082C20.5825 5.49076 20.2728 4.79076 19.7219 4.2747C19.1711 3.75864 18.4242 3.46875 17.6455 3.46875C16.8664 3.46875 16.1193 3.75889 15.5684 4.27535C15.0175 4.79181 14.708 5.49227 14.708 6.22266L14.708 27.3359" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex justify-center items-center w-[50%] bg-redDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 47 45" fill="none">
                            <path d="M14.708 21.8679L10.7835 26.7735C10.2352 27.4588 9.95971 28.3023 10.0048 29.1579C10.0498 30.0136 10.4126 30.8275 11.0303 31.4588L18.4406 39.0376C19.1808 39.7958 20.2266 40.2273 21.3252 40.2273H30.3747C35.0747 40.2273 38.208 36.5554 38.208 32.8835L38.208 17.1477C38.208 12.9508 32.333 12.9508 32.333 17.1477L32.333 18.196" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M32.333 18.1562L32.333 15.0095C32.333 10.8125 26.458 10.8125 26.458 15.0095L26.458 18.1562L26.458 13.5664C26.458 9.36945 20.583 9.36945 20.583 13.5664L20.583 18.1562L20.583 6.22082C20.5825 5.49076 20.2728 4.79076 19.7219 4.2747C19.1711 3.75864 18.4242 3.46875 17.6455 3.46875C16.8664 3.46875 16.1193 3.75889 15.5684 4.27535C15.0175 4.79181 14.708 5.49227 14.708 6.22266L14.708 27.3359" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 47 45" fill="none">
                            <path d="M14.708 21.8679L10.7835 26.7735C10.2352 27.4588 9.95971 28.3023 10.0048 29.1579C10.0498 30.0136 10.4126 30.8275 11.0303 31.4588L18.4406 39.0376C19.1808 39.7958 20.2266 40.2273 21.3252 40.2273H30.3747C35.0747 40.2273 38.208 36.5554 38.208 32.8835L38.208 17.1477C38.208 12.9508 32.333 12.9508 32.333 17.1477L32.333 18.196" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M32.333 18.1562L32.333 15.0095C32.333 10.8125 26.458 10.8125 26.458 15.0095L26.458 18.1562L26.458 13.5664C26.458 9.36945 20.583 9.36945 20.583 13.5664L20.583 18.1562L20.583 6.22082C20.5825 5.49076 20.2728 4.79076 19.7219 4.2747C19.1711 3.75864 18.4242 3.46875 17.6455 3.46875C16.8664 3.46875 16.1193 3.75889 15.5684 4.27535C15.0175 4.79181 14.708 5.49227 14.708 6.22266L14.708 27.3359" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <div class="flex justify-between w-[100%]">
                    <div class="flex justify-center items-center w-[25%] bg-redDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="47" viewBox="0 0 45 47" fill="none">
                            <path d="M20.0474 12.3038C18.9717 10.629 17.1915 9.7915 14.7068 9.7915C10.9798 9.7915 4.60919 14.6631 4.60919 19.0562C4.60919 23.4492 4.60919 25.9969 4.60919 30.2967C4.60919 34.5965 8.14392 37.2082 10.9798 37.2082C14.9733 37.2082 18.9668 37.2082 22.9602 37.2082C24.4812 37.2082 25.7141 35.893 25.7141 34.2707L25.7141 34.2618C25.7141 32.6444 24.4849 31.3332 22.9686 31.3332" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M17.9702 13.6895L34.8969 13.6895C36.4167 13.6895 37.6486 15.0035 37.6486 16.6245C37.6486 16.6272 37.6486 16.63 37.6486 16.6326C37.6444 18.2594 36.4068 19.5759 34.8817 19.5759L22.4253 19.5759" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M22.9688 19.8281L38.5676 19.8281C40.0964 19.8281 41.3358 21.1501 41.3358 22.7808C41.3358 24.4115 40.0964 25.7334 38.5676 25.7334L22.9688 25.7334" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.2296 25.458L25.7195 25.458C27.2404 25.458 28.4734 26.7731 28.4734 28.3955C28.4734 30.0179 27.2404 31.333 25.7195 31.333L22.9656 31.333" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex justify-center items-center w-[25%] bg-redDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mx-4 mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 47 45" fill="none">
                            <path d="M12.304 24.9524C10.6292 26.028 9.79169 27.8082 9.79169 30.2929C9.79169 34.02 14.6633 40.3906 19.0564 40.3906C23.4494 40.3906 25.9971 40.3906 30.2969 40.3906C34.5967 40.3906 37.2083 36.8558 37.2083 34.02C37.2083 30.0264 37.2083 26.033 37.2083 22.0396C37.2083 20.5186 35.8932 19.2856 34.2708 19.2856H34.2619C32.6445 19.2856 31.3333 20.5149 31.3333 22.0312" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M13.6898 27.0295L13.6898 10.1028C13.6898 8.58304 15.0038 7.35107 16.6248 7.35107C16.6276 7.35107 16.6303 7.35107 16.6329 7.35108C18.2597 7.35531 19.5762 8.59287 19.5762 10.118L19.5762 22.5744" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M19.8284 22.0311L19.8284 6.43219C19.8284 4.90339 21.1503 3.66406 22.781 3.66406C24.4118 3.66406 25.7336 4.90339 25.7336 6.43219L25.7336 22.0311" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25.4584 21.7702L25.4584 19.2803C25.4584 17.7594 26.7735 16.5264 28.3959 16.5264C30.0183 16.5264 31.3334 17.7594 31.3334 19.2803L31.3334 22.0342" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex justify-center items-center w-[50%] bg-grayDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 47 45" fill="none">
                            <path d="M12.304 24.9524C10.6291 26.028 9.79166 27.8082 9.79166 30.2929C9.79166 34.02 14.6633 40.3906 19.0563 40.3906C23.4494 40.3906 25.9971 40.3906 30.2969 40.3906C34.5967 40.3906 37.2083 36.8558 37.2083 34.02C37.2083 30.0264 37.2083 26.033 37.2083 22.0396C37.2083 20.5186 35.8932 19.2856 34.2708 19.2856H34.2619C32.6445 19.2856 31.3333 20.5149 31.3333 22.0312" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M13.6897 27.0295L13.6897 10.1028C13.6897 8.58304 15.0038 7.35107 16.6248 7.35107C16.6275 7.35107 16.6303 7.35107 16.6329 7.35108C18.2597 7.35531 19.5762 8.59287 19.5762 10.118L19.5762 22.5744" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M19.8283 22.0311L19.8283 6.43219C19.8283 4.90339 21.1503 3.66406 22.781 3.66406C24.4117 3.66406 25.7336 4.90339 25.7336 6.43219L25.7336 22.0311" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25.4583 21.7702L25.4583 19.2803C25.4583 17.7594 26.7734 16.5264 28.3958 16.5264C30.0182 16.5264 31.3333 17.7594 31.3333 19.2803L31.3333 22.0342" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 47 45" fill="none">
                            <path d="M12.304 24.9524C10.6291 26.028 9.79166 27.8082 9.79166 30.2929C9.79166 34.02 14.6633 40.3906 19.0563 40.3906C23.4494 40.3906 25.9971 40.3906 30.2969 40.3906C34.5967 40.3906 37.2083 36.8558 37.2083 34.02C37.2083 30.0264 37.2083 26.033 37.2083 22.0396C37.2083 20.5186 35.8932 19.2856 34.2708 19.2856H34.2619C32.6445 19.2856 31.3333 20.5149 31.3333 22.0312" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M13.6897 27.0295L13.6897 10.1028C13.6897 8.58304 15.0038 7.35107 16.6248 7.35107C16.6275 7.35107 16.6303 7.35107 16.6329 7.35108C18.2597 7.35531 19.5762 8.59287 19.5762 10.118L19.5762 22.5744" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <path d="M19.8283 22.0311L19.8283 6.43219C19.8283 4.90339 21.1503 3.66406 22.781 3.66406C24.4117 3.66406 25.7336 4.90339 25.7336 6.43219L25.7336 22.0311" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25.4583 21.7702L25.4583 19.2803C25.4583 17.7594 26.7734 16.5264 28.3958 16.5264C30.0182 16.5264 31.3333 17.7594 31.3333 19.2803L31.3333 22.0342" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <div class="flex justify-between items-end h-full w-[100%] px-6 gap-6">
                    <div class="w-[30%]">
                        <p class="flex justify-center font-poppins-bold text-xl text-darkGray">JURI 1</p>
                        <div class="flex justify-center mt-[20%] 2xl:mt-[10%] gap-2">
                            <div class="flex items-center justify-center bg-grayDefault py-2 px-5 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">1</p>
                            </div>
                            <div class="flex items-center justify-center bg-redDefault py-2 px-4 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">2</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-[30%]">
                        <p class="flex justify-center font-poppins-bold text-xl text-darkGray">JURI 2</p>
                        <div class="flex justify-center mt-[20%] 2xl:mt-[10%] gap-2">
                            <div class="flex items-center justify-center bg-redDefault py-2 px-5 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">1</p>
                            </div>
                            <div class="flex items-center justify-center bg-grayDefault py-2 px-4 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">2</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-[30%]">
                        <p class="flex justify-center font-poppins-bold text-xl text-darkGray">JURI 3</p>
                        <div class="flex justify-center mt-[20%] 2xl:mt-[10%] gap-2">
                            <div class="flex items-center justify-center bg-grayDefault py-2 px-5 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">1</p>
                            </div>
                            <div class="flex items-center justify-center bg-grayDefault py-2 px-4 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex h-[450px] w-[50%]">
            <div class="flex flex-col justify-start w-[60%] lg:w-[55%] h-screen lg:h-[70%] mx-[3.5%]">
                <div class="flex justify-between w-[100%]">
                    <div class="flex justify-center items-center w-[50%] bg-blueDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 68 67" fill="none">
                            <path d="M46.75 33.5003L52.428 40.9596C53.2213 42.0017 53.6199 43.2843 53.5547 44.5853C53.4895 45.8864 52.9646 47.124 52.071 48.084L41.3497 59.608C40.2787 60.7609 38.7657 61.417 37.1762 61.417H24.0833C17.2833 61.417 12.75 55.8336 12.75 50.2503V26.3229C12.75 19.9412 21.25 19.9412 21.25 26.3229V27.917" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.25 27.9168V23.1319C21.25 16.7502 29.75 16.7502 29.75 23.1319V27.9168V20.9377C29.75 14.5559 38.25 14.5559 38.25 20.9377V27.9168V9.7682C38.2508 8.65809 38.6989 7.5937 39.4958 6.809C40.2927 6.02429 41.3733 5.5835 42.5 5.5835C43.6272 5.5835 44.7082 6.02468 45.5052 6.80999C46.3022 7.5953 46.75 8.6604 46.75 9.771V41.8752" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 68 67" fill="none">
                            <path d="M46.75 33.5003L52.428 40.9596C53.2213 42.0017 53.6199 43.2843 53.5547 44.5853C53.4895 45.8864 52.9646 47.124 52.071 48.084L41.3497 59.608C40.2787 60.7609 38.7657 61.417 37.1762 61.417H24.0833C17.2833 61.417 12.75 55.8336 12.75 50.2503V26.3229C12.75 19.9412 21.25 19.9412 21.25 26.3229V27.917" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.25 27.9168V23.1319C21.25 16.7502 29.75 16.7502 29.75 23.1319V27.9168V20.9377C29.75 14.5559 38.25 14.5559 38.25 20.9377V27.9168V9.7682C38.2508 8.65809 38.6989 7.5937 39.4958 6.809C40.2927 6.02429 41.3733 5.5835 42.5 5.5835C43.6272 5.5835 44.7082 6.02468 45.5052 6.80999C46.3022 7.5953 46.75 8.6604 46.75 9.771V41.8752" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex justify-center items-center w-[25%] bg-blueDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mx-4 mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 68 67" fill="none">
                            <path d="M46.75 33.5003L52.428 40.9596C53.2213 42.0017 53.6199 43.2843 53.5547 44.5853C53.4895 45.8864 52.9646 47.124 52.071 48.084L41.3497 59.608C40.2787 60.7609 38.7657 61.417 37.1762 61.417H24.0833C17.2833 61.417 12.75 55.8336 12.75 50.2503V26.3229C12.75 19.9412 21.25 19.9412 21.25 26.3229V27.917" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.25 27.9168V23.1319C21.25 16.7502 29.75 16.7502 29.75 23.1319V27.9168V20.9377C29.75 14.5559 38.25 14.5559 38.25 20.9377V27.9168V9.7682C38.2508 8.65809 38.6989 7.5937 39.4958 6.809C40.2927 6.02429 41.3733 5.5835 42.5 5.5835C43.6272 5.5835 44.7082 6.02468 45.5052 6.80999C46.3022 7.5953 46.75 8.6604 46.75 9.771V41.8752" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex justify-center items-center w-[25%] bg-blueDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="47" viewBox="0 0 67 67" fill="none">
                            <path d="M33.5 20.9375L40.9593 15.343C42.0014 14.5613 43.284 14.1686 44.585 14.2329C45.886 14.2971 47.1237 14.8142 48.0837 15.6947L59.6077 26.2584C60.7606 27.3137 61.4167 28.8044 61.4167 30.3705L61.4167 43.2708C61.4167 49.9708 55.8333 54.4375 50.25 54.4375L26.3226 54.4375C19.9409 54.4375 19.9409 46.0625 26.3226 46.0625L27.9167 46.0625" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M27.9166 46.0625L23.1317 46.0625C16.75 46.0625 16.75 37.6875 23.1317 37.6875L27.9166 37.6875L20.9375 37.6875C14.5557 37.6875 14.5557 29.3125 20.9375 29.3125L27.9166 29.3125L9.76802 29.3125C8.65791 29.3118 7.59352 28.8703 6.80882 28.085C6.02411 27.2998 5.58331 26.2351 5.58331 25.125C5.58331 24.0144 6.02449 22.9493 6.8098 22.164C7.59511 21.3787 8.66022 20.9375 9.77081 20.9375L41.875 20.9375" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <div class="flex justify-between w-[100%]">
                    <div class="flex justify-center items-center w-[50%] bg-grayDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 68 67" fill="none">
                            <path d="M50.1985 37.9418C52.6217 39.5775 53.8333 42.2844 53.8333 46.0625C53.8333 51.7297 46.785 61.4167 40.4291 61.4167C34.0733 61.4167 30.3872 61.4167 24.1662 61.4167C17.9452 61.4167 14.1667 56.0419 14.1667 51.7297C14.1667 45.6573 14.1667 39.585 14.1667 33.5127C14.1667 31.1999 16.0694 29.3252 18.4167 29.3252H18.4296C20.7696 29.3252 22.6667 31.1944 22.6667 33.5" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            <path d="M48.1936 41.1001V15.3619C48.1936 13.051 46.2924 11.1777 43.9471 11.1777C43.9432 11.1777 43.9392 11.1777 43.9354 11.1777C41.5817 11.1842 39.677 13.066 39.677 15.3851V34.3258" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            <path d="M39.677 33.5113V9.79213C39.677 7.46749 37.7644 5.58301 35.405 5.58301C33.0457 5.58301 31.1332 7.46749 31.1332 9.79213V33.5113" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.1667 33.1034V29.3174C31.1667 27.0048 29.2639 25.1299 26.9167 25.1299C24.5694 25.1299 22.6667 27.0048 22.6667 29.3174V33.5049" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 68 67" fill="none">
                            <path d="M50.1985 37.9418C52.6217 39.5775 53.8333 42.2844 53.8333 46.0625C53.8333 51.7297 46.785 61.4167 40.4291 61.4167C34.0733 61.4167 30.3872 61.4167 24.1662 61.4167C17.9452 61.4167 14.1667 56.0419 14.1667 51.7297C14.1667 45.6573 14.1667 39.585 14.1667 33.5127C14.1667 31.1999 16.0694 29.3252 18.4167 29.3252H18.4296C20.7696 29.3252 22.6667 31.1944 22.6667 33.5" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            <path d="M48.1936 41.1001V15.3619C48.1936 13.051 46.2924 11.1777 43.9471 11.1777C43.9432 11.1777 43.9392 11.1777 43.9354 11.1777C41.5817 11.1842 39.677 13.066 39.677 15.3851V34.3258" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            <path d="M39.677 33.5113V9.79213C39.677 7.46749 37.7644 5.58301 35.405 5.58301C33.0457 5.58301 31.1332 7.46749 31.1332 9.79213V33.5113" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.1667 33.1034V29.3174C31.1667 27.0048 29.2639 25.1299 26.9167 25.1299C24.5694 25.1299 22.6667 27.0048 22.6667 29.3174V33.5049" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex justify-center items-center w-[25%] bg-blueDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mx-4 mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 68 67" fill="none">
                            <path d="M50.1984 37.9418C52.6216 39.5775 53.8333 42.2844 53.8333 46.0625C53.8333 51.7297 46.785 61.4167 40.4291 61.4167C34.0732 61.4167 30.3872 61.4167 24.1662 61.4167C17.9452 61.4167 14.1667 56.0419 14.1667 51.7297C14.1667 45.6573 14.1667 39.585 14.1667 33.5127C14.1667 31.1999 16.0694 29.3252 18.4167 29.3252H18.4296C20.7696 29.3252 22.6667 31.1944 22.6667 33.5" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            <path d="M48.1935 41.1001V15.3619C48.1935 13.051 46.2924 11.1777 43.9471 11.1777C43.9431 11.1777 43.9392 11.1777 43.9353 11.1777C41.5817 11.1842 39.677 13.066 39.677 15.3851V34.3258" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            <path d="M39.677 33.5113V9.79213C39.677 7.46749 37.7644 5.58301 35.405 5.58301C33.0457 5.58301 31.1332 7.46749 31.1332 9.79213V33.5113" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.1666 33.1034V29.3174C31.1666 27.0048 29.2639 25.1299 26.9166 25.1299C24.5694 25.1299 22.6666 27.0048 22.6666 29.3174V33.5049" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex justify-center items-center w-[25%] bg-blueDefault rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mb-4 shadow-inset-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="47" viewBox="0 0 67 67" fill="none">
                            <path d="M37.9421 17.5394C39.5777 15.1519 42.2846 13.958 46.0627 13.958C51.73 13.958 61.4169 20.9027 61.4169 27.1651C61.4169 33.4275 61.4169 37.0593 61.4169 43.1888C61.4169 49.3184 56.0421 53.0413 51.73 53.0413C45.6575 53.0413 39.5852 53.0413 33.5129 53.0413C31.2002 53.0413 29.3254 51.1666 29.3254 48.8538L29.3254 48.8411C29.3254 46.5355 31.1946 44.6663 33.5002 44.6663" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            <path d="M41.1006 19.5146L15.3624 19.5146C13.0515 19.5146 11.1782 21.3879 11.1782 23.6987C11.1782 23.7026 11.1782 23.7065 11.1782 23.7102C11.1847 26.0293 13.0665 27.906 15.3855 27.906L34.3263 27.906" stroke="white" stroke-width="4" stroke-linecap="round"/>
                            <path d="M33.5116 27.9062L9.79243 27.9062C7.4678 27.9062 5.58331 29.7908 5.58331 32.1154C5.58331 34.44 7.4678 36.3244 9.79243 36.3244L33.5116 36.3244" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M33.1033 36.291L29.3172 36.291C27.0046 36.291 25.1297 38.1658 25.1297 40.4785C25.1297 42.7913 27.0046 44.666 29.3172 44.666L33.5047 44.666" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <div class="flex justify-between items-end h-full w-[100%] px-6 gap-5">
                    <div class="w-[30%]">
                        <p class="flex justify-center font-poppins-bold text-xl text-darkGray">JURI 1</p>
                        <div class="flex justify-center mt-[20%] 2xl:mt-[10%] gap-2">
                            <div class="flex items-center justify-center bg-grayDefault py-2 px-5 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">1</p>
                            </div>
                            <div class="flex items-center justify-center bg-blueDefault py-2 px-4 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">2</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-[30%]">
                        <p class="flex justify-center font-poppins-bold text-xl text-darkGray">JURI 2</p>
                        <div class="flex justify-center mt-[20%] 2xl:mt-[10%] gap-2">
                            <div class="flex items-center justify-center bg-blueDefault py-2 px-5 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">1</p>
                            </div>
                            <div class="flex items-center justify-center bg-grayDefault py-2 px-4 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">2</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-[30%]">
                        <p class="flex justify-center font-poppins-bold text-xl text-darkGray">JURI 3</p>
                        <div class="flex justify-center mt-[20%] 2xl:mt-[10%] gap-2">
                            <div class="flex items-center justify-center bg-grayDefault py-2 px-5 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">1</p>
                            </div>
                            <div class="flex items-center justify-center bg-grayDefault py-2 px-4 rounded-[8px] shadow-inset-custom">
                                <p class="text-whiteDefault font-semibold text-2xl">2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center w-[40%] lg:w-[45%] h-screen lg:h-[70%] rounded-l-[30px] bg-blueDefault">
                <p id="blueScore" class="text-whiteDefault text-6xl md:text-8xl lg:text-9xl font-bold">0</p>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/dropVerification.js') }}">
    </script>
    <script type="module" src="{{ mix('js/papanScore.js') }}">
    </script>
</body>
</html>

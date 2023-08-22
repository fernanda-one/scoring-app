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

    <div class="flex justify-between mt-[5%] ml-[2%] mr-[2%]">
        <!--left side-->
        <div class="flex flex-col justify-start w-[50%]">
            <div class="flex items-center">
                <button type="button" class="bg-redDefault hover:bg-redDark focus:ring-2 focus:outline-none focus:ring-redDark rounded-[24px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="89" viewBox="0 0 90 89" fill="none">
                        <path d="M47.2546 9.01951C46.3879 9.03584 45.4879 9.37549 44.6212 10.0564C43.3379 11.0411 42.2212 12.7409 41.6545 14.8866C41.1045 17.0323 41.2379 19.1649 41.8379 20.8043C42.4379 22.4209 43.4046 23.4823 44.6046 23.8905C45.6046 24.2335 46.7046 24.1028 47.7713 23.466C48.1546 21.2452 49.4213 19.5012 51.3213 18.3059C51.338 18.2749 51.338 18.2439 51.3546 18.2112C51.9046 16.0639 51.7713 13.933 51.1713 12.3001C50.5713 10.6753 49.6046 9.61226 48.4046 9.2024C48.0213 9.07503 47.6379 9.01298 47.2546 9.01951ZM82.6716 17.0715C82.1382 17.189 80.8382 17.6332 79.5549 18.239C78.1049 18.915 76.6549 19.6858 75.8215 20.1169L75.6715 20.1903L75.5215 20.2312C69.1715 21.9637 65.9381 23.1557 60.8047 24.0212C60.438 25.0173 59.8047 26.0623 58.9214 27.1237H58.9047V27.1401C57.8714 28.3484 56.838 29.5404 55.788 30.7162C63.4214 29.3282 68.9215 27.9892 77.9049 24.511L78.5882 24.2498L79.2382 24.6254C80.1549 25.1805 81.4716 25.5724 82.5049 25.6541C83.0216 25.7031 83.4716 25.6541 83.7383 25.5888C83.9716 25.5235 83.9716 25.4745 83.9716 25.4908C84.8716 23.5476 85.1883 21.5065 84.8883 19.9715C84.6049 18.5199 83.9382 17.5809 82.6716 17.0715ZM55.688 20.0499C54.2047 20.0336 52.338 20.7553 51.088 22.6005C50.1046 27.4177 46.6379 30.7815 41.5545 32.8226L40.4212 30.112C42.5379 29.2629 44.1879 28.2831 45.4379 27.0747C44.9212 27.0421 44.3879 26.9278 43.8712 26.7482C42.1379 26.144 40.7712 24.854 39.8545 23.2537C37.4212 23.7109 36.0878 24.2824 34.3878 25.6378C33.7045 31.5979 35.5212 36.66 38.9879 41.4118C45.9379 37.2642 51.2713 31.5326 56.6047 25.2622C57.9714 23.5966 58.2714 22.3882 58.188 21.6861C58.088 21.0003 57.738 20.5871 56.988 20.285C56.6213 20.1364 56.1713 20.0532 55.688 20.0499ZM32.2378 34.6515C31.9545 38.4399 32.1211 42.5712 32.0711 46.8984V47.5189L31.6211 47.9435C22.906 56.2061 15.971 69.7593 13.7143 85.3048H20.4844C22.0044 78.5771 23.396 71.8658 26.2661 66.4118C29.3044 60.6476 34.2378 56.2877 42.3045 55.3896L43.1046 55.2916L43.6212 55.8958C49.9879 63.3583 56.1713 72.8619 57.938 85.3048H64.5381C63.4881 70.8697 56.738 59.7495 48.3546 47.9108C46.7213 45.6084 46.6546 43.0447 47.2713 40.579C47.4213 39.9585 47.6213 39.3217 47.8379 38.6685C45.2546 40.8893 42.4545 42.9141 39.3379 44.6613L38.1878 45.2982L37.4045 44.2857C35.0711 41.3138 33.2711 38.1133 32.2378 34.6515Z" fill="white"/>
                    </svg>
                </button>
                <div class="flex flex-col items-center ml-24">
                    <p>
                        PUNCH CORRECTION
                    </p>
                    <div class="flex justify-center mt-[8%]">
                        <div class="flex items-center justify-center bg-redDefault w-[68px] h-[45px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                        <div class="flex items-center justify-center bg-redDefault w-[68px] h-[45px] mx-[24px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                        <div class="flex items-center justify-center bg-redDefault w-[68px] h-[45px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center mt-[3%]">
                <button type="button" class="bg-redDefault hover:bg-redDark focus:ring-2 focus:outline-none focus:ring-redDark rounded-[24px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="92" height="90" viewBox="0 0 92 90" fill="none">
                        <g clip-path="url(#clip0_108_809)">
                            <path d="M10.3679 10.535C10.1221 10.5406 9.87856 10.5825 9.64508 10.6594C8.72484 10.9633 7.9821 11.8124 7.58374 13.228C7.18537 14.6436 7.21482 16.5442 7.85662 18.4705C8.49841 20.3969 9.61596 21.9385 10.785 22.8363C11.9543 23.7341 13.059 23.9727 13.9795 23.6687C14.8997 23.3647 15.6421 22.516 16.0403 21.1002C16.4387 19.6846 16.4094 17.7839 15.7674 15.8575C15.1256 13.931 14.0082 12.3899 12.839 11.4921C11.9621 10.8187 11.1216 10.516 10.3679 10.535ZM40.459 12.5592C39.8928 12.5849 39.3948 12.8454 39.1093 13.4335L36.8786 17.4817L32.5052 22.7674C32.5052 22.7674 23.6983 21.2087 20.7197 21.6447C20.1015 21.7342 19.4842 21.8306 18.8681 21.9337C18.2769 24.0042 16.9362 25.7933 14.9103 26.4625C13.0268 27.0846 11.0373 26.5773 9.38708 25.4518C8.64025 26.0261 7.94954 26.692 7.33278 27.4689C4.27774 29.8673 3.01623 31.5175 0.445284 33.1818C0.949658 30.7501 2.19301 28.3267 3.55791 26.3304C3.78204 26.0028 5.43847 24.6037 5.66636 24.3008C6.89008 21.895 4.28167 17.558 1.82573 21.7062C1.5926 22.0299 0.623934 24.7944 0.383281 25.1574C-2.001 29.88 -3.49007 32.9802 -2.14824 37.6441C-1.69736 39.211 2.90859 36.8416 6.8873 34.0189C11.2176 40.1277 16.5992 41.9704 19.709 44.3384C15.9027 57.9799 21.3887 68.4304 24.4985 78.3212L19.7298 84.2248C18.279 85.9634 27.6988 86.3701 28.3043 84.3475L29.5656 78.8113C24.8489 64.0044 29.0516 53.0142 32.4482 44.8283C41.4802 35.169 51.2997 31.3635 60.08 23.7583L67.4913 22.1821C69.2661 18.9239 69.1659 17.3154 65.2249 17.1601L57.8754 20.0386C48.618 25.2422 33.9884 28.7663 27.3649 36.0696C27.2182 33.7719 24.5183 28.3314 23.9454 26.5094C27.1148 26.9304 31.4166 27.2003 33.8663 26.0706C36.4847 24.8633 39.3681 19.3965 39.3681 19.3965L42.585 17.016C45.3768 15.3705 42.4819 12.4683 40.4592 12.5595L40.459 12.5592Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_108_809">
                                <rect width="91.7822" height="90" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </button>
                <div class="flex flex-col items-center ml-24">
                    <p>
                        KICK CORRECTION
                    </p>
                    <div class="flex justify-center mt-[8%]">
                        <div class="flex items-center justify-center bg-redDefault w-[68px] h-[45px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                        <div class="flex items-center justify-center bg-redDefault w-[68px] h-[45px] mx-[24px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                        <div class="flex items-center justify-center bg-grayDefault w-[68px] h-[45px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Right side-->
        <div class="flex flex-col justify-start items-end w-[50%]">
            <div class="flex items-center">
                <div class="flex flex-col items-center mr-24">
                    <p>
                        PUNCH CORRECTION
                    </p>
                    <div class="flex justify-center mt-[8%]">
                        <div class="flex items-center justify-center bg-blueDefault w-[68px] h-[45px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                        <div class="flex items-center justify-center bg-blueDefault w-[68px] h-[45px] mx-[24px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                        <div class="flex items-center justify-center bg-blueDefault w-[68px] h-[45px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                    </div>
                </div>
                <button type="button" class="bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[24px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="89" viewBox="0 0 90 89" fill="none">
                        <path d="M47.2546 9.01951C46.3879 9.03584 45.4879 9.37549 44.6212 10.0564C43.3379 11.0411 42.2212 12.7409 41.6545 14.8866C41.1045 17.0323 41.2379 19.1649 41.8379 20.8043C42.4379 22.4209 43.4046 23.4823 44.6046 23.8905C45.6046 24.2335 46.7046 24.1028 47.7713 23.466C48.1546 21.2452 49.4213 19.5012 51.3213 18.3059C51.338 18.2749 51.338 18.2439 51.3546 18.2112C51.9046 16.0639 51.7713 13.933 51.1713 12.3001C50.5713 10.6753 49.6046 9.61226 48.4046 9.2024C48.0213 9.07503 47.6379 9.01298 47.2546 9.01951ZM82.6716 17.0715C82.1382 17.189 80.8382 17.6332 79.5549 18.239C78.1049 18.915 76.6549 19.6858 75.8215 20.1169L75.6715 20.1903L75.5215 20.2312C69.1715 21.9637 65.9381 23.1557 60.8047 24.0212C60.438 25.0173 59.8047 26.0623 58.9214 27.1237H58.9047V27.1401C57.8714 28.3484 56.838 29.5404 55.788 30.7162C63.4214 29.3282 68.9215 27.9892 77.9049 24.511L78.5882 24.2498L79.2382 24.6254C80.1549 25.1805 81.4716 25.5724 82.5049 25.6541C83.0216 25.7031 83.4716 25.6541 83.7383 25.5888C83.9716 25.5235 83.9716 25.4745 83.9716 25.4908C84.8716 23.5476 85.1883 21.5065 84.8883 19.9715C84.6049 18.5199 83.9382 17.5809 82.6716 17.0715ZM55.688 20.0499C54.2047 20.0336 52.338 20.7553 51.088 22.6005C50.1046 27.4177 46.6379 30.7815 41.5545 32.8226L40.4212 30.112C42.5379 29.2629 44.1879 28.2831 45.4379 27.0747C44.9212 27.0421 44.3879 26.9278 43.8712 26.7482C42.1379 26.144 40.7712 24.854 39.8545 23.2537C37.4212 23.7109 36.0878 24.2824 34.3878 25.6378C33.7045 31.5979 35.5212 36.66 38.9879 41.4118C45.9379 37.2642 51.2713 31.5326 56.6047 25.2622C57.9714 23.5966 58.2714 22.3882 58.188 21.6861C58.088 21.0003 57.738 20.5871 56.988 20.285C56.6213 20.1364 56.1713 20.0532 55.688 20.0499ZM32.2378 34.6515C31.9545 38.4399 32.1211 42.5712 32.0711 46.8984V47.5189L31.6211 47.9435C22.906 56.2061 15.971 69.7593 13.7143 85.3048H20.4844C22.0044 78.5771 23.396 71.8658 26.2661 66.4118C29.3044 60.6476 34.2378 56.2877 42.3045 55.3896L43.1046 55.2916L43.6212 55.8958C49.9879 63.3583 56.1713 72.8619 57.938 85.3048H64.5381C63.4881 70.8697 56.738 59.7495 48.3546 47.9108C46.7213 45.6084 46.6546 43.0447 47.2713 40.579C47.4213 39.9585 47.6213 39.3217 47.8379 38.6685C45.2546 40.8893 42.4545 42.9141 39.3379 44.6613L38.1878 45.2982L37.4045 44.2857C35.0711 41.3138 33.2711 38.1133 32.2378 34.6515Z" fill="white"/>
                    </svg>
                </button>
            </div>
            <div class="flex items-center mt-[3%]">
                <div class="flex flex-col items-center mr-24">
                    <p>
                        PUNCH CORRECTION
                    </p>
                    <div class="flex justify-center mt-[8%]">
                        <div class="flex items-center justify-center bg-blueDefault w-[68px] h-[45px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                        <div class="flex items-center justify-center bg-blueDefault w-[68px] h-[45px] mx-[24px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                        <div class="flex items-center justify-center bg-blueDefault w-[68px] h-[45px] rounded-[10px]">
                            <p class="text-whiteDefault">1</p>
                        </div>
                    </div>
                </div>
                <button type="button" class="bg-blueDefault hover:bg-blueDark focus:ring-2 focus:outline-none focus:ring-blueDark rounded-[24px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="89" viewBox="0 0 90 89" fill="none">
                        <path d="M47.2546 9.01951C46.3879 9.03584 45.4879 9.37549 44.6212 10.0564C43.3379 11.0411 42.2212 12.7409 41.6545 14.8866C41.1045 17.0323 41.2379 19.1649 41.8379 20.8043C42.4379 22.4209 43.4046 23.4823 44.6046 23.8905C45.6046 24.2335 46.7046 24.1028 47.7713 23.466C48.1546 21.2452 49.4213 19.5012 51.3213 18.3059C51.338 18.2749 51.338 18.2439 51.3546 18.2112C51.9046 16.0639 51.7713 13.933 51.1713 12.3001C50.5713 10.6753 49.6046 9.61226 48.4046 9.2024C48.0213 9.07503 47.6379 9.01298 47.2546 9.01951ZM82.6716 17.0715C82.1382 17.189 80.8382 17.6332 79.5549 18.239C78.1049 18.915 76.6549 19.6858 75.8215 20.1169L75.6715 20.1903L75.5215 20.2312C69.1715 21.9637 65.9381 23.1557 60.8047 24.0212C60.438 25.0173 59.8047 26.0623 58.9214 27.1237H58.9047V27.1401C57.8714 28.3484 56.838 29.5404 55.788 30.7162C63.4214 29.3282 68.9215 27.9892 77.9049 24.511L78.5882 24.2498L79.2382 24.6254C80.1549 25.1805 81.4716 25.5724 82.5049 25.6541C83.0216 25.7031 83.4716 25.6541 83.7383 25.5888C83.9716 25.5235 83.9716 25.4745 83.9716 25.4908C84.8716 23.5476 85.1883 21.5065 84.8883 19.9715C84.6049 18.5199 83.9382 17.5809 82.6716 17.0715ZM55.688 20.0499C54.2047 20.0336 52.338 20.7553 51.088 22.6005C50.1046 27.4177 46.6379 30.7815 41.5545 32.8226L40.4212 30.112C42.5379 29.2629 44.1879 28.2831 45.4379 27.0747C44.9212 27.0421 44.3879 26.9278 43.8712 26.7482C42.1379 26.144 40.7712 24.854 39.8545 23.2537C37.4212 23.7109 36.0878 24.2824 34.3878 25.6378C33.7045 31.5979 35.5212 36.66 38.9879 41.4118C45.9379 37.2642 51.2713 31.5326 56.6047 25.2622C57.9714 23.5966 58.2714 22.3882 58.188 21.6861C58.088 21.0003 57.738 20.5871 56.988 20.285C56.6213 20.1364 56.1713 20.0532 55.688 20.0499ZM32.2378 34.6515C31.9545 38.4399 32.1211 42.5712 32.0711 46.8984V47.5189L31.6211 47.9435C22.906 56.2061 15.971 69.7593 13.7143 85.3048H20.4844C22.0044 78.5771 23.396 71.8658 26.2661 66.4118C29.3044 60.6476 34.2378 56.2877 42.3045 55.3896L43.1046 55.2916L43.6212 55.8958C49.9879 63.3583 56.1713 72.8619 57.938 85.3048H64.5381C63.4881 70.8697 56.738 59.7495 48.3546 47.9108C46.7213 45.6084 46.6546 43.0447 47.2713 40.579C47.4213 39.9585 47.6213 39.3217 47.8379 38.6685C45.2546 40.8893 42.4545 42.9141 39.3379 44.6613L38.1878 45.2982L37.4045 44.2857C35.0711 41.3138 33.2711 38.1133 32.2378 34.6515Z" fill="white"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</body>
</html>

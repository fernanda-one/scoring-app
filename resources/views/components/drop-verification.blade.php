<!-- Main modal -->
<div id="dropVerificationModal">
    <div data-modal-backdrop="static" tabindex="-1" class="flex fixed justify-center z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-full bg-slate-950 bg-opacity-50">
        <div class="max-h-full w-5/12">
            <div class="bg-white w-auto rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-center p-4 rounded-t dark:border-gray-600">
                    <span class="flex text-xl font-semibold align-middle items-center justify-center text-gray-900 dark:text-white">
                        CHOICE DROP VERIFICATION
                    </span>
                </div> 
                <div class="py-8 px-4 space-y-4">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-center mb-4">
                            <button type="button" disabled class="flex justify-center items-center w-[33%] h-[74px] bg-grayDefault hover:bg-grayDark focus:ring-2 focus:outline-none focus:ring-grayDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                                <p class="text-2xl text-whiteDefault">WAITING</p>
                            </button>
                        </div>
                        <div class="flex items-center justify-between">
                            {{-- <button type="button" class="flex justify-center items-center w-[40%] h-[74px] bg-grayDefault hover:bg-grayDark focus:ring-2 focus:outline-none focus:ring-grayDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2"> --}}
                                <button type="button" class="bg-grayDefault shadow-inset-custom w-[40%] h-[74px] hover:bg-blueDark focus:ring-3 focus:outline-none focus:ring-blueDark focus:bg-blueDark rounded-[14px] text-sm px-5 py-2.5 inline-flex items-center justify-center mr-2 mb-2 transform transition-transform ease-in-out duration-100 active:scale-95">
                                <p class="text-2xl text-whiteDefault">BLUE CORNER</p>
                            </button>
                            {{-- <button type="button" class="flex justify-center items-center w-[40%] h-[74px] bg-grayDefault hover:bg-grayDark focus:ring-2 focus:outline-none focus:ring-grayDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2"> --}}
                            <button type="button" class="bg-grayDefault shadow-inset-custom w-[40%] h-[74px] hover:bg-yellowDark focus:ring-3 focus:outline-none focus:ring-yellowDark focus:bg-yellowDark rounded-[14px] text-sm px-5 py-2.5 inline-flex items-center justify-center mr-2 mb-2 transform transition-transform ease-in-out duration-100 active:scale-95">
                                <p class="text-2xl text-whiteDefault">INVALID</p> 
                            </button>
                            {{-- <button type="button" class="flex justify-center items-center w-[40%] h-[74px] bg-grayDefault hover:bg-grayDark focus:ring-2 focus:outline-none focus:ring-grayDark rounded-[14px] text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2"> --}}
                            <button type="button" class="bg-grayDefault shadow-inset-custom w-[40%] h-[74px] hover:bg-redDark focus:ring-3 focus:outline-none focus:ring-redDark focus:bg-redDark rounded-[14px] text-sm px-5 py-2.5 inline-flex items-center justify-center mr-2 mb-2 transform transition-transform ease-in-out duration-100 active:scale-95">
                                <p class="text-2xl text-whiteDefault">RED CORNER</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
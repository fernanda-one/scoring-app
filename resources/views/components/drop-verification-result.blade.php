<!-- Main modal -->
<div id="dropVerificationModal" style="display: none">
    <div data-modal-backdrop="static" tabindex="-1" class="flex fixed justify-center z-50 top-0 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-full bg-slate-950 bg-opacity-50">
        <div class="max-h-full w-2/3">
            <div class="bg-white rounded-lg shadow dark:bg-gray-700 pt-5 pb-12">
                <div class="flex items-center justify-center p-4 rounded-t dark:border-gray-600">
                    <span class="flex text-xl lg:text-2xl font-bold align-middle items-center justify-center text-gray-900 dark:text-white">
                         PENGAMBILAN KEPUTUSAN
                    </span>
                </div>
                <div class="grid grid-cols-3 gap-10 place-items-center text-center px-10">
                    <div class="w-full">
                        <h2 class="text-xl lg:text-2xl font-bold">JURI 1</h2>
                        <button id="jurror1-red" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">SUDUT MERAH</p>
                        </button>
                        <button id="jurror1-blue" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">SUDUT BIRU</p>
                        </button>
                        <button id="jurror1-invalid" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">TIDAK VALID</p>
                        </button>
                    </div>
                    <div class="w-full">
                        <h2 class="text-xl lg:text-2xl font-bold">JURI 2</h2>
                        <button id="jurror2-red" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom focus:ring-2 focus:outline-none rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">SUDUT MERAH</p>
                        </button>
                        <button id="jurror2-blue" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">SUDUT BIRU</p>
                        </button>
                        <button id="jurror2-invalid" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">TIDAK VALID</p>
                        </button>
                    </div>
                    <div class="w-full">
                        <h2 class="text-xl lg:text-2xl font-bold">JURI 3</h2>
                        <button id="jurror3-red" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">SUDUT MERAH</p>
                        </button>
                        <button id="jurror3-blue" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">SUDUT BIRU</p>
                        </button>
                        <button id="jurror3-invalid" type="button" disabled class="flex justify-center items-center w-full h-3/4 lg:h-[74px] mt-3 lg:mt-4 bg-grayDefault hover:opacity-75 shadow-inset-custom rounded-[14px] py-5 lg:py-2.5 text-center">
                            <p class="text-sm lg:text-2xl font-medium lg:font-bold text-whiteDefault">TIDAK VALID</p>
                        </button>
                    </div>
                    <div class="col-span-3 flex justify-end w-full">
                        <button id="done-popup" type="button" class="bg-blueDefault shadow-inset-custom text-whiteDefault hover:bg-blueDefault rounded-lg text-md font-medium px-7 py-3 text-center inline-flex items-center transform transition-transform ease-in-out duration-100 active:scale-95">
                            SELESAI
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

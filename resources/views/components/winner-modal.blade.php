<!-- Main modal -->
<div id="modal-winner" class="hidden">
    <div data-modal-backdrop="static" tabindex="-1"
        class="flex fixed justify-center z-50 top-0 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-full bg-slate-950 bg-opacity-50">
        <div class="max-h-full my-auto w-3/4 md:w-1/2">
            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-center p-4 rounded-t dark:border-gray-600">
                    <span
                        class="flex text-xl lg:text-2xl font-bold align-middle items-center justify-center  text-gray-900 dark:text-white">
                        PEMENANG PERTANDINGAN
                    </span>
                </div>
                <hr />
                <div class="  place-items-center text-center p-4">
                    <span>Nama: </span> <span id="winner"> Demas Ridwan</span><br />
                    <span>Sudut: </span> <span id="corner"> Biru</span><br />
                    <span>Contingent: </span> <span id="contingent"> PSCP</span>
                    <div class="flex justify-end w-full mt-4">
                        <button id="done-button" type="button"
                            class="bg-blueDefault block w-full shadow-inset-custom text-whiteDefault hover:bg-blueDefault rounded-lg text-md font-medium px-7 py-3 text-center items-center transform transition-transform ease-in-out duration-100 active:scale-95">
                            SELESAI
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/winnerModal.js') }}"></script>

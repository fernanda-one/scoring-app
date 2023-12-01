<div class="relative">
    <button data-modal-target="logout-modal" data-modal-toggle="logout-modal" type="button" class="absolute bottom-2 left-2/4 -translate-x-1/2 bg-redDefault flex items-center gap-2 px-3 py-2 rounded-lg text-white">
        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
        </svg>
        Keluar
    </button>
</div>
<div id="logout-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative lg:w-[50%] w-[95%] max-h-full">
        <!-- Tambah content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="logout-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Peringatan!</h3>
                <div class="border border-gray-300 my-6"></div>
                <p>Apakah Anda yakin untuk keluar dari pertandingan?</p>
                <div class="flex justify-end gap-4 mt-6">
                    <form id="logout-form" action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="button" data-modal-hide="logout-modal" class="bg-grayDefault px-3 py-2 text-white rounded-lg">Batal</button>
                        <button type="submit" class="bg-redDefault px-3 py-2 text-white rounded-lg">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/library/LogoutFunc.js') }}">
</script>

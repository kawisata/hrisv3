<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-200">
  <div class="flex items-center md:items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center  md:p-0">

    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden md:inline-block md:align-middle md:h-screen"></span>​

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all md:my-8 md:align-middle md:max-w-lg md:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-5 pb-4 md:p-6 md:pb-4">
          Yakin akan menghapus data?
      </div>

      <div class="bg-gray-50 px-4 py-3 md:px-6 md:flex md:flex-row-reverse">
        <button wire:click="destroy({{$item->id}})" class="inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-red-700 text-xs leading-6 font-medium text-white shadow-sm hover:text-red-500 focus:outline-none focus:border-red-300 focus:shadow-outline-red transition ease-in-out duration-150 md:text-sm md:leading-5">Delete</button>
        <button wire:click="closeModal()" type="button" class="ml-2 inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-xs leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 md:text-sm md:leading-5">
            Cancel
          </button>
      </div>
    </div>
  </div>
</div>

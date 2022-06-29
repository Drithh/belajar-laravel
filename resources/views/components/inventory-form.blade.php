<div id="inventory-form"
  class="left-0 top-0 fixed flex place-content-center place-items-center w-screen h-screen bg-black bg-opacity-40">
  <div
    class="relative flex flex-col place-content-center place-items-center bg-white w-[32rem] min-h-[30rem] h-max py-10 mx-auto  rounded-xl border border-secondary p-6">
    <div class="title relative flex place-content-center w-full h-20">
      <div id="title" class="text-xl relative top-2">Tambah Data</div>
      <button type="button" onclick="closeForm()"
        class="cancel right-0 top-0 absolute hover:bg-gray-200 w-12 h-12 duration-500 opacity-80 rounded-full flex place-content-center place-items-center">
        <svg fill="#424242" width="35" height="35" version="2.0">
          <use href="#cancel" />
        </svg>
      </button>
    </div>
    <div class="flex flex-col gap-y-4 w-full">
      <form method="POST" action="{{ route('inventory.post') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="inputTitle" id="inputTitle" value="">
        <input type="hidden" name="id" id="data-id" value="">
        <label class="block text-sm text-gray-700" for="name">
          Nama
        </label>
        <input class="block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg" type="text"
          name="name" id="name" />
        <label class="block text-sm text-gray-700" for="description">
          Deskripsi
        </label>
        <input class="block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg" type="text"
          name="description" id="description" />
        <div id="image-wrapper" class="flex gap-4 py-4 flex-wrap">
          <div id="template" class="hidden relative p-1 border border-secondary rounded-xl w-[8.5rem] h-fit pt-2">
            <button onclick="removeImage(this.parentElement)"
              class="cancel right-1 top-1 absolute hover:bg-gray-200 w-6 h-6 duration-500 opacity-80 rounded-full flex place-content-center place-items-center">
              <svg fill="#424242" width="35" height="35" version="2.0">
                <use href="#cancel" />
              </svg>
            </button>
          </div>

        </div>
        <label class="block text-sm text-gray-700" for="image">
          Gambar
        </label>
        <input class="block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg" type="file"
          name="image" id="image" />
        <div
          class=" place-content-end add-row  flex h-20 px-4 place-items-center border-b-secondary border-b-[1px] border-opacity-50 gap-x-4">
          <button
            class="hover:bg-gray-200 w-40 px-4 h-12 duration-500 opacity-80 rounded-xl flex place-content-center place-items-center border border-secondary"
            onclick="event.preventDefault();this.closest('form').submit();">
            Confirm
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

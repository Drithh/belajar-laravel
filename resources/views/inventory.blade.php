<x-app-layout>
  <x-slot name="header">
    Inventory
  </x-slot>

  <x-slot name="text_header">
    Catat barang-barang yang ada di tempatmu!
  </x-slot>
  <svg class="hidden" version="2.0">
    <defs>
      <symbol id="trash-bin" viewbox="0 0 24 24">
        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z"></path>
      </symbol>
      <symbol viewBox="0 0 24 24" id="check">
        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"></path>
      </symbol>
      <symbol viewBox="0 0 24 24" id="cancel">
        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
        </path>
      </symbol>
      <symbol id="edit" viewBox="0 0 24 24" aria-hidden="true" data-testid="edit">
        <path
          d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34a.9959.9959 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z">
        </path>
      </symbol>

    </defs>
  </svg>
  @include('flash-message')
  <main class="flex flex-col lg:w-[90%] w-full max-w-[1600px] mt-32 mb-60 mx-auto">
    <div class="header-table flex h-16 px-4 place-items-center border-y-secondary border-y-[1px] border-opacity-50">
      <button onclick="sortTable(this.innerHTML.trim())"
        class="hover:opacity-70 font-PT font-bold text-base text-primary text-center w-[12%]">
        ID
      </button>
      <button onclick="sortTable(this.innerHTML.trim())"
        class="hover:opacity-70 font-PT font-bold text-base text-primary text-center w-[26%]">
        Nama
      </button>
      <button onclick="sortTable(this.innerHTML.trim())"
        class="hover:opacity-70 font-PT font-bold text-base text-primary text-center w-[30%]">
        Deskripsi
      </button>
      <button onclick="sortTable(this.innerHTML.trim())"
        class="hover:opacity-70 font-PT font-bold text-base text-primary text-center w-[22%]">
        Gambar
      </button>
      <div class=" font-PT font-bold text-base text-primary text-center w-[10%]">
        Action
      </div>
    </div>
    <section id="table-body">
      @foreach ($inventories as $inventory)
        <form method="POST" action="{{ route('buku-tamu.update', $inventory->id) }}"
          class="item-table flex min-h-16 h-max gap-x-4 px-4 place-items-center border-b-secondary hover:bg-gray-100 border-b-[1px] border-opacity-50  ">
          <div class="id font-Source text-base text-primary opacity-80 text-center w-[12%]">
            {{ $inventory->id }}
          </div>
          <div class="data name font-Source text-base text-primary opacity-80 text-center w-[26%]">
            {{ $inventory->name }}
          </div>
          <div class="data description font-Source text-base text-primary opacity-80 text-center w-[30%]">
            {{ $inventory->description }}
          </div>
          <div
            class="data  grid grid-cols-2 gap-8 font-Source text-base text-primary opacity-80 p-4 text-center w-[22%]">
            @foreach ($inventory->images as $image)
              @if (strpos($image->image, 'https') !== false)
                <img src="{{ $image->image }}" data-id="{{ $image->id }}" class="image max-h-24 w-auto mx-auto">
              @else
                <img src="{{ asset('storage/' . $image->image) }}" data-id="{{ $image->id }}"
                  class="image max-h-24 w-auto mx-auto">
              @endif
            @endforeach
          </div>

          <div class="font-Source text-base text-primary opacity-80 text-left w-[10%] flex place-content-between px-2 ">

            <button type="button" onclick="openForm(this.parentElement.parentElement)"
              class="hover:bg-gray-200 w-12 h-12 duration-500 opacity-80 rounded-full flex place-content-center place-items-center">
              <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                <use xlink:href="#edit"></use>
              </svg>
            </button>

        </form>

        <form method="POST" action="{{ route('inventory.destroy') }}">
          <input type="hidden" name="id" value="{{ $inventory->id }}">
          @csrf
          <button
            class="hover:bg-gray-100 w-12 h-12 duration-500 rounded-full flex place-content-center place-items-center"
            onclick="event.preventDefault();this.closest('form').submit();">
            <svg fill="#424242" width="35" height="35" version="2.0">
              <use href="#trash-bin" />
            </svg>
          </button>
        </form>

        </div>
      @endforeach
    </section>

    <section id="modal" class="hidden">

      <x-inventory-form></x-inventory-form>
    </section>

    {{-- <form id="form" action="{{ route('buku-tamu.store') }}" method="POST"
      class="add-row  flex h-20 px-4 place-items-center border-b-secondary border-b-[1px] border-opacity-50 gap-x-4">
      @csrf
      <div class="font-Source text-base text-primary opacity-80 text-left w-[10%]">
        <div id="id"
          class="place-items-center h-[40px]  w-full text-primary rounded  px-4 leading-tight border-0 ring-1  ring-gray-300  bg-gray-200 flex place-content-center"
          type="text">
        </div>
      </div>
      <div class="font-Source text-base text-primary opacity-80 text-left w-[26%]">
        <input id="nama" required name="nama"
          class="appearance-none h-[40px] block w-full text-primary rounded py-3 px-4 leading-tight border-0 ring-1  ring-gray-300 focus:outline-none focus:ring-blue-500"
          type="text" placeholder="Nama" />
      </div>
      <div class="font-Source text-base text-primary opacity-80 text-left w-[24%]">
        <input id="email" required name="email"
          class="appearance-none h-[40px] block w-full text-primary rounded py-3 px-4 leading-tight border-0 ring-1  ring-gray-300 focus:outline-none focus:ring-blue-500"
          type="email" placeholder="Email" />
      </div>
      <div class="font-Source text-base text-primary opacity-80 text-left w-[30%]">
        <input id="komentar" name="komentar"
          class="appearance-none h-[40px] block w-full text-primary rounded py-3 px-4 leading-tight border-0 ring-1  ring-gray-300 focus:outline-none focus:ring-blue-500"
          type="text" placeholder="Komentar" />
      </div>

      <div
        class="font-Source text-base text-primary opacity-80 text-left w-[10%] flex place-content-between px-2 button-wrapper">
        <button type="submit"
          class="check hover:bg-gray-200 w-12 h-12 duration-500 opacity-80 rounded-full flex place-content-center place-items-center">
          <svg fill="#424242" store="#424242" width="35" height="35" version="2.0">
            <use href="#check" />
          </svg>
        </button>
        <button onclick="clearInput(event)"
          class="cancel hover:bg-gray-200 w-12 h-12 duration-500 opacity-80 rounded-full flex place-content-center place-items-center">
          <svg fill="#424242" width="35" height="35" version="2.0">
            <use href="#cancel" />
          </svg>
        </button>
      </div>
    </form> --}}

    <div
      class=" place-content-end add-row  flex h-20 px-4 place-items-center border-b-secondary border-b-[1px] border-opacity-50 gap-x-4">
      <button onclick="openForm()"
        class="hover:bg-gray-200 w-40 px-4 h-12 duration-500 opacity-80 rounded-xl flex place-content-center place-items-center border border-secondary">
        Tambah Data
      </button>
    </div>
  </main>


  <script>
    const openForm = (e) => {
      const modal = document.querySelector('#modal');
      const inputs = modal.querySelectorAll('input');
      modal.querySelector('#inputTitle').value = 'insert';

      inputs.forEach(input => {
        if (!input.getAttribute('name') === '_token') {
          input.value = '';
        }
      });
      const images = modal.querySelectorAll('#image-wrapper .image');
      images.forEach(image => {
        image.remove();
      });

      if (e) {
        modal.querySelector('#data-id').value = e.querySelector('.id').innerHTML.trim()
        modal.querySelector('#title').innerHTML = 'Edit Data';
        modal.querySelector('#name').value = e.querySelector('.name').innerHTML.trim();
        modal.querySelector('#description').value = e.querySelector('.description').innerHTML.trim();
        modal.querySelector('#inputTitle').value = 'edit';

        const images = e.querySelectorAll('.image');
        images.forEach(image => {
          const imageWrapper = modal.querySelector('#image-wrapper');
          const template = imageWrapper.querySelector('#template').cloneNode(true);
          template.appendChild(image.cloneNode(true));
          template.classList.remove('hidden');
          template.classList.add('image');
          template.removeAttribute('id');
          imageWrapper.appendChild(template);
        });
      }

      const form = modal.classList.remove('hidden');

    }

    const closeForm = () => {
      document.querySelector('#modal').classList.add('hidden');
    }


    const removeImage = (e) => {
      const imageId = e.querySelector('img').dataset.id;
      e.remove();
      axios.delete(`/inventory-image/${imageId}`);
    }
  </script>

</x-app-layout>

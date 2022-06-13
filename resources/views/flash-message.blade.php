@if ($message = Session::get('success'))
  <div class="flex place-content-center alert">
    <div
      class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden md:w-5/12 fixed mt-6 top-0">
      <div class="flex w-3 bg-gradient-to-t from-green-500 to-green-400"></div>
      <div class="flex-1 p-3">
        <h1 class="md:text-xl text-gray-600">Success</h1>
        <p class="text-gray-400 text-xs md:text-sm font-light">{{ $message }}</p>
      </div>
      <button onclick="deleteModal(this)"
        class="cursor-pointer border-l hover:bg-gray-50 border-gray-100 px-4 flex place-items-center">
        <p class="text-gray-400 text-xs">CLOSE</p>
      </button>
    </div>
  </div>
@endif


@if ($message = Session::get('error'))
  <div class="flex place-content-center alert">
    <div
      class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden md:w-5/12 fixed mt-6 top-0">
      <div class="flex w-3 bg-gradient-to-t from-red-500 to-red-400"></div>
      <div class="flex-1 p-3">
        <h1 class="md:text-xl text-gray-600">Error</h1>
        <p class="text-gray-400 text-xs md:text-sm font-light">{{ $message }}</p>
      </div>
      <button onclick="deleteModal(this)"
        class="cursor-pointer border-l hover:bg-gray-50 border-gray-100 px-4 flex place-items-center">
        <p class="text-gray-400 text-xs">CLOSE</p>
      </button>
    </div>
  </div>
@endif

@if ($message = Session::get('warning'))
  <div class="flex place-content-center alert">
    <div
      class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden md:w-5/12 fixed mt-6 top-0">
      <div class="flex w-3 bg-gradient-to-t from-yellow-500 to-yellow-300"></div>
      <div class="flex-1 p-3">
        <h1 class="md:text-xl text-gray-600">Warning</h1>
        <p class="text-gray-400 text-xs md:text-sm font-light">{{ $message }}</p>
      </div>
      <button onclick="deleteModal(this)"
        class="cursor-pointer border-l hover:bg-gray-50 border-gray-100 px-4 flex place-items-center">
        <p class="text-gray-400 text-xs">CLOSE</p>
      </button>
    </div>
  </div>
@endif

@if ($message = Session::get('info'))
  <div class="flex place-content-center alert">
    <div
      class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden md:w-5/12 fixed mt-6 top-0">
      <div class="flex w-3 bg-gradient-to-t from-green-500 to-green-400"></div>
      <div class="flex-1 p-3">
        <h1 class="md:text-xl text-gray-600">Info</h1>
        <p class="text-gray-400 text-xs md:text-sm font-light">{{ $message }}</p>
      </div>
      <button onclick="deleteModal(this)"
        class="cursor-pointer border-l hover:bg-gray-50 border-gray-100 px-4 flex place-items-center">
        <p class="text-gray-400 text-xs">CLOSE</p>
      </button>
    </div>
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Please check the form below for errors
  </div>
@endif

<script>
  const deleteModal = (el) => {
    el.parentElement.style.display = 'none'
  }
  setTimeout(() => {
    document.querySelectorAll('.alert').forEach(el => {
      el.style.display = 'none'
    })
  }, 2000)
</script>

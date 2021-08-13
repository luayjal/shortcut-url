<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Shortcut New Url
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          
          <form action="{{route('dashboard.store')}}" method="post">
            @csrf
            <div class="mt-5 mb-3">
              <label for="" class="form-label">Url</label>
              <input type="text" class="form-control" name="url">
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">shorten</button>
            </div>

          </form>
          <div>

            <div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Url
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div>
            <a class=' btn btn-primary mt-5' href="{{route('dashboard.create')}}">Add New</a>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Url</th>
                <th scope="col">short url</th>
                <th scope="col">User</th>
                <th scope="col">Clicks</th>
                <th scope="col">created at</th>
                <th scope="col">Operation</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                @foreach($user->shortcut as $value)
                <tr>
                  <th scope="row">{{$value->id}}</th>
                  <td>{{$value->url}}</td>
                  <td><a href="{{route('short',$value->shortcut)}}"  target="_blank">{{config('app.url').$value->shortcut}}</a></td>
                  <td>{{$user->name}}</td>
                  <td>{{$value->clicks}}</td>
                  <td>{{$value->created_at}}</td>
                  <td>
                  <form action="{{route('dashboard.delete',$value->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              @endforeach

          </table>
        
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
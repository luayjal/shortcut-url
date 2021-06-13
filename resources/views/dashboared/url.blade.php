@extends('layouts.nav')
@section('content')
<div>
    <a class =' btn btn-primary mt-5' href="{{route('dashboard.create')}}">Add</a>
</div>
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Url</th>
      <th scope="col">short url</th>
      <th scope="col">created at</th>
      <th scope="col">updated at</th>
    </tr>
  </thead>
  <tbody>
  @foreach($urls as $url)
    <tr>
      <th scope="row">{{$url->id}}</th>
      <td>{{$url->url}}</td>
      <td><a href="{{route('short',$url->shortcut)}}" target="_blank">{{$url->shortcut}}</a></td>
      <td>{{$url->created_at}}</td>
      <td>{{$url->updated_at}}</td>
    </tr>
   @endforeach 
</table>
@endsection
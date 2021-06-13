@extends('layouts.nav')
@section('content')
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
@endsection

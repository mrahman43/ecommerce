@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-8 col-md-offset-2">
  <div class="panel panel-primary">
  <div class="panel-heading"> Category </div>
  <div class= "panel-body">
      <ul class="list-group">
        @foreach ($categories as $category)
          <li class="list-group-item"> {{ $category -> name }} </li>
        @endforeach
      </ul>
  </div>
</div>
</div>
@endsection

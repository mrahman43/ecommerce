@if(Session::has('success'))
  <div class="alert alert-success">
    <strong>Success!</strong> {{ Session::get('success') }}
  </div>
@elseif (Session::has('warning'))
  <div class="alert alert-danger">
    <strong>ERROR!</strong> {{ Session::get('warning') }}
  </div>
  @endif

@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
      <strong>ERROR!</strong> {{ $error }}
    </div>
    @endforeach
@endif

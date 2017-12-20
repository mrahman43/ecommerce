@if(Session::has('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
  			<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
  			<span class="text-semibold">Success! </span> {{ Session::get('success') }}
    </div>
@endif

@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-styled-left alert-bordered">
    		<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
    		<span class="text-semibold">Oh snap! </span> {{ $error }}
    </div>
  @endforeach
@endif

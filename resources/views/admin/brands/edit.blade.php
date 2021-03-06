@extends('layouts.admin.main')

@section('content')
  <div class="panel panel-white">
			<div class="panel-heading">
				<h1 class="panel-title">Edit Brand</h1>
      </div>
			<div class="panel-body">
        <div class="row">
          {!! Form::model($brand, array('route' => array('brands.update', $brand->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) !!}
          <div class="form-group">
            {{ Form::label('name', 'Brand Name: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            </div>
            <div class="form-group">
              {{ Form::label('description', 'Description: ', array('class' => 'control-label col-lg-2')) }}
              <div class="col-lg-10">
              {{ Form::textarea ('description', null, array('class' => 'form-control')) }}
              </div>
            </div>
            <div class="form-group">
                {{ Form::label('image', 'Logo: ', array('class' => 'control-label col-lg-2')) }}
              <div class="col-lg-10">
              @if($brand->image <> NULL)
              <img src="{{ asset('images/brands/' . $brand->image ) }}" height="400" width="400">
              @endif
              {{ Form::file('image', array('class' => 'file-input-custom', 'accept' => 'image/*')) }}
              </div>
            </div>
            <div class="text-right">
              {{-- <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a> --}}
              {{ Html::linkRoute('brands.index', 'Cancel', array(), array('class' => 'btn btn-default text-left')) }}
              {{-- {{ Form::submit('Update', array('class' => 'btn btn-primary')) }} --}}
              {{ Form::button('<i class="icon-check position-left"></i>Update', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
            </div>
            {!! Form::close() !!}

        </div>

			</div>
		</div>
		<!-- /form horizontal -->
@endsection

@extends('layouts.admin.main')

@section('title')
 Show Brand
@endsection

@section('breadcrumb')
Brand / Show
@endsection

@section('content')
  <div class="panel panel-flat">
			<div class="panel-heading">
				<h1 class="panel-title">Show Brand Details</h1>
			</div>

			<div class="panel-body">
        <div class="row">
            <div class="form-group">
                  {{ Form::label('name', 'Brand Name: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                    <p>{!! $brand->name !!}</p>
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('description', 'Description: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                  <p>{!! $brand->description !!} </p>
                </div>
              </div>
              <div class="form-group">
                  @if($brand->image <> NULL)
                  {{ Form::label('image', 'Logo: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                  <img src="{{ asset('images/brands/' . $brand->image ) }}" height="400" width="400">
                  @endif
                  </div>
              </div>
              <div>

              </div>
              <div class="text-right">
                  {{-- <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a> --}}
                  {{ Html::linkRoute('brands.index', 'Back', array(), array('class' => 'btn btn-default text-left')) }}
                  {{ Html::linkRoute('brands.edit', 'Edit', array($brand->id), array('class' => 'btn btn-primary text-left')) }}
              </div>
            <div class="col-lg-4">
            </div>
        </div>

			</div>
		</div>
		<!-- /form horizontal -->
@endsection

@extends('layouts.admin.main')

@section('breadcrumb')
Categories / Show
@endsection

@section('content')
  <div class="panel panel-white">
			<div class="panel-heading">
				<h1 class="panel-title">Show Category Details</h1>
			</div>

			<div class="panel-body">
        <div class="row">
            <div class="form-group">
                  {{ Form::label('name', 'Category Name: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                    <p>{!! $category->name !!}</p>
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('description', 'Description: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                  <p>@if($category->description <> NULL)
                    {!! $category->description !!}
                  @else
                    N/A
                  @endif
                  </p>
                </div>
              </div>
              <div class="form-group">
                  @if($category->image <> NULL)
                  {{ Form::label('image', 'Image: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                  <img src="{{ asset('images/categories/' . $category->image ) }}" height="400" width="400">
                  @endif
                  </div>
              </div>
              <div>

              </div>
              <div class="text-right">
                  {{-- <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a> --}}
                  {{ Html::linkRoute('categories.index', 'Back', array(), array('class' => 'btn btn-default btn-lg')) }}
                  {{ Html::linkRoute('categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-primary btn-lg')) }}
              </div>
            <div class="col-lg-4">
            </div>
        </div>

			</div>
		</div>
		<!-- /form horizontal -->
@endsection

@extends('layouts.admin.main')

@section('title')
Show Category
@endsection

@section('breadcrumb')
Subcategories / Show
@endsection

@section('content')
  <div class="panel panel-white">
			<div class="panel-heading">
				<h1 class="panel-title">Show Subcategory Details</h1>
			</div>

			<div class="panel-body">
        <div class="row">
            <div class="form-group">
                  {{ Form::label('name', 'Subategory Name: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                    <p>{!! $subcategory->name !!}</p>
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('description', 'Description: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                  <p>@if($subcategory->description <> NULL)
                    {!! $subcategory->description !!}
                  @else
                    N/A
                  @endif
                  </p>
                </div>
              </div>
              <div class="form-group">
                  {{ Form::label('category', 'Category: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                  <p>{{ $subcategory->category->name }}</p>
                  </div>
              </div>
              <div class="form-group">
                  @if($subcategory->image <> NULL)
                  {{ Form::label('image', 'Image: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                  <img src="{{ asset('images/subcategories/' . $subcategory->image ) }}" height="400" width="400">
                  @endif
                  </div>
              </div>
              <div>

              </div>
              <div class="text-right">
                  {{-- <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a> --}}
                  {{ Html::linkRoute('subcategories.index', 'Back', array(), array('class' => 'btn btn-default btn-lg')) }}
                  {{ Html::linkRoute('subcategories.edit', 'Edit', array($subcategory->id), array('class' => 'btn btn-primary btn-lg')) }}
              </div>
            <div class="col-lg-4">
            </div>
        </div>

			</div>
		</div>
		<!-- /form horizontal -->
@endsection

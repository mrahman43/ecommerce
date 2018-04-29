@extends('layouts.admin.main')

@section('content')
  <div class="panel panel-flat">
			<div class="panel-heading">
				<h1 class="panel-title">Show Category Details</h1>
				<div class="heading-elements">
					<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
      	</div>
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
                  <p>{!! $category->description !!} </p>
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
                  {{ Html::linkRoute('categories.index', 'Back', array(), array('class' => 'btn btn-default text-left')) }}
                  {{ Html::linkRoute('categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-primary text-left')) }}
              </div>
            <div class="col-lg-4">
            </div>
        </div>

			</div>
		</div>
		<!-- /form horizontal -->
@endsection

@extends('layouts.admin.main')

@section('content')
  <div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Edit New Category</h5>
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
            <div class="col-lg-8">
              {!! Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) !!}
                  <div class="form-group">
                  {{ Form::label('name', 'Category Name: ', array('class' => 'control-label col-lg-2')) }}
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
                  {{ Form::label('image', 'Image: ', array('class' => 'control-label col-lg-2')) }}
                  <div class="col-lg-10">
                  {{ Form::file('image', array('class' => 'file-input-custom', 'accept' => 'image/*')) }}
                  </div>
              </div>
              <div>

              </div>
              <div class="text-right">
                  {{-- <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a> --}}
                  {{ Html::linkRoute('categories.index', 'Cancel', array(), array('class' => 'btn btn-default text-left')) }}
                  {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
              </div>
              {!! Form::close() !!}

            </div>
            <div class="col-lg-4">
            </div>
        </div>

			</div>
		</div>
		<!-- /form horizontal -->
@endsection

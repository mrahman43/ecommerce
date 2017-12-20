@extends('layouts.admin.main')

@section('content')
  <div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Create New Category</h5>
				<div class="heading-elements">
					<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
      	</div>
			</div>

			<div class="panel-body">

        {{ Form::open(array('route' => 'categories.store', 'files' => true, 'class' => 'form-horizontal form-validate-jquery', 'action' => '#')) }}
          <div class="form-group">
            {{ Form::label('name', 'Category Name: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            {{ Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) }}
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
        <div class="text-right">
            {{-- {{ Html::linkRoute('categories.index', '<i class="icon-check position-left"></i>Cancel', array(), array('class' => 'btn btn-default text-left')) }} --}}
            {{ Form::button('<i class="icon-check position-left"></i>Create', array('type' => 'submit', 'class' => 'btn btn-success')) }}
        </div>
        {{ Form::close() }}

				{{-- <form class="form-horizontal" action="/admin/categories/create" method="get">
						<div class="form-group">
							<label class="control-label col-lg-2">Category Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="name">
							</div>
						</div>
            <div class="form-group">
							<label class="control-label col-lg-2">Description</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="description">
							</div>
						</div>
            <div class="form-group">
							<label class="col-lg-2 control-label text-semibold">Display preview:</label>
							<div class="col-lg-10">
								<input type="file" class="file-input-overwrite">
							</div>
						</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form> --}}
			</div>
		</div>
		<!-- /form horizontal -->
@endsection

@extends('layouts.admin.main')

@section('title')
| Create Subcategory
@endsection

@section('breadcrumb')
Subcategories / Create
@endsection

@section('content')
  <div class="panel panel-white">
			<div class="panel-heading">
				    <h1 class="panel-title">Create New Subcategory</h1>
			</div>
			<div class="panel-body">
        {{ Form::open(array('route' => 'subcategories.store', 'files' => true, 'class' => 'form-horizontal form-validate-jquery', 'action' => '#')) }}
        <div class="form-group">
            {{ Form::label('category', 'Category: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            <select data-placeholder="Select a category" class="select-search" name="category_id">
                <option></option>
                @foreach ($categories as $category)
                    <option value="{!! $category->id !!}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('name', 'Subcategory Name: ', array('class' => 'control-label col-lg-2')) }}
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
        <div class="form-group">
            {{ Form::label('attribute', 'Attributes: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            {{-- {{ Form::text ('attribute', null, array('class' => 'form-control')) }} --}}
            <a href="#" class="btn btn-success btn-lg btn-add-more"> Add</a>
            </div>
        </div>
        <div class="text-right">
            {{-- {{ Html::linkRoute('subcategories.index', '<i class="icon-check position-left"></i>Cancel', array(), array('class' => 'btn btn-default text-left')) }} --}}
            {{ Form::button('<i class="icon-plus position-left"></i>Create', array('type' => 'submit', 'class' => 'btn btn-success')) }}
        </div>
        {{ Form::close() }}
			</div>
		</div>

    <script>
      var template = '<div class="form-group"><div class="input-group">'+
                        '{{ Form::text ('attribute[]', null, array('class' => 'form-control')) }}'+
                        '<span class="input-group-btn"><button class="btn btn-danger remove" type="button" name="remove"><i class="icon-bin"></i></button></span>'
                    '</div></div>'
      $('.btn-add-more').on('click', function (e) {
            e.preventDefault();
            $(this).before(template);

      })
      $(document).on('click', '.remove', function() {
          $(this).parents('.input-group').remove();
      });
    </script>

		<!-- /form horizontal -->
@endsection

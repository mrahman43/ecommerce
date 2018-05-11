@extends('layouts.admin.main')

@section('title')
| Edit Subcategory
@endsection

@section('breadcrumb')
Subcategories / Edit
@endsection

@section('content')
  <div class="panel panel-white">
			<div class="panel-heading">
				<h1 class="panel-title">Edit Subcategory</h1>
			</div>
			<div class="panel-body">
        {!! Form::model($subcategory, array('route' => array('subcategories.update', $subcategory->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) !!}
        <div class="form-group">
          {{ Form::label('category', 'Category: ', array('class' => 'control-label col-lg-2')) }}
          <div class="col-lg-10">
          <select class="select-search" name="category_id">
              @foreach ($categories as $category)
                  <option value="{!! $category->id !!}" @if ($category->id == $subcategory->category_id)
                    {{ 'selected' }}
                  @endif>{{ $category->name }}</option>
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
          @if($subcategory->image <> NULL)
          <img src="{{ asset('images/subcategories/' . $subcategory->image ) }}" height="400" width="400">
          @endif
          {{ Form::file('image', array('class' => 'file-input-custom', 'accept' => 'image/*')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('attribute', 'Attributes: ', array('class' => 'control-label col-lg-2')) }}
          <div class="col-lg-10">
          @foreach ($attributes as $attribute)
            <div class="form-group">
              {{-- <div class="input-group"> --}}
              {{ Form::text ('attribute_name[]', $attribute->name, array('class' => 'form-control')) }}
              {{ Form::hidden('attribute_id[]',  $attribute->id) }}
              {{-- <span class="input-group-btn"><a href="{{ route(['subcategories.attribute.delete', $attribute->id])}}" class="btn btn-danger remove" type="button" name="remove"><i class="icon-bin"></i></a></span> --}}
              {{-- </div> --}}
          </div>
          @endforeach
          <a href="#" class="btn btn-primary btn-add-more"> Add New</a>
          </div>
        </div>
        <div class="text-right">
          {{-- {{ Html::linkRoute('subcategories.index', '<i class="icon-check position-left"></i>Cancel', array(), array('class' => 'btn btn-default text-left')) }} --}}
          {{ Html::linkRoute('categories.index', 'Cancel', array(), array('class' => 'btn btn-default text-left')) }}
          {{ Form::button('<i class="icon-check position-left"></i>Update', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
        </div>
        {{ Form::close() }}
			</div>
		</div>

    {{-- <script>
      var template = '<div class="form-group">'+
                        '{{ Form::text ('attribute[]', null, array('class' => 'form-control')) }}'+
                    '</div>'
      $('.btn-add-more').on('click', function (e) {
          e.preventDefault();
          $(this).before(template);
        })
    </script> --}}
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

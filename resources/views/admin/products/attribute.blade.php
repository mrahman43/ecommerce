@extends('layouts.admin.main')

@section('content')
  <div class="panel panel-white">
			<div class="panel-heading">
				<h1 class="panel-title">Add Product Details</h1>
			</div>
      
      {{ Form::open(array('route' => array('products.store_attribute', $product_id),'method' => 'POST','class' => 'form-horizontal form-validate-jquery', 'action' => '#')) }}
      <div class="panel-body">
        @foreach ($attributes as $attribute)
          <div class="form-group">
              {{ Form::label('attribute', $attribute->name, array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
              {{ Form::text ('value[]',0, array('class' => 'form-control')) }}
              {{ Form::hidden('attribute_id[]',  $attribute->id) }}
            </div>
          </div>

      @endforeach
      <div class="text-right">
          {{-- {{ Html::linkRoute('subcategories.index', '<i class="icon-check position-left"></i>Cancel', array(), array('class' => 'btn btn-default text-left')) }} --}}
          {{ Form::button('<i class="icon-check position-left"></i>Add', array('type' => 'submit', 'class' => 'btn btn-success')) }}
          {{ Form::close() }}
      </div>

			</div>
		</div>
		<!-- /form horizontal -->
@endsection

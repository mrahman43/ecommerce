@extends('layouts.admin.main')

@section('title')
| Edit Products
@endsection

@section('breadcrumb')
Products / Edit
@endsection

@section('content')
  <div class="panel panel-white">
      <div class="panel-heading">
        <h1 class="panel-title">Edit Product</h1>
      </div>
      <div class="panel-body">
        {{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal form-validate-jquery')) }}
        <div class="form-group">
            {{ Form::label('name', 'Product Name: ', array('class' => 'control-label col-lg-2')) }}
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
            {{ Form::label('price', 'Price: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            {{ Form::text('price', null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('purchase_price', 'Purchase Price: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            {{ Form::text('purchase_price', null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('tax', 'Tax: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            {{ Form::text('tax', null, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('stock', 'Stock Quantity: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            {{ Form::number('stock', null, array('class' => 'form-control', 'required' => 'required')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('type', 'Type: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            <select data-placeholder="Select a type" class="select-search" name="type">
                <option></option>
                @foreach ($categories as $category)
                    <optgroup label="{{ $category->name}}">
                        @foreach ($subcategories as $subcategory)
                            @if($subcategory->category_id == $category->id)
                            <option value="{!! $category->id !!}|{!! $subcategory->id !!}"
                              @if($category->id == $product->category_id && $subcategory->id == $product->subcategory_id)
                                {{ 'selected' }}
                              @endif>
                                {{ $subcategory->name }}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('type', 'Brand: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
              <select data-placeholder="Select a brand" class="select-search" name="brand_id">
                <option></option>
                  @foreach ($brands as $brand)
                      <option value="{!! $brand->id !!}"
                        @if($brand->id == $product->brand_id)
                          {{ 'selected' }}
                        @endif>
                        {{ $brand->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
        </div>
        {{-- <div class="form-group">
            {{ Form::label('subcategory', 'Subcategory: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            <select data-placeholder="Select a subcategory" class="select-search" name="subcategory_id">
                <option></option>
                @foreach ($subcategories as $subcategory)
                    <option value="{!! $subcategory->id !!}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
            </div>
        </div> --}}
        <div class="form-group">
            {{ Form::label('active', 'Active Status: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            <select class="select-search" name="active">
                <option></option>
                    <option value="1" selected>Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('image', 'Image: ', array('class' => 'control-label col-lg-2')) }}
            <div class="col-lg-10">
            @if($product->image <> NULL)
            <img src="{{ asset('images/products/' . $product->image ) }}" height="400" width="400">
            @endif
            {{ Form::file('image', array('class' => 'file-input-custom', 'accept' => 'image/*')) }}
            </div>
        </div>
        <div class="text-right">
            {{-- {{ Html::linkRoute('subcategories.index', '<i class="icon-check position-left"></i>Cancel', array(), array('class' => 'btn btn-default text-left')) }} --}}
            {{ Html::linkRoute('products.index', 'Cancel', array(), array('class' => 'btn btn-default text-left')) }}
            {{ Form::button('<i class="icon-check position-left"></i>Create', array('type' => 'submit', 'class' => 'btn btn-success')) }}
        </div>
        {{ Form::close() }}
			</div>
    </div>
@endsection

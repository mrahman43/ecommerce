@extends('layouts.admin.main')

@section('content')
  <div class="panel panel-white">
			<div class="panel-heading">
				<h1 class="panel-title">Create New Product</h1>
			</div>
			<div class="panel-body">
        {{ Form::open(array('route' => 'products.store', 'files' => true, 'class' => 'form-horizontal form-validate-jquery', 'action' => '#')) }}
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
                            <option value="{!! $category->id !!}|{!! $subcategory->id !!}">{{ $subcategory->name }}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
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
            {{ Form::file('image', array('class' => 'file-input-custom', 'accept' => 'image/*')) }}
            </div>
        </div>
        <div class="text-right">
            {{-- {{ Html::linkRoute('subcategories.index', '<i class="icon-check position-left"></i>Cancel', array(), array('class' => 'btn btn-default text-left')) }} --}}
            {{ Form::button('<i class="icon-check position-left"></i>Create', array('type' => 'submit', 'class' => 'btn btn-success')) }}
        </div>
        {{ Form::close() }}
			</div>
		</div>
		<!-- /form horizontal -->
@endsection

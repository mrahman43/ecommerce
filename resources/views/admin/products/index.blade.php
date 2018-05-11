@extends('layouts.admin.main')

@section('title')
| Products
@endsection

@section('breadcrumb')
Products
@endsection

@section('content')
  <!-- Basic datatable -->
					<div class="panel panel-white">
						<div class="panel-heading">
							<h1 class="panel-title">Product List</h1>
							<div class="heading-elements">
								{{ Html::linkRoute('products.create', 'Create', array() ,array('class' => 'btn btn-success btn-lg')) }}</li>

            	</div>
						</div>
						<table class="table datatable-basic">
							<thead>
                <tr>
									<th>#</th>
                  <th>Product Name</th>
                  {{-- <th>Description</th> --}}
                  <th>Image</th>
                  <th>Price</th>
                  <th>Stock</th>
									<th>Created At</th>
                  <th class="text-center">Actions</th>
                </tr>
							</thead>
							<tbody>
                @foreach ($products as $product)
                <tr class="@if($product->stock < 5) {{ 'danger'}} @endif">
									<td> {{ $product->id }} </td>
                  <td> {{ $product->name }} </td>
                  {{-- <td> {{ substr($product->description, 0, 75) }} {{ strlen($product -> description) > 50 ? "..." :"" }} </td> --}}
									<td> @if($product->image <> NULL)
						           <img src="{{ asset('images/products/' . $product->image ) }}" height="100" width="100">
							         @endif
									</td>
                  <td> {{ $product->purchase_price }} </td>
                  <td> {{ $product->stock }} </td>
                  <td> {{ date('j M Y', strtotime($product->created_at)) }} </td>
                  <td class="text-center col-md-4">
										<div class="btn-group btn-group-justified">
												<div class="btn-group">
														<a href="{{ route('products.show', $product->id) }}" class="btn btn-default"><i class="icon-cog position-left"></i> Details</a>
												</div>
												<div class="btn-group">
														<a href="{{ route('products.edit', $product->id) }}" class="btn btn-default"><i class="icon-pencil4 position-left"></i> Edit</a>
												</div>
												<div class="btn-group">
														{{ Form::open(array('route' => array('products.destroy', $product->id), 'method' => 'DELETE', 'onclick' => 'return myFunction();')) }}
														{{ Form::button('<i class="icon-bin position-left"></i>Delete', array('type' => 'submit', 'class' => 'btn btn-default')) }}
														{{ Form::close() }}
												</div>
										</div>
                  </td>
                <tr>
                @endforeach
							</tbody>
						</table>
						{{-- Take note that this variable $product  is different from $products.
						The first is the original variable while the latter is the regenerated variable and we use the original for the pagination --}}
						<div class="text-center">
								{{ $products->links() }}
						</div>
					</div>
@endsection

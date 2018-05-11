@extends('layouts.admin.main')

@section('title')
| Brand
@endsection

@section('breadcrumb')
Brand
@endsection

@section('content')
  <!-- Basic datatable -->
					<div class="panel panel-white">
						<div class="panel-heading">
							<h1 class="panel-title">Brands List</h1>
							<div class="heading-elements">
									{{ Html::linkRoute('brands.create', 'Create', array() ,array('class' => 'btn btn-success  btn-lg')) }}
            	</div>
						</div>
						<table class="table datatable-basic">
							<thead>
                <tr>
									<th>#</th>
                  <th>Brand Name</th>
                  <th>Created At</th>
                  <th class="text-center col-lg-4">Actions</th>
                </tr>
							</thead>
							<tbody>
                @foreach ($brands as $brand)
                <tr>
									<td> {{ $brand->id }} </td>
                  <td> {{ $brand->name }} </td>
                  {{-- <td> {{ substr($category->description, 0, 75) }} {{ strlen($category -> description) > 50 ? "..." :"" }} </td>
									<td> @if($category->image <> NULL)
										<img src="{{ asset('images/' . $category->image ) }}" height="100" width="100">
									@endif
									</td> --}}
                  <td> {{ date('j M Y', strtotime($brand->created_at)) }} </td>
                  <td class="text-center col-md-4">
										<div class="btn-group btn-group-justified">
												<div class="btn-group">
														<a href="{{ route('brands.show', $brand->id) }}" class="btn btn-default"><i class="icon-cog position-left"></i> Details</a>
												</div>
												<div class="btn-group">
														<a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-default"><i class="icon-pencil4 position-left"></i> Edit</a>
												</div>
												<div class="btn-group">
														{{ Form::open(array('route' => array('brands.destroy', $brand->id), 'method' => 'DELETE', 'onclick' => 'return myFunction();')) }}
														{{ Form::button('<i class="icon-bin position-left"></i>Delete', array('type' => 'submit', 'class' => 'btn btn-default')) }}
														{{ Form::close() }}
												</div>
										</div>
                  </td>
                <tr>
                @endforeach
							</tbody>
						</table>
						{{-- Take note that this variable $category  is different from $categories.
						The first is the original variable while the latter is the regenerated variable and we use the original for the pagination --}}
						<div class="text-center">
								{{ $brands->links() }}
						</div>
					</div>
@endsection

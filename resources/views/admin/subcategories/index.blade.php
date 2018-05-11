@extends('layouts.admin.main')

@section('title')
| Subcategories
@endsection

@section('breadcrumb')
Subcategories
@endsection

@section('content')
  <!-- Basic datatable -->
					<div class="panel panel-white">
						<div class="panel-heading">
							<h1 class="panel-title">Subcategory List</h1>
							<div class="heading-elements">
								{{ Html::linkRoute('subcategories.create', 'Create', array() ,array('class' => 'btn btn-success btn-lg')) }}
							</div>
						</div>
						<table class="table datatable-basic">
							<thead>
                <tr>
									<th>#</th>
                  <th>Subcategory Name</th>
									<th>Category Name</th>
                  <th>Created At</th>
                  <th class="text-center">Actions</th>
                </tr>
							</thead>
							<tbody>
                @foreach ($subcategories as $subcategory)
                <tr>
									<td> {{ $subcategory->id }} </td>
                  <td> {{ $subcategory->name }} </td>
									<td> {{ $subcategory->category->name }} </td>
                  {{-- <td> {{ substr($subcategory->description, 0, 75) }} {{ strlen($subcategory -> description) > 50 ? "..." :"" }} </td>
									<td> {{ $subcategory->image }} </td> --}}
                  <td> {{ date('j M Y', strtotime($subcategory->created_at)) }} </td>
                  <td class="text-center col-md-4">
										<div class="btn-group btn-group-justified">
											<div class="btn-group">
													<a href="{{ route('subcategories.show', $subcategory->id) }}" class="btn btn-default"><i class="icon-cog position-left"></i> Details</a>
											</div>
											<div class="btn-group">
													<a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-default"><i class="icon-pencil4 position-left"></i> Edit</a>
											</div>
											<div class="btn-group">
													{{ Form::open(array('route' => array('subcategories.destroy', $subcategory->id), 'method' => 'DELETE', 'onclick' => 'return myFunction();')) }}
													{{ Form::button('<i class="icon-bin position-left"></i>Delete', array('type' => 'submit', 'class' => 'btn btn-default btn-lg')) }}
													{{ Form::close() }}
											</div>
										</div>
                  </td>
                <tr>
                @endforeach
							</tbody>
						</table>
						{{-- Take note that this variable $subcategory  is different from $categories.
						The first is the original variable while the latter is the regenerated variable and we use the original for the pagination --}}
						<div class="text-center">
								{{ $subcategories->links() }}
						</div>
					</div>
@endsection

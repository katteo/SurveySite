@extends('layouts.admin') @section('title', 'Users') @section('content')
<!--  PAGE HEADER WITH BREADCRUMBS -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Usuarios</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/">Dashboard</a>
			</li>
			<li>
				Usuarios
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		{{--  <div class="title-action">
			<a href="{{ url('/admin/users/add') }}" class="btn btn-primary btn-sm">Añadir usuario</a>
		</div>  --}}
	</div>
</div>
<!--  END PAGE HEADER WITH BREADCRUMBS -->

<!-- START USER LIST -->
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeIn">
			<div class="row">
				<div class="col-sm-7 m-b-xs issue-list-icon-group">
					<label class="btn btn-sm btn-white">
						<a href="{{ url('/admin/users') }}" title="All">Todos</a>
					</label>
					<label class="btn btn-sm btn-white">
						<a href="{{ url('/admin/users/type/user') }}" title="Users">Usuario</a>
					</label>
					{{--  <label class="btn btn-sm btn-white">
						<a href="{{ url('/admin/users/type/editor') }}" title="Editors">Editor</a>
					</label>
					<label class="btn btn-sm btn-white">
						<a href="{{ url('/admin/users/type/contributor') }}" title="Contributors">Contribuidor</a>
					</label>  --}}
					<label class="btn btn-sm btn-white">
						<a href="{{ url('/admin/users/type/admin') }}" title="Admins">Admin</a>
					</label>
				</div>
				{{--
				<div class="col-sm-5">
					<div class="input-group">
						<input placeholder="Search" class="input-sm form-control" type="text">
						<span class="input-group-btn">
							<a href="search_results.html">
								<button type="button" class="btn btn-sm btn-primary"> Go!</button>
							</a>
						</span>
					</div>
				</div> --}}
			</div>

			<div class="ibox">
				<div class="ibox-content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nombre de usuario</th>
								<th>Tipo de Usuario</th>
								<th>Estado del Usuario</th>
								<th>Registrado</th>
								<th>Ultimo inicio</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($users as $user) 
                                @include('admin.items.user_list_item') 
                            @empty 
                                @include('admin.items.user_list_item_none') 
                            @endforelse
						</tbody>
					</table>
				</div>
			</div>
			<!-- END IBOX -->
		</div>
	</div>
</div>
<!-- END USER LIST -->

</div>
<!-- END PAGE WRAPPER -->
@endsection
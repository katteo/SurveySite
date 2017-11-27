@extends('layouts.admin') @section('title', 'Issues') @section('content')
<!--  PAGE HEADER WITH BREADCRUMBS -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Encuestas</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/">Dashboard</a>
			</li>
			<li>
				Encuestas
			</li>
			<li class="active">
				<strong>{{ $statusType }}</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="{{ url('/admin/issues/add') }}" class="btn btn-primary btn-sm">Crear encuesta</a>
		</div>
	</div>
</div>
<!--  END PAGE HEADER WITH BREADCRUMBS -->

<!-- START ISSUE LIST-->
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeIn">

			<!-- START ISSUE LIST FILTER -->
			<div class="row">
				<div class="col-sm-7 m-b-xs issue-list-icon-group">

					<label class="btn btn-sm btn-white">
						<a href="{{ url('/admin/issues') }}" title="All">Todas</a>
					</label>
					<label class="btn btn-sm btn-white">
						<a href="{{ url('/admin/issues/status/live') }}" title="Live">En proceso</a>
					</label>
					<label class="btn btn-sm btn-white">
						<a href="{{ url('/admin/issues/status/closed') }}" title="Closed">Cerrada</a>
					</label>

				</div>
			</div>
			<!-- END ISSUE LIST FILTER -->

			<!-- ISSUES LIST -->
			@forelse ($issues as $issue) 
                @include('admin.items.issue_list_item') 
            @empty 
                @include('admin.items.issue_list_item_none')
			@endforelse
			<!-- END ISSUES LIST -->

		</div>
	</div>
</div>
<!-- END ISSUE LIST-->

</div>
<!-- END PAGE WRAPPER -->
@endsection
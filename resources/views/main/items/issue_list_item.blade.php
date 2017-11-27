<div class="col-lg-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">{{ $issue->title }}</h3>
		</div>
		<div class="panel-body">
			<p>{{ $issue->motive }}</p>
		</div>
		<div class="panel-footer">
			@if ($issue->title)
			<a type="button" class="btn btn-sm btn-primary" href="{{ url('/issues/') }}/{{ $issue->id }}">Comenzar</a>
			<button type="button" class="btn btn-sm btn-danger">Omitir</button>
			@else
			<button type="button" class="btn btn-sm btn-success disabled">Completada</button>
			@endif
		</div>
	</div>
</div>

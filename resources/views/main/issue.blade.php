@extends('layouts.main') @section('content')
<div id="main-region" class="container">
	<form class="" method="post" action="{{url('/issues/save/response')}}">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">{{$issue->title}}</h3>
					</div>
					<div class="panel-body">
						@if (session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
						@endif
						@if (session('warning'))
						<div class="alert alert-warning">
							{{ session('warning') }}
						</div>
						@endif
						@foreach($data as $key => $question)
							<h3>{{$question['question']->question}}</h3>
							<input type="hidden" value="{{$issue->id}}" name="issue_id"> 
							@foreach($question['answers'] as $key2 => $answer)
							<div class="form-group radio">
								<label>
									<input type="radio" value="{{$answer->id}}" name="answer{{$question['question']->id}}" class="icheck required">{{$answer->answer}}</label>
							</div>
							@endforeach 
						@endforeach	
						
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 pull-right">
				<button type="submit" class="btn btn-md btn-info">Enviar</button>
			</div>
		</div>
	</form>

	@endsection
@extends('layouts.admin')

@section('title', 'Issue')
			
@section('content')
<!--  PAGE HEADER WITH BREADCRUMBS -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Issues</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li>
                <a href="{{ url('/admin/issues') }}">Issues</a>
            </li>
            <li class="active">
                <strong>Issue</strong>
            </li>
        </ol>
    </div>
</div>
<!--  END PAGE HEADER WITH BREADCRUMBS -->

<!-- START ISSUE PAGE CONTENT-->    
<div class="row">

    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeIn">

            <div class="ibox-content">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-b-md">
                            <h2>{{ $issue->title }}</h2>
                        </div>
                        <p><small>{{ $issue->motive }}</small></p>
                    </div>
                </div>
                
                <div class="row m-t-md">
                    <div class="col-lg-12">
                        <dl class="dl-horizontal">
                            <dt>Estado:</dt> <dd><strong>{{ ucfirst($issue->status) }}</strong></dd>
                            <dt>Creado por:</dt> <dd><a href="{{ url('/admin/users') }}/{{ $issue->created_by_id }}">{{ formatUsername($issue->created_by_id) }}</a></dd>
                            <dt>Ultima actualizacion:</dt> <dd><li class="fa fa-clock-o"></li> {{ $issue->updated_at->format('h:m a - m.d.Y') }}</dd>
                            <dt>Creado:</dt> <dd><li class="fa fa-clock-o"></li> {{ $issue->created_at->format('h:m a - m.d.Y') }}</dd>
                        </dl>
                    </div>
                </div>
                
                <!-- START TABS -->
                <div class="row m-t-sm">
                    <div class="col-lg-12">
                        <div class="panel blank-panel">
                            <div class="panel-heading">
                                <div class="panel-options">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab-2" data-toggle="tab">Preguntas</a></li>
                                        <li><a href="#tab-info" data-toggle="tab">Detalles</a></li>
                                        <li><a href="#tab-3" data-toggle="tab">Actividad</a></li>
                                    </ul>
                                </div>
                            </div>

							<div class="panel-body">
								<div class="tab-content">
            
									<!-- TAB INFO -->
									<div id="tab-info" class="tab-pane">
										<div class="m-t-md">
											@if (session('status'))
											<div class="alert alert-success">
												{{ session('status') }}
											</div>
											@endif
				                            <form method="post" class="form-horizontal" action="{{ url('/admin/issues/update') }}/{{ $issue->id }}">
				                                <div class="form-group"><label class="col-sm-2 control-label">Titulo</label>
				                                    <div class="col-sm-10">
    				                                    <input name="title" class="form-control" type="text" value="{{ $issue->title }}" @if ($editable == false) disabled @endif>
    				                                </div>
				                                </div>
				                                <div class="hr-line-dashed"></div>
				                                <div class="form-group"><label class="col-sm-2 control-label">Select</label>
				                                    <div class="col-sm-10">
    				                                    <select class="form-control m-b" name="status">
	                                    			    @foreach ($availableStatus as $status)
    				                                        <option value="{{ $status }}" @if ($status == $issue->status) selected @endif>{{ ucfirst($status) }}</option>
				                                        @endforeach
                                                        </select>
				
				                                    </div>
				                                </div>  
				                                <div class="hr-line-dashed"></div>
				                                <div class="form-group"><label class="col-sm-2 control-label">Motivo</label>
				                                    <div class="col-sm-10">
					                                    <textarea name="motive" class="form-control" type="text" rows="10" @if ($editable == false) disabled @endif>{{ $issue->motive }}</textarea>
				                                    </div>
				                                </div>
				                                <div class="hr-line-dashed"></div>
				                                <div class="form-group">
				                                    <div class="col-sm-4 col-sm-offset-2">
				                                        <button class="btn btn-white" type="submit">Cancelar</button>
				                                        <button class="btn btn-primary" type="submit">Guardar cambios</button>
				                                    </div>
				                                </div>
				                            </form>
				                        </div>

									</div>
									<!-- END TAB INFO -->
            
									<!-- TAB 2 -->
									<div class="tab-pane active" id="tab-2">
										<div class="m-t-md">
											<div class="ibox ">  
					                             @if (session('status'))
												<div class="alert alert-success">
													{{ session('status') }}
												</div>
												@endif
					                            @if ($editable == true)
												<form id="frmAddQuestion" class="form-horizontal" method="post" action="{{ url('/admin/questions/add')}}">
												{!! csrf_field() !!}
												<input type="hidden" name="issue_id" value="{{ $issue->id }}">
					                            					                            
					                            <div class="form-group">
													<label class="col-sm-2 control-label">Pregunta</label>
				                                    <div class="col-sm-10">
    				                                    <input name="question" class="form-control" type="text" required>
    				                                </div>
				                                </div>

												<div class="form-group"><label class="col-sm-2 control-label">Respuesta #1</label>
													
				                                    <div class="col-sm-10">
    				                                    <input name="answer" class="form-control" type="text" required>
    				                                </div>
				                                </div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Respuesta #2</label>
				                                    <div class="col-sm-10">
    				                                    <input name="answer1" class="form-control" type="text" required>
    				                                </div>
				                                </div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Respuesta #3</label>
				                                    <div class="col-sm-10">
    				                                    <input name="answer2" class="form-control" type="text" required>
    				                                </div>
				                                </div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Respuesta #4</label>
				                                    <div class="col-sm-10">
    				                                    <input name="answer3" class="form-control" type="text" required>
    				                                </div>
				                                </div>

												<div class="form-group">
				                                    <div class="col-sm-4 col-sm-offset-2">
				                                        <button class="btn btn-primary" type="submit">Crear</button>
				                                    </div>
				                                </div>

												</form>
					                            @endif

												{{--  <!-- NESTABLE SORTABLE LIST -->
					                            <div class="dd" id="nestable2" data-issue="{{ $issue->id }}">
					                                <ol class="dd-list">
                                                        @forelse ($questions as $question)
                                        				    @include('admin.items.question_list_item')
                                                        @empty
                                                            @include('admin.items.question_list_item_none')
                                                        @endforelse
					                                </ol>
					                            </div>
					                            <!-- END NESTABLE SORTABLE LIST -->  --}}

        									</div>
    									</div>
                    				</div>
                    				<!-- END TAB 2 -->
                    				
                    				<!-- TAB 3 -->
	                                <div class="tab-pane" id="tab-3">
	
	                                    <table class="table table-striped">
	                                        <thead>
	                                        <tr>
	                                            <th>Accion</th>
	                                            <th>Usuario</th>
	                                            <th>Fecha</th>
	                                            <th>Notas</th>
	                                        </tr>
	                                        </thead>
	                                        <tbody>
		                                        
		                                    <!-- ISSUE ACTIVITY LIST ITEM -->
	                                        <tr>
	                                            <td>
	                                               Encuesta creada
	                                            </td>
	                                            <td><a href="{{ url('/admin/users') }}/{{ auth()->user()->id }}">{{ auth()->user()->username }}</a></td>
	                                            <td>07.16.2015 <i class="fa fa-clock-o"></i> 10:10:1</td>
	                                            <td>
	                                            <p class="small">
	                                                This is a spot for any notes..
	                                            </p>
	                                            </td>
	                                        </tr>	
		                                    <!-- ISSUE ACTIVITY LIST ITEM -->
	
	                                        </tbody>
	                                    </table>
	
	                                </div>
	                                <!-- END TAB 3 -->
	                                
                            	</div>
                            </div>
                            <!-- END PANEL BODY -->

                        </div>
                    </div>
				</div>
               	<!-- END START TABS -->
               	
            </div>
            <!-- END ibox-content -->
                
        </div>
    </div>

</div>
<!-- END ISSUE PAGE CONTENT -->	
@endsection

@section('footerjs')
    @parent
	<script src="/js/plugins/nestable/jquery.nestable.js"></script>
	<script src="/js/plugins/jeditable/jquery.jeditable.js"></script>
	<script src="/js/modules/questions_module.js"></script>
	<script src="/js/modules/answers_module.js"></script>
@endsection
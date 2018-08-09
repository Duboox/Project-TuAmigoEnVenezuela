@extends('layouts.dashboard')
@section('title', 'Servicio: '.$service->name)
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Servicio {{ $service->name }}</h2>
      <ol class="breadcrumb">
         <li>
            <a href="{{ route('home') }}">Inicio</a>
         </li>
         <li>
            <a href="{{ route('services.index') }}">Servicios</a>
         </li>
         <li class="active">
            <a href="#">
                <strong>Editar</strong>
            </a>
         </li>
      </ol>
   </div>
</div>
<div class="wrapper wrapper-content animated fadeIn">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Requeridos (*)</h5>
            </div>
            <div class="ibox-content">
               {{ Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'PUT']) }}
               <div class="ibox-content">
                  <div class="row">
                     <div class="col-sm-12 b-r">
                        <div class="form-group">
                           <label>Nombre: (*)</label> 
                           {{ Form::text('name', $service->name, ['class' => 'form-control']) }}
                           @if ($errors->has('name'))
                             <span class="error-validate">
                                <strong>{{ $errors->first('name') }}</strong>
                             </span>
                           @endif
                        </div>
                        <div class="form-group">
                            <label>Descripción: (*)</label> 
                            {{ Form::text('description', $service->description, ['class' => 'form-control']) }}
                            @if ($errors->has('description'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('description') }}</strong>
                              </span>
                            @endif
                         </div>
                        <div class="submit-button">
                           {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary pull-left m-t-n-xs']) }}
                        </div>
                     </div>
                  </div>
               </div>
               {{ Form::close() }}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
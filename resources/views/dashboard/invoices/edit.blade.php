@extends('layouts.dashboard')
@section('title', 'Agente: '.$agent->name)
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Agente {{ $agent->name }}</h2>
      <ol class="breadcrumb">
         <li>
            <a href="{{ route('home') }}">Inicio</a>
         </li>
         <li>
            <a href="{{ route('agents.index') }}">Agentes</a>
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
               {{ Form::model($agent, ['route' => ['agents.update', $agent->id], 'method' => 'PUT']) }}
               <div class="ibox-content">
                  <div class="row">
                     <div class="col-sm-12 b-r">
                        <div class="form-group">
                           <label>Nombre: (*)</label> 
                           {{ Form::text('name', $agent->name, ['class' => 'form-control']) }}
                           @if ($errors->has('name'))
                             <span class="error-validate">
                                <strong>{{ $errors->first('name') }}</strong>
                             </span>
                           @endif
                        </div>
                        <div class="form-group">
                            <label>Apellido: (*)</label> 
                            {{ Form::text('last_name', $agent->last_name, ['class' => 'form-control']) }}
                            @if ($errors->has('last_name'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('last_name') }}</strong>
                              </span>
                            @endif
                         </div>
                         <div class="form-group">
                           <label>Correo Eléctronico: (*)</label> 
                           {{ Form::text('email', $agent->email, ['class' => 'form-control']) }}
                           @if ($errors->has('email'))
                             <span class="error-validate">
                                <strong>{{ $errors->first('email') }}</strong>
                             </span>
                           @endif
                         </div>
                         <div class="form-group">
                            <label>Telefono: (*)</label> 
                            {{ Form::text('phone', $agent->phone, ['class' => 'form-control']) }}
                            @if ($errors->has('phone'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('phone') }}</strong>
                              </span>
                            @endif
                         </div>
                         <div class="form-group">
                            <label>Fecha de nacimiento: (*)</label> 
                            {{ Form::date('birthday_date', $agent->birthday_date, ['class' => 'form-control']) }}
                            @if ($errors->has('birthday_date'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('birthday_date') }}</strong>
                              </span>
                            @endif
                         </div>
                         <div class="form-group">
                            <label>Rating: </label> 
                            {{ Form::number('rating', $agent->rating, ['class' => 'form-control']) }}
                            @if ($errors->has('rating'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('rating') }}</strong>
                              </span>
                            @endif
                         </div>
                         <div class="form-group">
                            <label>Otro: </label> 
                            {{ Form::text('option', $agent->option, ['class' => 'form-control']) }}
                            @if ($errors->has('option'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('option') }}</strong>
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
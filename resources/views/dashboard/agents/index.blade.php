@extends('layouts.dashboard')
@section('title', 'Agentes Registrados: '.count($agents))
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Agentes Registrados</h2>
      <ol class="breadcrumb">
         <li>
            <a href="{{ route('home') }}">Inicio</a>
         </li>
         <li>
            <a href="{{ route('agent.pdf') }}">Reporte en PDF</a>
         </li>
      </ol>
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Registrados: {{ count($agents) }}</h5>
               <div class="ibox-tools">
                    <a href="{{ route('agents.create') }}" class="btn btn-primary btn-xs">Crear Agente</a>
                </div>
               <div class="ibox-tools">
                  <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content table-responsive">
              @include('alert.alerts')
               <table class="table responsive">
                  <thead>
                     <tr>
                        <th>#ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Fecha de nacimiento</th>
                        <th>Rating</th>
                        <th>Otro</th>
                        <th>Creado</th>
                        <th>Opciones</th>
                        <th colspan="1">&nbsp;</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($agents as $agent)
                    <tr>
                      <td>{{ $agent->id }}</td>
                      <td>{{ $agent->name }}</td>
                      <td>{{ $agent->last_name }}</td>
                      <td>{{ $agent->email }}</td>
                      <td>{{ $agent->phone }}</td>
                      <td>{{ $agent->birthday_date }}</td>
                      <td>{{ $agent->rating }}</td>
                      <td>{{ $agent->option }}</td>
                      <td>{{ $agent->created_at->diffForHumans() }}</td>
                      @can('agents.edit')
                      <td width="10px">
                          <a href="{{ route('agents.edit', $agent->id) }}" class="btn btn-sm btn-info">
                              Editar
                          </a>
                      </td>
                      @endcan
                      @can('agents.destroy')
                      <td width="10px">
                          {{ Form::open(['route' => ['agents.destroy', $agent->id], 'method' => 'DELETE']) }}
                              <button class="btn btn-sm btn-danger" onclick="return confirm('Desea eliminar este agente?')">
                                  Eliminar
                              </button>
                          {{ Form::close() }}
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                </tbody>
               </table>
                {{ $agents->render() }}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
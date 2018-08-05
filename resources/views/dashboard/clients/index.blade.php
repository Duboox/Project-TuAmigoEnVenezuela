@extends('layouts.dashboard')
@section('title', 'Clientes Registrados: '.count($clients))
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Clientes Registrados</h2>
      <ol class="breadcrumb">
         <li>
            <a href="{{ route('home') }}">Inicio</a>
         </li>
         <li>
            <a href="{{ route('client.pdf') }}">Reporte en PDF</a>
         </li>
      </ol>
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Registrados: {{ count($clients) }}</h5>
               <div class="ibox-tools">
                    <a href="{{ route('clients.create') }}" class="btn btn-primary btn-xs">Crear Cliente</a>
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
                        <th>Otro</th>
                        <th>Creado</th>
                        <th>Opciones</th>
                        <th colspan="1">&nbsp;</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($clients as $client)
                    <tr>
                      <td>{{ $client->id }}</td>
                      <td>{{ $client->name }}</td>
                      <td>{{ $client->last_name }}</td>
                      <td>{{ $client->email }}</td>
                      <td>{{ $client->phone }}</td>
                      <td>{{ $client->birthday_date }}</td>
                      <td>{{ $client->option }}</td>
                      <td>{{ $client->created_at->diffForHumans() }}</td>
                      @can('clients.edit')
                      <td width="10px">
                          <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-info">
                              Editar
                          </a>
                      </td>
                      @endcan
                      @can('clients.destroy')
                      <td width="10px">
                          {{ Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'DELETE']) }}
                              <button class="btn btn-sm btn-danger" onclick="return confirm('Desea eliminar este cliente?')">
                                  Eliminar
                              </button>
                          {{ Form::close() }}
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                </tbody>
               </table>
                {{ $clients->render() }}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
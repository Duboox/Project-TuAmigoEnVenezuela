@extends('layouts.dashboard')
@section('title', 'Servicios Registrados: '.count($services))
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Servicios Registrados</h2>
      <ol class="breadcrumb">
         <li>
            <a href="{{ route('home') }}">Inicio</a>
         </li>
         <li>
            <a href="{{ route('service.pdf') }}">Reporte en PDF</a>
         </li>
      </ol>
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Registrados: {{ count($services) }}</h5>
               <div class="ibox-tools">
                    <a href="{{ route('services.create') }}" class="btn btn-primary btn-xs">Crear Servicio</a>
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
                        <th>Descripción</th>
                        <th>Creado</th>
                        <th>Opciones</th>
                        <th colspan="1">&nbsp;</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($services as $service)
                    <tr>
                      <td>{{ $service->id }}</td>
                      <td>{{ $service->name }}</td>
                      <td>{{ $service->description }}</td>
                      <td>{{ $service->created_at->diffForHumans() }}</td>
                      @can('services.edit')
                      <td width="10px">
                          <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-info">
                              Editar
                          </a>
                      </td>
                      @endcan
                      @can('services.destroy')
                      <td width="10px">
                          {{ Form::open(['route' => ['services.destroy', $service->id], 'method' => 'DELETE']) }}
                              <button class="btn btn-sm btn-danger" onclick="return confirm('Desea eliminar este Servicio?')">
                                  Eliminar
                              </button>
                          {{ Form::close() }}
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                </tbody>
               </table>
                {{ $services->render() }}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
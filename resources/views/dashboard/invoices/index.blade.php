@extends('layouts.dashboard')
@section('title', 'Facturas Registrados: '.count($invoices))
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Facturas Registradas</h2>
      <ol class="breadcrumb">
         <li>
            <a href="{{ route('home') }}">Inicio</a>
         </li>
         <li>
            <a href="{{ route('invoice.pdf') }}">Reporte en PDF</a>
         </li>
      </ol>
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Registradas: {{ count($invoices) }}</h5>
               <div class="ibox-tools">
                    <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-xs">Crear Factura</a>
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
                        <th>Cliente</th>
                        <th>Agente</th>
                        <th>Tipo de boleto</th>
                        <th>Servicios</th>
                        <th>Fecha de salida</th>
                        <th>Fecha de llegada</th>
                        <th>Precio</th>
                        <th>Creado</th>
                        <th>Opciones</th>
                        <th colspan="1">&nbsp;</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($invoices as $invoice)
                    <tr>
                      <td>{{ $invoice->id }}</td>
                      <td>{{ $invoice->client->name }}</td>
                      <td>{{ $invoice->agent->name }}</td>
                      <td>{{ $invoice->ticket_type->name }}</td>
                      <td>
                      @foreach($invoice->invoice_service as $service)
                        <span>{{ $service->service->name }}</span>
                        @if (!$loop->last)
                            <span>, </span>
                        @endif
                      @endforeach
                      </td>
                      <td>{{ $invoice->exit_date }}</td>
                      <td>{{ $invoice->arrival_date }}</td>
                      <td>{{ $invoice->price }}</td>
                      <td>{{ $invoice->created_at->diffForHumans() }}</td>
                      @can('invoices.edit')
                      <td width="10px">
                          <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-info">
                              Editar
                          </a>
                      </td>
                      @endcan
                      @can('invoices.destroy')
                      <td width="10px">
                          {{ Form::open(['route' => ['invoices.destroy', $invoice->id], 'method' => 'DELETE']) }}
                              <button class="btn btn-sm btn-danger" onclick="return confirm('Desea eliminar esta factura?')">
                                  Eliminar
                              </button>
                          {{ Form::close() }}
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                </tbody>
               </table>
                {{ $invoices->render() }}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
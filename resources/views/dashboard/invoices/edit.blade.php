@extends('layouts.dashboard')
@section('title', 'Factura Para: '.$invoice->client->name)
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Factura Para {{ $invoice->client->name }}</h2>
      <ol class="breadcrumb">
         <li>
            <a href="{{ route('home') }}">Inicio</a>
         </li>
         <li>
            <a href="{{ route('invoices.index') }}">Facturas</a>
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
               {{ Form::model($invoice, ['route' => ['invoices.update', $invoice->id], 'method' => 'PUT']) }}
               <div class="ibox-content">
                  <div class="row">
                     <div class="col-sm-12 b-r">
                     <div class="form-group">
                          <label>Cliente: (*)</label> 
                          {!! Form::select('id_client', json_decode($clients->pluck('name', 'id'), true), $invoice->client->id, ['class' => 'form-control', 'id' => 'name']) !!}
                          @if ($errors->has('id_client'))
                            <span class="error-validate">
                               <strong>{{ $errors->first('id_client') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>Agente: (*)</label> 
                          {!! Form::select('id_agent', json_decode($agents->pluck('name', 'id'), true), $invoice->agent->id, ['class' => 'form-control', 'id' => 'name']) !!}
                          @if ($errors->has('id_agent'))
                            <span class="error-validate">
                               <strong>{{ $errors->first('id_agent') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="form-group">
                          <label style="display:block;">Servicios: (*)</label> 
                          {!! Form::select('services[]', json_decode($services->pluck('name', 'id'), true), $invoice->invoice_service->pluck('id_service'), ['multiple'=>'multiple', 'class' => 'form-control', 'id' => 'multi-select-custom']) !!}
                          @if ($errors->has('services'))
                            <span class="error-validate">
                               <strong>{{ $errors->first('services') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="form-group">
                            <label>Fecha de salida: (*)</label> 
                            {{ Form::date('exit_date', $invoice->exit_date, ['class' => 'form-control']) }}
                            @if ($errors->has('exit_date'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('exit_date') }}</strong>
                              </span>
                            @endif
                         </div>
                         <div class="form-group">
                            <label>Fecha de llegada: (*)</label> 
                            {{ Form::date('arrival_date', $invoice->arrival_date, ['class' => 'form-control']) }}
                            @if ($errors->has('arrival_date'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('arrival_date') }}</strong>
                              </span>
                            @endif
                         </div>
                         <div class="form-group">
                            <label>Precio: </label> 
                            {{ Form::number('price', $invoice->price, ['class' => 'form-control']) }}
                            @if ($errors->has('price'))
                              <span class="error-validate">
                                 <strong>{{ $errors->first('price') }}</strong>
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
@section('script')
<script>

</script>
@endsection
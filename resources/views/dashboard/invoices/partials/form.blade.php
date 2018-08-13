<div class="form-group">
  {{ Form::label('id_client', 'Cliente') }}
  {{ Form::select('id_client', json_decode($clients->pluck('name', 'id'), true), null, ['class' => 'form-control', 'id' => 'client']) }}
  @if ($errors->has('id_client'))
      <span class="error-validate">
          <strong>{{ $errors->first('id_client') }}</strong>
      </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('id_agent', 'Agente') }}
    {{ Form::select('id_agent', json_decode($agents->pluck('name', 'id'), true), null, ['class' => 'form-control', 'id' => 'agent']) }}
    @if ($errors->has('id_agent'))
        <span class="error-validate">
            <strong>{{ $errors->first('id_agent') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('luggage', 'Equipaje') }}
    {{ Form::number('luggage', null, ['class' => 'form-control', 'id' => 'luggage']) }}
    @if ($errors->has('luggage'))
        <span class="error-validate">
            <strong>{{ $errors->first('luggage') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('hand_luggage', 'Equipaje de mano') }}
    {{ Form::number('hand_luggage', null, ['class' => 'form-control', 'id' => 'hand_luggage']) }}
    @if ($errors->has('hand_luggage'))
        <span class="error-validate">
            <strong>{{ $errors->first('hand_luggage') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('origin', 'Origen') }}
    {{ Form::text('origin', null, ['class' => 'form-control', 'id' => 'origin']) }}
    @if ($errors->has('origin'))
        <span class="error-validate">
            <strong>{{ $errors->first('origin') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('destination', 'Destino') }}
    {{ Form::text('destination', null, ['class' => 'form-control', 'id' => 'destination']) }}
    @if ($errors->has('destination'))
        <span class="error-validate">
            <strong>{{ $errors->first('destination') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('adults', 'Adultos') }}
    {{ Form::number('adults', null, ['class' => 'form-control', 'id' => 'adults']) }}
    @if ($errors->has('adults'))
        <span class="error-validate">
            <strong>{{ $errors->first('adults') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('kids', 'Niños') }}
    {{ Form::number('kids', null, ['class' => 'form-control', 'id' => 'kids']) }}
    @if ($errors->has('kids'))
        <span class="error-validate">
            <strong>{{ $errors->first('kids') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('bebys', 'Bebes') }}
    {{ Form::number('bebys', null, ['class' => 'form-control', 'id' => 'bebys']) }}
    @if ($errors->has('bebys'))
        <span class="error-validate">
            <strong>{{ $errors->first('bebys') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('services', 'Servicios', ['style' => 'display:block;']) }}
    {{ Form::select('services[]', json_decode($services->pluck('name', 'id'), true), null, ['multiple'=>'multiple', 'class' => 'form-control', 'id' => 'multi-select-custom']) }}
    @if ($errors->has('email'))
        <span class="error-validate">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('exit_date', 'Fecha de Salida') }}
    {{ Form::date('exit_date', null, ['class' => 'form-control', 'id' => 'exit_date', 'placeholder' => 'Ej: 17/2/18']) }}
    @if ($errors->has('exit_date'))
        <span class="error-validate">
            <strong>{{ $errors->first('exit_date') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('exit_time', 'Hora de salida') }}
    {{ Form::text('exit_time', null, ['class' => 'form-control', 'id' => 'exit_time']) }}
    @if ($errors->has('exit_time'))
        <span class="error-validate">
            <strong>{{ $errors->first('exit_time') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('arrival_date', 'Fecha de llegada') }}
    {{ Form::date('arrival_date', null, ['class' => 'form-control', 'id' => 'arrival_date', 'placeholder' => 'Ej: 17/4/18']) }}
    @if ($errors->has('arrival_date'))
        <span class="error-validate">
            <strong>{{ $errors->first('arrival_date') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('exit_rate', 'Tasa de salida') }}
    {{ Form::text('exit_rate', null, ['class' => 'form-control', 'id' => 'exit_rate', 'placeholder' => 'Ej: 2']) }}
    @if ($errors->has('exit_rate'))
        <span class="error-validate">
            <strong>{{ $errors->first('exit_rate') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('price', 'Precio') }}
    {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Ej: 2']) }}
    @if ($errors->has('price'))
        <span class="error-validate">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
  {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
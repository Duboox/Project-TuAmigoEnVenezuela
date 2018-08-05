<div class="form-group">
  {{ Form::label('name', 'Nombre') }}
  {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Ej: Maria']) }}
  @if ($errors->has('name'))
      <span class="error-validate">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('last_name', 'Apellido') }}
    {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Ej: Suarez']) }}
    @if ($errors->has('last_name'))
        <span class="error-validate">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
      @endif
</div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Ej: skynessj@gmail.com']) }}
    @if ($errors->has('email'))
        <span class="error-validate">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('phone', 'Telefono') }}
    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Ej: +58 424 233 6927']) }}
    @if ($errors->has('phone'))
        <span class="error-validate">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('birthday_date', 'Fecha de nacimiento') }}
    {{ Form::date('birthday_date', null, ['class' => 'form-control', 'id' => 'date_delivery', 'placeholder' => 'Ej: Maria']) }}
    @if ($errors->has('birthday_date'))
        <span class="error-validate">
            <strong>{{ $errors->first('birthday_date') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('rating', 'Rating') }}
    {{ Form::text('rating', null, ['class' => 'form-control', 'id' => 'rating', 'placeholder' => 'Ej: 2']) }}
    @if ($errors->has('rating'))
        <span class="error-validate">
            <strong>{{ $errors->first('rating') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('option', 'Otro') }}
    {{ Form::text('option', null, ['class' => 'form-control', 'id' => 'option', 'placeholder' => 'Ej: +58 424 233 6927']) }}
    @if ($errors->has('option'))
        <span class="error-validate">
            <strong>{{ $errors->first('option') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
  {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
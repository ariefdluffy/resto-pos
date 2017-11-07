<div class="form-group{{ $errors->has('diskon_persen') ? ' has-error' : '' }}">
{!! Form::label('diskon_persen', 'Diskon Persen', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::number('diskon_persen', null, ['class'=>'form-control']) !!}
        {!! $errors->first('diskon_persen', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('diskon_rupiah') ? ' has-error' : '' }}">
{!! Form::label('diskon_rupiah', 'Diskon Rupiah', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::number('diskon_rupiah', null, ['class'=>'form-control']) !!}
        {!! $errors->first('diskon_rupiah', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{!! Form::model($model,
  ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message] ) !!}
  <a href="{{ $edit_url }}">Ubah</a> | <a href="{{ $show_url }}" class="btn btn-success btn-sm">Detail</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}
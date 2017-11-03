<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

		<title>Register | Lapeling-DLHKubar</title>

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

	</head>
	<body>
		<div class="account-pages"></div>
		<div class="clearfix"></div>
		
        <div class="container-alt">
			<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="wrapper-page signup-signin-page">
					<div class="card-box">
						<div class="panel-heading">
							<h3 class="text-center"> Welcome to <strong class="text-custom">Lapeling-DLH Kubar</strong></h3>
						</div>
		
						<div class="panel-body">
							<div class="row">
								{{--  <div class="panel panel-default">  --}}
                                    <div class="panel-body">
                                     
                                    {!! Form::open(['url'=>'/register', 'class'=>'form-horizontal']) !!}
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {!! Form::label('name', 'Nama Perusahaan', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('jenis_perusahaan') ? ' has-error' : '' }}">
                                    {!! Form::label('jenis_perusahaan', 'Jenis Perusahaan', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-4">
                                        {{ Form::select('jenis_perusahaan', [
                                        'Perkayuan' => 'Perkayuan',
                                        'Perkebunan' => 'Perkebunan',
                                        'Pertambangan' => 'Pertambangan'], null,['class' => 'form-control']
                                        ) }}
                                        {!! $errors->first('jenis_perusahaan', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('alamat_perusahaan') ? ' has-error' : '' }}">
                                    {!! Form::label('alamat_perusahaan', 'Alamat Perusahaan', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::textarea('alamat_perusahaan', null, ['class'=>'form-control','rows'=>'3']) !!}
                                        {!! $errors->first('alamat_perusahaan', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {!! Form::label('no_tlp', 'No Tlp Perusahaan', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('no_tlp', null, ['class'=>'form-control']) !!}
                                        {!! $errors->first('no_tlp', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::password('password', ['class'=>'form-control']) !!}
                                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    {!! Form::label('password_confirmation', 'Konfirmasi Password', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-pink btn-block text-uppercase waves-effect waves-light">
                                        <i class="fa fa-btn fa-user"></i> Daftar
                                        </button>
                                    </div>
                                    </div>

                                    {!! Form::close() !!}
                                    </div>
                                {{--  </div>  --}}
							</div>
						</div>
					</div>
		
				</div>
			</div>
		</div>
		</div>
	
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>
                    Already have account?<a href="{{ url('/login') }}" class="text-primary m-l-5"><b>Sign In</b></a>
                </p>
            </div>
        </div>

		</div>

		<script>
			var resizefunc = [];
		</script>

		<!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

	</body>
</html>
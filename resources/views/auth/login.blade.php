@extends('app')

@section('body')
	<script src="/assets/js/controllers/login.js"></script>
	<body class="login">
	<div class="container">
		<!--- LOGO --->
		<div class="logo">
			<h1 style="color: blue;">TravelBlog</h1>
		</div>
		<!-- // END LOGO -->

		<!-- BEGIN CONTENT -->
		<div class="content">
			<!-- BEGIN LOGIN FORM -->
			<form name="form" class="login-form" method="post" novalidate ng-controller="loginFormController" ng-init="credentials.csrf_token = '{{ csrf_token() }}';">
				<div class="se-pre-con" ng-show="showLoading"></div>
				<!-- form title -->
				<h3 class="form-title">Login to Dashboard</h3>

				<!-- alert -->
				<div class="alert alert-danger" ng-show="authError">
                    <span>
			            @{{ authError }}
                    </span>
				</div>

				<!-- alert -->
				@if( isset($flash) )
				<div class="alert alert-danger">
                    <span>
			            {{ $flash }}
                    </span>
				</div>
				@endif

				<!-- form element -->
				<div class="form-group">
					<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
					<label class="control-label visible-ie8 visible-ie9">Email</label>

					<div class="input-icon">
						<i class="fa fa-user"></i>
						<input class="form-control placeholder-no-fix" type="text" autocomplete="off"
							   placeholder="Email" name="email" ng-model="credentials.email" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label visible-ie8 visible-ie9">Password</label>

					<div class="input-icon">
						<i class="fa fa-lock"></i>
						<input class="form-control placeholder-no-fix" type="password" autocomplete="off"
							   placeholder="Password" name="password" ng-model="credentials.password" email required>
					</div>
				</div>
				<div class="form-actions">
					<label class="checkbox">
						<input type="checkbox" id="remember" name="remember" value="1" ng-model="credentials.remember"/> Remember me </label>
					<button type="submit" class="btn green-haze pull-right" ng-click="login()" ng-disabled='form.$invalid'>
						Login <i class="m-icon-swapright m-icon-white"></i>
					</button>
				</div>
				<div class="forget-password">
					<h4>Forgot your password ?</h4>

					<p>
						no worries, click <a href="{{ url('auth/forgotpwd') }}" id="forget-password">
							here </a>
						to reset your password.
					</p>
				</div>
			</form>

			<!-- END LOGIN FORM -->
		</div>
		<!-- // END CONTENT -->
	</div>
	</body>
@endsection
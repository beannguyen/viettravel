@extends('app')

@section('body')
    <script src="/assets/js/controllers/resetPwd.js"></script>
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
            <form name="forgotpwdForm" class="login-form" method="post" novalidate ng-controller="resetPwdFormController"
                  ng-init="credentials.csrf_token = '{{ csrf_token() }}';">

                <div class="se-pre-con" ng-show="showLoading"></div>
                <!-- form title -->
                <h3 class="form-title">Login to Dashboard</h3>

                <!-- alert -->
                <div class="alert alert-danger" ng-show="authError">
                    <span>
			            @{{ authError }}
                    </span>
                </div>

                <div class="alert alert-success" ng-show="authSuccess">
                    <span>
			            @{{ authSuccess }}
                    </span>
                </div>

                <!-- form element -->
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>

                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="email" autocomplete="off"
                               placeholder="Email" name="email" value="{{ old('email') }}" ng-model="email" required>
                    </div>
                </div>

                <div class="form-actions">
                    <div class="pull-left">
                        <h5><a href="{{ url('auth/login') }}"><i class="fa fa-angle-left"></i> Back to login</a></h5>
                    </div>

                    <div class="col-md-offset-4">
                        <button type="submit" class="btn btn-primary" ng-disabled='forgotpwdForm.$invalid' ng-click="postRemind()">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>

            <!-- END LOGIN FORM -->
        </div>
        <!-- // END CONTENT -->
    </div>
    </body>
@endsection
'use strict'

app.controller('resetPwdFormController', function ($scope, $http, $sanitize, $window) {

    $scope.email = null;
    $scope.authError = "";
	$scope.authSuccess = "";
	$scope.showLoading = false;
	$scope.credentials = {};

    $scope.postRemind = function() {

		$scope.showLoading = true;
    	var remind = $http.post('/auth/forgotpwd', {
    		email: $sanitize($scope.email)
    	});
	    remind.success(function(response) {

			$scope.showLoading = false;
	    	if ( response.status === 'invalid_user' ) {
				$scope.authSuccess = "";
				$scope.authError = "Email not exist on our system";
			} else if ( response.status === 'invalid_token' ) {
				$scope.authSuccess = "";
				$scope.authError = "Session incorrect! Please refresh and try again";
			} else {
				$scope.authError = "";
				$scope.authSuccess = "An email has been sent to you email. Please confirm to reset password";
			}
	    });

		remind.error(function (response) {

			$scope.showLoading = false;
			$scope.authError = "Server Error";
		});
    }
	
	$scope.postReset = function () {

		console.log($scope.credentials);
		$scope.showLoading = true;

		var reset = $http.post('/password/reset', {
			'email' : $sanitize($scope.credentials.email),
			'password' : $sanitize($scope.credentials.password),
			'password_confirmation' : $sanitize($scope.credentials.password_confirmation),
			'token' : $scope.credentials.token,
			'csrf' : $scope.credentials.csrf
		});

		reset.success(function (response) {

			console.log(response);
			$scope.showLoading = false;
			if ( response.status === 'invalid_password') {
				$scope.authSuccess = "";
				$scope.authError = "Password incorrect, please try again!";
			} else if ( response.status === 'invalid_token') {
				$scope.authSuccess = "";
				$scope.authError = "Password token is invalid! Check your mail again";
			} else if ( response.status === 'invalid_email') {
				$scope.authSuccess = "";
				$scope.authError = "Email incorrect!";
			} else if ( response.status === 'success' ){
				$window.location.href = '/auth/login';
			}
		});

		reset.error(function (response) {

			$scope.showLoading = false;
			$scope.authError = "Server Error";
		});
	};
});
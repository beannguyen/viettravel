'use strict';

app.factory('SessionService', function () {
    return {
        get: function(key) {
            return sessionStorage.getItem(key);
        },
        set: function(key, value) {
            return sessionStorage.setItem(key, value);
        },
        unset: function(key) {
            return sessionStorage.removeItem(key);
        }
    }
});

app.factory('AuthenticationService', function($rootScope, $http, $sanitize, SessionService) {

    var sanitizeCredentials = function (credentials) {
        return {
            email: $sanitize(credentials.email),
            password: $sanitize(credentials.password),
            remember: credentials.remember,
            csrf_token: credentials.csrf_token
        }
    };
    return {

        login: function(credentials) {

            var login = $http.post("/auth/login", sanitizeCredentials(credentials));
            login.success(function (response) {

                $rootScope.authError = null;
            });
            login.error(function (response) {

                $rootScope.authError = response.flash;
            });
            return login;
        },
        isLogin: function() {
            return SessionService.get('authenticated');
        }
    }
});

app.controller('loginFormController', function ($scope, $location, $window, AuthenticationService) {
    $scope.credentials = {};
    //$scope.authError = null;
    $scope.showLoading = false;

    $scope.login = function () {

        $scope.showLoading = true;
        AuthenticationService.login($scope.credentials).success(function () {

            $window.location.href = "/dashboard";
        })
            .error(function () {
                $scope.showLoading = false;
            })
    };
});

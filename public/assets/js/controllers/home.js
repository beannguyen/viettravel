'use strict'

app.controller('homeController', function ($scope, $http, DTOptionsBuilder) {

    /**
     *  set active class to current tab in hor-menu
     */
    var tab = angular.element('input#current-tab').val();
    var sub = angular.element('input#sub-tab').val();
    if ( tab === 'undefined' )
        tab = 'dashboard-nav';

    if ( sub !== 'undefined' )
        angular.element('li.' + sub).addClass('active');
    angular.element('li.' + tab).addClass('active');

});

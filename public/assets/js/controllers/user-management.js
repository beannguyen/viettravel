'use strict'

app.controller('allUserController', function (DTOptionsBuilder) {

    // init table
    var vm = this;
    vm.dtOptions = DTOptionsBuilder.newOptions()
        .withLanguage({
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "Show _MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        })
        .withDisplayLength(10)
        .withBootstrap()
        .withBootstrapOptions({
            pagination: {
                classes: {
                    ul: 'pagination'
                }
            }
        })

    var table = angular.element('#all_user_table');
    var tableWrapper = angular.element('#all_user_table_wrapper');
    var groupCheckbox = table.find('.group-checkable');

    groupCheckbox.change(function () {
        var set = groupCheckbox.attr("data-set");
        var checked = groupCheckbox.is(":checked");

        angular.forEach(angular.element(set), function (val, key) {
            if ( checked ) {

                val.checked = true;
            } else {

                val.checked = false;
            }
        });
    });


});
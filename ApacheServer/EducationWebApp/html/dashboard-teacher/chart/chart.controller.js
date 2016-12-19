(function () {
    'use strict';
    angular.module('education')
        .controller('chartController', chartController);

    function chartController($scope, restService, $state, $rootScope, $timeout) {
        var vm = this;
        vm.chart = {};
        vm.chart.config = {};

      

        function fetch() {
            var criteria = {};

            return restService.getAll(criteria, function (result) {
                vm.data = JSON.parse(result);
                console.log(vm.data);
            })
        }
    }
})();
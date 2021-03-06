(function () {
    'use strict';
    angular.module('education')
        .controller('mathController', mathController);

    function mathController($scope, restService, $state, $rootScope, $timeout) {
        var vm = this;
        vm.data = [];
        fetch();

         function fetch() {
             var criteria = {};
            return restService.getMath(criteria, function (result)  {
                vm.data = JSON.parse(result);
                console.log(vm.data);
                $scope.$apply();
            })
        }

        vm.delete = function(question) {
            var criteria = {
                questionName: question
            };
            console.log(criteria);
            return restService.deleteMath(criteria, function (result) {
                console.log(result);
                fetch();
            })
        };

        vm.add = function () {
            var criteria = {
                question: vm.question,
                answer1: vm.answer1,
                answer2: vm.answer2,
                answer3: vm.answer3,
                answer4: vm.answer4,
                correct: vm.correct
            };

            console.log(criteria);

            return restService.insertMath(criteria, function (result) {
                console.log(result);
                fetch();
            })
        }
    }
})();
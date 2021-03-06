(function () {
    'use strict';
    angular.module('education')
        .controller('loginController', loginController);
    
    function loginController($scope, restService, $state, $rootScope) {
        var vm = this;
        
        vm.teacherLogin  = function (username, password) {
            var criteria = {
                username: username,
                password: password
            };

            $state.go('dashboardTeacher.science');

            return/* restService.log(criteria, function (result) {
                console.log(result);
                if(result != "False" && !_.isEmpty(result)) {
                    console.log(result);
                    $rootScope.account = JSON.parse(result);
                    console.log($rootScope.account);
                    $state.go('dashboardTeacher.teacher');
                } else {
                    console.log("failed");
                }
            })*/;
        };



        vm.studentLogin = function (username, password) {
            var criteria = {
                username: username,
                password: password
            };
            $state.go('dashboardStudent.student');
            return/* restService.login(criteria, function (result) {
                if(result != "False" && !_.isEmpty(result)) {
                    console.log(result);
                    $rootScope.account = JSON.parse(result);
                    console.log($rootScope.account);
                    $state.go('dashboardStudent.student')
                } else {
                    console.log("failed");
                }
            })*/;
        }
    }
})();
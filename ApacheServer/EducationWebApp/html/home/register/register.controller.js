(function () {
    'use strict';
    angular.module('education')
        .controller('registerController', registerController);

    function registerController($scope, restService, $state) {
        var vm = this;
        
        
        vm.register = function (username, email, password) {
            var criteria = {
                username : username,
                email: email,
                password: password
            };
            if(_.isEmpty(vm.data)) {
                console.log('You must choose either student or teacher!')
            } else if(vm.data == "student") {
                registerStudent(criteria)
            } else if(vm.data == "teacher") {
                console.log('go');
                registerTeacher(criteria);
            }

            console.log(vm.data);
        };

        function registerStudent(criteria) {
            $state.go('home.login');
            return restService.registerStudent(criteria, function (data) {
                $state.go('home.login');
            })
        }


        function registerTeacher(criteria) {
            $state.go('home.login');
            return restService.registerTeacher(criteria, function (data) {
                console.log(data);
                $state.go('home.login');
            })
        }
        
        
    }
})();
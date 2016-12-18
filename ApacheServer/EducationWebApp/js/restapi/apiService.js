(function () {
    'use strict';
    angular.module('education')
        .factory('restService', restService);

    function restService(Restangular, $http) {


        function registerStudent(criteria, callback) {
            return $.post("../php/Home/RegisterStudent.php",
                criteria,
                callback);
        }

        function registerTeacher(criteria, callback) {
            return $.post("../php/Home/RegisterTeacher.php",
                criteria,
                callback);
        }

        function login(criteria, callback) {
            $.post("../php/Home/CheckNamePassword.php",
                criteria,
                callback);
        }

        return {
            login: login,
            registerStudent: registerStudent,
            registerTeacher: registerTeacher
        };
    }
})();
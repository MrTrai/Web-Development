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

        function log(criteria, callback) {
            $.post("../php/Home/TeacherCheckNamePassword.php",
                criteria,
                callback);
        }

        function getScience(criteria, callback) {
            $.post("../php/Teacher/GetScienceQuestion.php",
                criteria,
                callback);
        }

        function getMath(criteria, callback) {
            $.post("../php/Teacher/GetMathQuestion.php",
                criteria,
                callback);
        }

        function getHistory(criteria, callback) {
            $.post("../php/Teacher/GetHistoryQuestion.php",
                criteria,
                callback);
        }

        function getEnglish(criteria, callback) {
            $.post("../php/Teacher/GetEnglishQuestion.php",
                criteria,
                callback);
        }

        function insertEnglish(criteria, callback) {
            $.post("../php/Teacher/InsertEnglishQuestion.php",
                criteria,
                callback);
        }
        function deleteEnglish(criteria, callback) {
            $.post("../php/Teacher/DeleteEnglishQuestion.php",
                criteria,
                callback);
        }

        function insertHistory(criteria, callback) {
            $.post("../php/Teacher/InsertHistoryQuestion.php",
                criteria,
                callback);
        }

        function deleteHistory(criteria, callback) {
            $.post("../php/Teacher/DeleteHistoryQuestion.php",
                criteria,
                callback);
        }



        function deleteScience(criteria, callback) {
            $.post("../php/Teacher/DeleteScienceQuestion.php",
                criteria,
                callback);
        }

        function insertScience(criteria, callback) {
            $.post("../php/Teacher/InsertScienceQuestion.php",
                criteria,
                callback);
        }

        function deleteMath(criteria, callback) {
            $.post("../php/Teacher/DeleteMathQuestion.php",
                criteria,
                callback);
        }

        function insertMath(criteria, callback) {
            $.post("../php/Teacher/InsertMathQuestion.php",
                criteria,
                callback);
        }

        function getAll(criteria, callback) {
            $.post("../php/Teacher/GetAllStudent.php",
                criteria,
                callback);
        }


        return {
            login: login,
            registerStudent: registerStudent,
            registerTeacher: registerTeacher,
            log: log,
            getScience: getScience,
            getMath: getMath,
            getHistory: getHistory,
            getEnglish: getEnglish,
            insertHistory: insertHistory,
            deleteHistory:deleteHistory,
            insertEnglish: insertEnglish,
            deleteEnglish: deleteEnglish,
            insertMath: insertMath,
            deleteMath: deleteMath,
            insertScience: insertScience,
            deleteScience: deleteScience,
            getAll: getAll
        };
    }
})();
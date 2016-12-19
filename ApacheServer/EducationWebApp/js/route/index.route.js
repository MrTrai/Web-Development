(function () {
    angular.module('education', ['ui.router', 'restangular', 'toastr']).config(routerConfig);

    function routerConfig($stateProvider, $urlRouterProvider) {

        var authentication = function ($rootScope, $state) {
            if(_.isEmpty($rootScope.account)) {
                $state.go('/');
            }
        };
        $stateProvider
            .state('home', {
                abstract: true,
                url: '/home',
                templateUrl: "home/home.html",
                controller: 'homeController',
                controllerAs: 'vm'
            })
            .state('home.login', {
                url: '/login',
                templateUrl: "home/login/login.html",
                controller: 'loginController',
                controllerAs: 'vm'
            })

            .state('home.register', {
                url: '/register',
                templateUrl: "home/register/register.html",
                controller: 'registerController',
                controllerAs: 'vm'
            })
            .state('dashboardTeacher', {
                abstract: true,
                url: '/dashboardT',
                templateUrl: "dashboard-teacher/dashboard.html",
                controller: 'dashboardTeacherController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.teacher', {
                url: '/teacher',
                templateUrl: "dashboard-teacher/teacher/teacher.html",
                controller: 'teacherController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.science', {
                url: '/science',
                templateUrl: "dashboard-teacher/science/science.html",
                controller: 'scienceController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.math', {
                url: '/math',
                templateUrl: "dashboard-teacher/math/math.html",
                controller: 'mathController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.english', {
                url: '/english',
                templateUrl: "dashboard-teacher/english/english.html",
                controller: 'englishController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.history', {
                url: '/history',
                templateUrl: "dashboard-teacher/history/history.html",
                controller: 'historyController',
                controllerAs: 'vm'
            })


            .state('dashboardStudent', {
                abstract: true,
                url: '/dashboardS',
                templateUrl: "dashboard-student/dashboard.html",
                controller: 'dashboardStudentController',
                controllerAs: 'vm'
            })

            .state('dashboardStudent.student', {
                url: '/student',
                templateUrl: "dashboard-student/student/student.html",
                controller: 'studentController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.sscience', {
                url: '/sample-science',
                templateUrl: "dashboard-teacher/sample/sample-science/science.html",
                controller: 'historyController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.shistory', {
                url: '/sample-history',
                templateUrl: "dashboard-teacher/sample/sample-history/history.html",
                controller: 'sampleHistoryController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.smath', {
                url: '/sample-math',
                templateUrl: "dashboard-teacher/sample/sample-math/math.html",
                controller: 'sampleMathController',
                controllerAs: 'vm'
            })

            .state('dashboardTeacher.senglish', {
                url: '/sample-english',
                templateUrl: "dashboard-teacher/sample/sample-english/english.html",
                controller: 'sampleenglishController',
                controllerAs: 'vm'
            })



            .state('dashboardStudent.sscience', {
                url: '/science',
                templateUrl: "dashboard-student/sample/sample-science/science.html",
                controller: 'studentsampleScienceController',
                controllerAs: 'vm'
            })

            .state('dashboardStudent.shistory', {
                url: '/history',
                templateUrl: "dashboard-student/sample/sample-history/history.html",
                controller: 'studentsampleHistoryController',
                controllerAs: 'vm'
            })

            .state('dashboardStudent.smath', {
                url: '/math',
                templateUrl: "dashboard-student/sample/sample-math/math.html",
                controller: 'studentsampleMathController',
                controllerAs: 'vm'
            })

            .state('dashboardStudent.senglish', {
                url: '/english',
                templateUrl: "dashboard-student/sample/sample-english/english.html",
                controller: 'studentsampleenglishController',
                controllerAs: 'vm'
            })



           /* .state('education.home.register', {
                url: '/register',
                templateUrl: '',
                controller: 'registerController',
                controllerAs: 'vm'
            })*/;

        $urlRouterProvider.otherwise('home/login');
    }
})();
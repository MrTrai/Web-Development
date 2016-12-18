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
           /* .state('education.home.register', {
                url: '/register',
                templateUrl: '',
                controller: 'registerController',
                controllerAs: 'vm'
            })*/;

        $urlRouterProvider.otherwise('home/login');
    }
})();
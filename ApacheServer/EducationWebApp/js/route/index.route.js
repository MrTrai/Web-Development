(function () {
    angular.module('education', ['ui.router']).config(routerConfig);

    function routerConfig($stateProvider, $urlRouterProvider) {
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
           /* .state('education.home.register', {
                url: '/register',
                templateUrl: '',
                controller: 'registerController',
                controllerAs: 'vm'
            })*/;

        $urlRouterProvider.otherwise('home/login');
    }
})();
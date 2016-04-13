angular.module('app.routes', [])

.config(function($stateProvider, $urlRouterProvider) {
  var apiEndpoint = '';
  var newsEndpoint = apiEndpoint + "/mock/news.json";
  var shopsEndpoint = apiEndpoint + "/mock/shops.json";

  $stateProvider
    .state('tabsController.news', {
      url: '/news',
      views: {
        'tab1': {
          templateUrl: 'templates/news.html',
          controller: 'newsCtrl'
        }
      },
      resolve: {
        news: ['$http', function($http) {
          return $http
            .get(newsEndpoint)
            .then(function(response){
              return response.data;
            })
        }]
      }
    })
    .state('tabsController.newsdetail', {
      url: '/news/:id',
      views: {
        'tab1': {
          templateUrl: 'templates/newsdetail.html',
          controller: 'newsDetailCtrl'
        }
      },
      resolve: {
        news: ['$http', function($http) {
          return $http
            .get(newsEndpoint)
            .then(function(response){
              return response.data;
            })
        }]
      }
    })
    .state('tabsController.shops', {
      url: '/shops',
      views: {
        'tab2': {
          templateUrl: 'templates/shops.html',
          controller: 'shopsCtrl'
        }
      },
      resolve: {
        shops: ['$http', function($http) {
          return $http
            .get(shopsEndpoint)
            .then(function(response){
              return response.data;
            })
        }]
      }
    })
    .state('tabsController', {
      url: '/drupal',
      templateUrl: 'templates/tabsController.html',
      abstract:true
    });

    $urlRouterProvider.otherwise('/drupal/news');
});

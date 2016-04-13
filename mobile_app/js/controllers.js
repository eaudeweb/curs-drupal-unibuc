angular.module('app.controllers', [])

.controller('newsCtrl', function($scope, news) {
  $scope.news = news;
})

.controller('newsDetailCtrl', function($scope, $stateParams, news) {
  $scope.item = _.find(news, { nid: $stateParams.id });
})

.controller('shopsCtrl', function($scope, shops) {
  $scope.shops = shops;
  var markers = [];
  var bounds = new google.maps.LatLngBounds();

  var mapOptions = {
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  $scope.map = new google.maps.Map(document.getElementById("map"), mapOptions);

  _.each($scope.shops, function (shop) {
    var marker = new google.maps.Marker({
      position: { lat: parseFloat(shop.location_lat), lng: parseFloat(shop.location_lon) },
      map: $scope.map,
      title: shop.title
    });

    var infowindow = new google.maps.InfoWindow({
      content: '<h1>' + shop.title + '</h1>' + shop.body
    });

    marker.addListener('click', function() {
      infowindow.open($scope.map, marker);
    });

    markers.push(marker);
    bounds.extend(marker.getPosition());
  });

  $scope.map.fitBounds(bounds);
})

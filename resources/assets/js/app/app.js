var MemeGallery = angular.module('meme-royal-gallery', []);


MemeGallery.directive('mrMeme', [function () {
  return {
    restrict: 'E',
    scope: {
      meme: '='
    },
    templateUrl: 'js/templates/meme.template.html',
    controller: ['$scope', function ($scope) {
      $scope.liked = false;

      $scope.likeMeme = function () {
        $scope.liked = $scope.liked ? false: true;
        //TODO:Update server...
      };
    }],
    link: function (scope, elem, attrs) {
      $(elem).find('img').first().prop('src', scope.meme.image.link);
      $(elem).data('image', scope.meme.image.link);
      $(elem).click(function () {
        var image = $(this).data().image;
        var memeModal = $('#meme-modal');
        // Add image to modal
        memeModal.find('.modal-meme-image').first().prop('src', image);
        // Add tags to modal
        var memeInfo = memeModal.find('.modal-meme-info').first();
        memeInfo.empty();
        for(var t=0;t<scope.meme.tags.length;t++){
          var tag = scope.meme.tags[t];
          memeInfo.append('<a href="' + tag.link + '" class="meme-tag"> #' + tag.name + '</a>');
        }
        // Attach events to modal and show modal
        memeModal.modal('attach events', '#meme-share-modal');
        memeModal.modal('show');
      });

      $(elem).find('.meme-like-action').first().click(function (event) {
        event.stopPropagation();
        console.log('Meme liked...');
      });

      $(elem).find('.meme-share-action').first().click(clickShareAction);
    }
  };
}]);

MemeGallery.service('MemeService', ['$http', function ($http) {
    this.getMemes = function () {
      return $http.get('js/memes.json')
                  .then(function (response) {
                    return response.data;
                  });
    };
}]);

MemeGallery.controller('GalleryController', ['$scope', 'MemeService', function ($scope, $meme) {
  $scope.memes = [];

  $meme.getMemes()
        .then(function (memes) {
          $scope.memes = memes;
        })

}]);

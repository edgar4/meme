@extends('layouts.base')

@section('content')

      <div class="ui one column stackable grid main-grid">
          <div class="column">
            <!-- Main Content -->
            <div class="main-content">
              <div class="ui stackable grid container gallery" ng-app="meme-royal-gallery" ng-controller="GalleryController">
                <div class="five wide column" ng-repeat="meme in memes">
                  <mr-meme meme="meme"></mr-meme>
                </div>
              </div>
            </div>
          </div>

          <div class="column">
            <!-- Main Footer -->
            <footer class="ui inverted very padded segment main-footer">
              <p>
                &copy; Memes Royal
              </p>
            </footer>
          </div>

      </div>


@endsection


@section('modals')

  @include('front_controller.partials.modals.meme-modal')

  @include('front_controller.partials.modals.meme-share-modal')

  @include('front_controller.partials.modals.meme-login-modal')

@endsection
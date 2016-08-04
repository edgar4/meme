@extends('layouts.base')

@section('content')

  <div class="ui one column stackable grid main-grid">
  
      <div class="column">
        <!-- Main Content -->
        <div class="main-content">
            <form class="ui equal width form container" action="{{ route('post_new_meme') }}" method="post">
              <div class="fields">
                <div class="field">
                  <label>Top Text</label>
                  <input type="text" placeholder="Top Text" name="top_text" />
                </div>
                <div class="field">
                  <label>Bottom Text</label>
                  <input type="text" placeholder="Bottom Text" name="bottom_text" />
                </div>
              </div>

              <div class="field">
                <label>Picture</label>
                <input type="file" name="image" />
              </div>

              <div class="field">
                <button type="submit" class="ui primary button">Create Meme</button>
              </div>
              {!! Form::token() !!}
            </form>
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
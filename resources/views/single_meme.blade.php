@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Your meme</div>

                    <ul class="list-inline">
                        <?php $i = 0;?>
                        @foreach($memes as $meme)

                                <div class="col-md-6">
                                    <a href="{{ url('/memes/'.$meme->id) }}"> <img src="/img/meme/{{$meme->meme}}" class="img-responsive"/></a>

                                </div>



                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

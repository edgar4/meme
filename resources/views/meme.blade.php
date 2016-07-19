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

                            @if($i ==0)

                                <div class="col-md-6">
                                    <li><img src="/img/meme/{{$meme->meme}}" class="img-responsive"/></li>
                                </div>


                            @else
                                <li class="well"><img src="/img/meme/{{$meme->meme}}" width="100" height="100"/></li>
                            @endif
                            <?php $i++;?>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {!! Form::open(array('url' => 'meme/make',
                                              'files' => true)) !!}
                        <fieldset class="form-group">
                            <label for="text_top">caption top of meme</label>
                            <input type="text" name="top_text" class="form-control" id="text_top" placeholder="">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="text_bottom">caption bottom of meme</label>
                            <input type="text" name="bottom_text" class="form-control" id="text_bottom" placeholder="">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="text_bottom">Tag Your Meme</label>
                            <input type="text" name="bottom_text" class="form-control" id="tag"
                                   placeholder="#superAwesomeMeme,#MandaziTings">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="text_bottom" class="text-center">Upload New Image </label>
                            <input type="file" name="image" id="file" class="form-control btn btn-danger btn-large"/>
                            <label for="text_bottom" class="text-center">OR</label>
                            <button type="button" class="btn btn-info form-control btn-lg" data-toggle="modal"
                                    data-target="#myModal">Choose from gallery
                            </button>
                            <input type="text" name="gallery" id="gallery" class="form-control col-md-6"/>
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="submit" class="btn btn-default" value="Generate meme"/>
                        </fieldset>

                        {!! Form::close() !!}

                                <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog  modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-inline">
                                            @foreach($images as $img)
                                                <li><img src="/img/{{$img->image}}" class="img-responsive" width="150" width="150" data-image-name="{{$img->image}}"/></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
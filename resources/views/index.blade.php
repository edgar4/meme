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
                            <input type="file" name="image"  class="form-control"  />
                        </fieldset>
                        <fieldset class="form-group">
                         <input type="submit" class="btn btn-default" value="Generate meme"/>
                        </fieldset>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
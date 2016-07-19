<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\MemeGenerator;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;

class MemeController extends Controller
{
    //
    public function index()
    {

        return view('index');

    }

    public function makeMeme()
    {
        $meme = new MemeGenerator();

        $rules = array(
            'image' => 'required',
            'top_text' => 'required',
            'bottom_text' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/')->withInput()->withErrors($validator);
        } else {
            if (Input::file('image')->isValid()) {
                $destinationPath = 'img'; // upload path
                $fileName = Input::file('image')->getClientOriginalName(); // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', 'Upload successfully');
                Input::get('top_text');
                $meme->clear();
                $meme->set_top_text(Input::get('top_text'));
                $meme->set_bottom_text(Input::get('bottom_text'));
                $meme->set_output_dir('./img/meme/'); // default to ./ if not set
                $meme->set_image($destinationPath . '/' . $fileName);
                //$meme->set_watermark('./tmp/php.gif');
                $meme->set_watemark_opacity(80);
                $generatedMeme = $meme->generate();
                $this->show($generatedMeme);
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/');
            }
        }


    }

    public function show($meme)
    {

        return view('meme')->with('meme',$meme);


    }
    public function info(){

        echo phpinfo();
    }
}

<?php

namespace App\Http\Controllers;

use App\Meme;
use App\MemeImages;
use App\MemeRawImages;
use App\RawImages;
use Illuminate\Http\Request;
use App\Providers\MemeGenerator;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;

class MemeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function index()
    {
        $images = RawImages::all();
        return view('index')->with(
            'images', $images
        );

    }

    public function makeMeme()
    {

        $rules = array(
            'top_text' => 'required',
            'bottom_text' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/')->withInput()->withErrors($validator);
        } else {

            if (!empty(Input::get('gallery'))) {

                $meme = 'img/' . Input::get('gallery');
                $fileName = Input::get('gallery');
                $generatedMeme = $this->CreateAndSaveMeme($meme);
                $this->persitMeme($generatedMeme, $fileName, false);
                return redirect()->to('meme/show');
            } else {
                if (Input::file('image')->isValid()) {
                    $destinationPath = 'img'; // upload path
                    $fileName = Input::file('image')->getClientOriginalName(); // renameing image
                    Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                    // sending back with message
                    Session::flash('success', 'Upload successfully');
                    $imageLocation = $destinationPath . '/' . $fileName;
                    $generatedMeme = $this->CreateAndSaveMeme($imageLocation);
                    $this->persitMeme($generatedMeme, $fileName, true);
                    return redirect()->to('meme/show');
                } else {
                    // sending back with error message.
                    Session::flash('error', 'image file is not valid');
                    return Redirect::to('/');


                }

            }


        }


    }

    public function show()
    {
        $user = Auth::user()->id;
        $meme = Meme::where('user_id', '=', $user)
            ->orderBy('id', 'desc')
            ->get();
        return view('meme')->with('memes', $meme);


    }

    public function singleMeme($id)
    {
        $meme = Meme::where('id', '=', $id)
            ->orderBy('id', 'desc')
            ->get();
        return view('single_meme')->with('memes', $meme);


    }

    public function info()
    {

        echo phpinfo();
    }

    public function CreateAndSaveMeme($imageLocation, $text = array())
    {
        $meme = new MemeGenerator();
        $meme->clear();
        $meme->set_top_text(Input::get('top_text'));
        $meme->set_bottom_text(Input::get('bottom_text'));
        $meme->set_output_dir('./img/meme/'); // default to ./ if not set
        $meme->set_image($imageLocation);
        //$meme->set_watermark('./tmp/php.gif');
        $meme->set_watemark_opacity(80);
        $generatedMeme = $meme->generate();
        return $generatedMeme;
    }


    public function persitMeme($generatedMeme, $fileName, $isNewMeme = true)
    {
        Meme::create([
                'user_id' => Auth::user()->id,
                'meme' => $generatedMeme,
            ]
        );
        if ($isNewMeme) {
            RawImages::create([
                    'image' => $fileName,
                    'tag' => Input::get('tag'),
                ]
            );
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\MemeGenerator;

use App\Http\Requests;

class Meme extends Controller
{
    //
    public function index(){

    }

    public function makeMeme(){
        $meme = new MemeGenerator();
# ./tmp/ directory must have web server write access ( chmod 777 ./tmp )
$output_image_path1 = null;
$output_image_path2 = null;
$output_image_path3 = null;
if ( isset( $_POST['generate'] ) ) {
    // OR YOU CAN LOAD WHOLE CONFIG FROM ONE ARRAY
    // possible keys: 
    // * meme_font / meme_output_dir / meme_font_to_image_ratio / meme_margins_to_image_ratio / meme_image_path / meme_top_text / 
    // * meme_bottom_text / meme_font
    // * meme_watermark_file / meme_watermark_margins / meme_watermark_opacity
    // $config['meme_image_path'] = './tmp/philosoraptor.jpg';
    // $config['meme_top_text'] = 'What if I\'m just a meme generating other memes?';
    // $config['meme_bottom_text'] = 'We need to go deeper.. (UTF test: £ zażółćg ęślą jaźń ‹›';
    // $config['meme_font'] = './fonts/DejaVuSansMono-Bold.ttf'; 
    // $config['meme_output_dir'] = './tmp/';
    //$meme->load_config( $config );

    if( ! file_exists($_FILES['myfile']['tmp_name']) || !is_uploaded_file($_FILES['myfile']['tmp_name'] ) ) {
        // Some existing testing file
        $example_image_path = './tmp/philosoraptor.jpg';
    } else {
        // Uploaded file
        $example_image_path = $_FILES['myfile']['tmp_name'];
    }

    // Output example image 1
   $meme->set_top_text( $_POST['top_text'] );
   $meme->set_bottom_text( $_POST['bottom_text'] );
   $meme->set_output_dir( './tmp/' ); // default to ./ if not set
   $meme->set_image( $example_image_path );
    $output_image_path1 =$meme->generate();

    // Output example image 2
   $meme->clear();
   $meme->set_top_text( $_POST['top_text'] );
   $meme->set_bottom_text( $_POST['bottom_text'] );
   $meme->set_output_dir( './tmp/' ); // default to ./ if not set
   $meme->set_image( $example_image_path );
   $meme->set_watermark( './tmp/php.gif' );
   $meme->set_watemark_opacity(80);
    $output_image_path2 =$meme->generate();

    // Output example image 3
   $meme->clear();
   $meme->set_top_text( $_POST['top_text'] );
   $meme->set_bottom_text( $_POST['bottom_text'] );
   $meme->set_output_dir( './tmp/' ); // default to ./ if not set
   $meme->set_image( $example_image_path );
   $meme->set_font('./fonts/UbuntuMono-B.ttf');
   $meme->set_font_ratio( 0.03 );
   $meme->set_margins_ratio( 0.03 );
    $output_image_path3 =$meme->generate();

}

    }
}

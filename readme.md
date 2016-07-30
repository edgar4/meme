# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Blant instruction to the meme json responses
## /
 this returns a Json resonse with  with
 1. All meme
 2. All   none memefied images

##/meme/show
returns all meme belonging to a user {uses session to achieve this }

## /meme{id}
returns a specific meme

## /login
login in user via socials

## POST /meme/make
 expects post key value pair
  and returns link to generated meme
  
  #NOTE: if no  image object is provided it expects an image name ie. gallery image before fails inf none provided
  {
    'image' => ""
    'top_text' =>''
    'bottom_text' => ''
    'tag'   =>
 }

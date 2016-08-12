
Blant instruction to the meme json responses
## /
 this returns a Json resonse with  with
 1. All meme details
 2. dimen key is a json object containing width and height of meme

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

## /raw
 will now return raw images , i have moved this from the main / as it dint make much sense to be there
 
## POST /meme/like{id}
  post expects a meme_id key  and will increment  that meme's likes by one
 
 
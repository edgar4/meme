
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

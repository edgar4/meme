function clickShareAction(event){
  event.stopPropagation();
  console.log('Meme shared...');
  var memeShareModal = $('#meme-share-modal');
  memeShareModal.modal('show');
}

function launchLoginModal(event){
  event.stopPropagation();
  var memeLoginModal = $('#meme-login-modal');
  memeLoginModal.modal('show');
}


$('#meme-modal .share-action').click(clickShareAction);

// $('#btnCreateMeme').click(launchLoginModal);

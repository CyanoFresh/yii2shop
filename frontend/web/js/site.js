//Item Details thumbnails
//$('.product-images > img').click(function() {
//    // Render image
//    $('.img-display').attr('src', $(this).attr('src'));
//
//    // Remove old active class
//    $('.active').removeClass('active');
//
//    // Add active class to the current thumbnail
//    $(this).addClass('active');
//});
$('.gallery-item:first img').addClass('img-responsive img-main');
$('.gallery-item img').not(':first').addClass('img-small');

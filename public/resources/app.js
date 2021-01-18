$(document).ready(function(){
    $('.dropdown-trigger').dropdown();
    $('.materialboxed').materialbox();
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
    });

    //START image upload
    function readURL(input) {
        $('.uploadHolder').html('');
        for(i=0;i<input.files.length;i++){
            var reader = new FileReader();
            reader.readAsDataURL(input.files[i]);
            reader.onload = function (e) {
                $('div.uploadHolder').append('<img class="uploadHolder" alt="thumbnail"  src="'+e.target.result+'"/>');
            }
        }
    }
    
    $('input.upload').change(function () {
        readURL(this);
        $('.img-upload p').text(this.files.length + " file(s) selected");
        $('.img-upload .toHide').hide();
    });
    //END image upload

    $('button.input-quantity').click(function(){
        if($(this).hasClass('add')){
            $('input.input-quantity').val(parseInt($('input.input-quantity').val())+1);
        }
        if($(this).hasClass('minus')){
            $('input.input-quantity').val(parseInt($('input.input-quantity').val())-1);
        }
    });

    $('#result-sort').change(function(){
        $('#category-sort').submit();
    });

    $('button.category').click(function(e){
        $('input[name="category_id"]').val( $(this).attr('data-id'));
        $('input[name="category_name"]').val( $(this).attr('data-name'));
        $('#category-form').submit();
    });


    //START view product images slide
    var slideIndex = 1;
    showSlides(slideIndex);

    $('.level-2 .prev').click(function(){
        showSlides(slideIndex += -1);
    });

    $('.level-2 .next').click(function(){
        showSlides(slideIndex += 1);
    });

    $('.view-thumbnail').click(function(){
        showSlides(slideIndex = $(this).index() + 1);
    });

    function showSlides(n) {
        var i;
        var slides = $('.mySlides');
        var thumbnails = $('.view-thumbnail');
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides.eq(i).css('display','none');
            thumbnails.eq(i).removeClass('active');
        }
        slides.eq(slideIndex-1).css('display','block');
        thumbnails.eq(slideIndex-1).addClass('active');
    }
    //END view product images slide

});
//START material-ui dropdown
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
});
$('.dropdown-trigger').dropdown();
//END material-ui dropdown

//
$(document).ready(function(){
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
    });
});
//

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
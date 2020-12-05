document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
});
$('.dropdown-trigger').dropdown();


$('.img-upload input').change(function () {
    $('img-upload p').text(this.files.length + " file(s) selected");
});
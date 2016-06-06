$(document).ready(function () {
    $(".btnDel").on('click', function () {
        var id = $(this).next().val();
        $('form').attr('action', 'categories/' + id);
        $('#idDel').text(id);
    });
});
$('#select-stores').change(function () {
    $('.stores-info').hide();
    $('#' + $(this).val()).show();
});
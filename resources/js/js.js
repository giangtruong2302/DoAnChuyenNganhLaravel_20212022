$(document).ready(function () {
    // Sự kiện khi đóng modal form //
    $('#form1').on('hidden.bs.modal', function (e) {
        $('.chat-boxx').addClass('show');
        $('.chatIcon').show();
        $('#header-top').addClass('sticky');
    })
    $('#form2').on('hidden.bs.modal', function (e) {
        $('.chat-boxx').addClass('show');
        $('.chatIcon').show();
        $('#header-top').addClass('sticky');
    })
    // Sự kiện khi mở modal form // 
    $('.DN').click(function () {
        if ($('#form1').length) {
            $('.chat-boxx').removeClass('show');
            $('.chatIcon').hide();
            $('#header-top').removeClass('sticky');
        }
    })
    $('.DK').click(function () {
        if ($('#form2').length)
            $('.chat-boxx').removeClass('show');
        $('.chatIcon').hide();
        $('#header-top').removeClass('sticky');
    })
});
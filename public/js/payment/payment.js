$(document).ready(function () {
    $('#paymentProof').on('change', function () {
        $('#inputBorder').css('border', '2px solid #90EE90')
        $('.label .title').text('Payment Proof Uploaded!')
        $('.label .title').css({
            'color': '#90EE90',
            'padding-top': '10px',
        })
        $('.label i').empty()
        $('.label i').css('color', '#90EE90')

        $('input[type="submit"]').prop('disabled', false)
        $('input[type="submit"]').addClass('animate-pulse')
    })
})
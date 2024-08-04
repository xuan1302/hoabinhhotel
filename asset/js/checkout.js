(function ($) {
    $(".back-checkout").click(function(e) {
        e.preventDefault();
        window.history.back();
    });

    $('input#totalMoney').val();
    $('input#deponsive').val();
    $('input#fromDate').val();
    $('input#toDate').val();
    $('input#adult').val();
    $('input#child').val();
    $('input#numberRoom').val();

}(jQuery));
(function ($) {
    $(".back-checkout").click(function(e) {
        e.preventDefault();
        window.history.back();
    });

    $('input#totalMoney').val($('#totalMoney').text());
    $('input#deponsive').val($('#deponsive').text());
    $('input#fromDate').val($('#fromDate').text());
    $('input#toDate').val($('#toDate').text());
    $('input#adult').val($('#adult').text());
    $('input#child').val($('#child').text());
    $('input#numberRoom').val($('#numberRoom').text());

    $(document).on('wpcf7mailsent', function(event) {
        var formId = event.detail.contactFormId;
        console.log('Form ID: ' + formId);
        if (formId == '148') {
            var url = new URL(window.location.href);
            url.searchParams.set('formSubmitted', 'true');
            window.history.pushState({}, '', url);
            location.reload();
        }
    });
}(jQuery));
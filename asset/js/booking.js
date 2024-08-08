(function ($) {

    $(window).on('beforeunload', function() {
        // Đặt lại các giá trị của các input trong form về giá trị mặc định
        $('.numberInputReset').val(0)
        $('.numberInputAdult').val(1)
    });

    // header not position
    $('.content-template-checkout-booking, .single-page, .page-404').parent('#page').addClass('header-init');
    // show hide
    $('.select-person .icon').click(function(){
        $('.change-number-person').toggleClass('active');
    });
    $('#dateRange').daterangepicker({
        opens: 'right',
        startDate: moment().startOf('hour'),
        minDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(24, 'hour'),
        locale: {
            format: 'DD/MM/YYYY', // Định dạng ngày
            applyLabel: 'Xác nhận',
            cancelLabel: 'Hủy',
            fromLabel: 'Từ',
            toLabel: 'Đến',
            customRangeLabel: 'Tùy chỉnh',
            daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
            monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            firstDay: 1
        },
    }, function(start, end, label) {
    });

    $('#dateRange').on('apply.daterangepicker', function(ev, picker) {
        updateDiffDate(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'));
        countTotalMoneyRoom();
    });

    function updateDiffDate(date1, date2){
        const fromDate = new Date(date1);
        const toDate = new Date(date2);
        const timeDiff = (toDate - fromDate) / (1000 * 3600 * 24);
        $('.totalDate').text(timeDiff)
    }
    function convertDate(dateString, type='yyyy/mm/dd') {
        // Tách ngày, tháng, năm từ chuỗi ban đầu
        var parts = dateString.split('/');
        var day = parts[0];
        var month = parts[1];
        var year = parts[2];

        // Chuyển đổi thành định dạng mới
        let newDateString = year + '/' + month + '/' + day;
        if(type === 'mm/dd/yyyy'){
            newDateString = month + '/' + day + '/' + year;
        }

        return newDateString;
    }
    $('#dateRange').on('change', function() {
        var inputValue = $(this).val();
        updateDiffDate(convertDate(inputValue.split('-')[0].trim()), convertDate(inputValue.split('-')[1].trim()));
        countTotalMoneyRoom();
    });

    $('.increase').click(function() {
        var input = $(this).siblings('.numberInput');
        var currentValue = parseInt(input.val());
        if(parseFloat(currentValue) >= parseFloat(input.attr('max'))){
            return
        }
        input.val(currentValue + 1);

        if($(this).siblings('.id_post').length > 0){
            const id_post = $(this).siblings('.id_post').val();
            const price = $(this).siblings('.price_post').val();
            const deposit = $(this).siblings('.deposit').val();
            const listPostId = JSON.parse($('#posts').val());
            let  count_room = JSON.parse($('#count_room').val());
            if(!listPostId.includes(id_post)){
                listPostId.push(id_post);
                count_room = [...count_room, {id: id_post, count: currentValue + 1, price, deposit}];
            }
            let obj = count_room.find(obj => obj.id === id_post);
            if (obj) {
                obj.count = currentValue + 1;
            }
            updateTotalRoom(count_room);
            countTotalMoneyRoom();
            $('#posts').val(JSON.stringify(listPostId));
            $('#count_room').val(JSON.stringify(count_room));
            if(listPostId.length > 0){
                $('.booking-n').prop('disabled', false);
            } else {
                $('.booking-n').prop('disabled', true);
            }
        }

    });

    $('.decrease').click(function() {
        var input = $(this).siblings('.numberInput');
        var currentValue = parseInt(input.val());
        if (currentValue > 0) {
            input.val(currentValue - 1);
        }
        if($(this).siblings('.id_post').length > 0){
            const id_post = $(this).siblings('.id_post').val();
            let  count_room = JSON.parse($('#count_room').val());
            let listPostId = JSON.parse($('#posts').val());
            let obj = count_room.find(obj => obj.id === id_post);
            if (obj) {
                obj.count = currentValue - 1;
            }
            if((currentValue - 1) === 0){
                listPostId = listPostId.filter(item => item !== id_post);
                count_room = count_room.filter(item => item.id !== id_post);
            }
            updateTotalRoom(count_room);
            countTotalMoneyRoom();
            if(listPostId.length > 0){
                $('.booking-n').prop('disabled', false);
            } else {
                $('.booking-n').prop('disabled', true);
            }
            $('#posts').val(JSON.stringify(listPostId));
            $('#count_room').val(JSON.stringify(count_room));
        }
    });

    $('.submit-persion').click(function(){
        $('.change-number-person').removeClass('active');
        $('#num-adult').text($('#numberAdults').val());
        $('#num-child').text($('#numberChildren').val());
    });

    //get data url
    function get_data_url(){
        const range_date_sing = $('#sing-booking-range-date').val();
        const adults_sing = $('#sing-booking-adults').val();
        const children_sing = $('#sing-booking-children').val();
        if(range_date_sing){
            const fromDate = (range_date_sing?.split('-')[0].trim());
            const toDate = (range_date_sing?.split('-')[1].trim());
            $('.dateRange').daterangepicker(
                {
                    startDate: fromDate,
                    endDate: toDate,
                    locale: {
                        format: 'DD/MM/YYYY', // Định dạng ngày
                        applyLabel: 'Xác nhận',
                        cancelLabel: 'Hủy',
                        fromLabel: 'Từ',
                        toLabel: 'Đến',
                        customRangeLabel: 'Tùy chỉnh',
                        daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                        monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                            'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                        firstDay: 1
                    },
                }
            );
        }

        if(adults_sing){
            $('#numberAdults').val(adults_sing);
            $('#num-adult').text(adults_sing)
        }
        if(children_sing){
            $('#numberChildren').val(children_sing);
            $('#num-child').text(children_sing)
        }
    }
    get_data_url();
    function updateTotalRoom(count_room = []){
        let total = 0;
        count_room.map(item => {
            total += Number(item.count);
        })
        $('#totalRoom').text(total);
    }
    function countTotalMoneyRoom(){
        let total = 0;
        const totalDate = Number($('.total-price .totalDate').text());
        setTimeout(() => {
            const valueCountRoom = $('#count_room').val();
            if (valueCountRoom !== undefined && valueCountRoom !== null){
                let countRoom = JSON.parse(valueCountRoom);
                if(countRoom.length > 0) {
                    countRoom.map(item => {
                        total += totalDate * (item.count * item.price);
                    });
                }
                $('#total_money_room').text(total.toLocaleString('de-DE'));
            }
        },0);
    }

    $('.icon-date').click(function (){
        $('#dateRange').click();
    });
}(jQuery));
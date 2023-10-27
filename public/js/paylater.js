var plcalc = {};

plcalc.rate = 0;
plcalc.minOrder = 0;
plcalc.maxBeforeDeposit = 0;
plcalc.minimumDeposit = 0;
plcalc.depositRequired = false;
plcalc.helper = false;

// INIT
plcalc.make_calculator = function(items, order_total, link, link_text) {
    plcalc.depositRequired = false;
    if (plcalc.rate === 0) {
        jQuery.get("https://payl8r.com/getrates").always(function(v) {
            v = v.split(',');
            plcalc.rate = v[0];
            plcalc.minOrder = v[1];
            plcalc.maxBeforeDeposit = v[2];
            plcalc.minimumDeposit = v[3];
            plcalc.origionalAmount = parseFloat(order_total);
            plcalc.currentAmount = parseFloat(order_total);
            plcalc.make(items, order_total, link, link_text);
        });
    } else {
        plcalc.origionalAmount = parseFloat(order_total);
        plcalc.currentAmount = parseFloat(order_total);
        plcalc.make(items, order_total, link, link_text);
    }
};
plcalc.draw_to_frame = function(item_cost, quantity_input, frame) {
    var nokeyup = false;
    if (quantity_input === undefined) {
        quantity_input = {};
        quantity_input.val = function() {return 1;};
        nokeyup = true;
    }
    if (quantity_input.val() === '') quantity_input.val(0);
    if (plcalc.rate === 0) {
        jQuery.get("https://payl8r.com/getrates").always(function(v) {
            v = v.split(',');
            plcalc.rate = v[0];
            plcalc.minOrder = v[1];
            plcalc.maxBeforeDeposit = v[2];
            plcalc.minimumDeposit = v[3];
            plcalc.quantity = parseInt(quantity_input.val());
            plcalc.draw_to_frame_html(item_cost, frame, quantity_input);
            if (nokeyup===false) {
                quantity_input.keyup(function(){
                    if (quantity_input.val() === '') quantity_input.val(0);
                    plcalc.quantity = parseInt(quantity_input.val());
                    plcalc.draw_to_frame_html(item_cost, frame);
                });
                quantity_input.change(function(){
                    if (quantity_input.val() === '') quantity_input.val(0);
                    plcalc.quantity = parseInt(quantity_input.val());
                    plcalc.draw_to_frame_html(item_cost, frame);
                });
            }

        });
    } else {
        plcalc.quantity = parseInt(quantity_input.val());
        plcalc.draw_to_frame_html(item_cost, frame, quantity_input);
        if (nokeyup===false) {
            quantity_input.keyup(function(){
                if (quantity_input.val() === '') quantity_input.val(0);
                plcalc.quantity = parseInt(quantity_input.val());
                plcalc.draw_to_frame_html(item_cost, frame);
            });
            quantity_input.change(function(){
                if (quantity_input.val() === '') quantity_input.val(0);
                plcalc.quantity = parseInt(quantity_input.val());
                plcalc.draw_to_frame_html(item_cost, frame);
            });
        }
    }
};
plcalc.draw_to_frame_html = function(item_cost, frame, quantity_input) {
    jQuery('#plcalc').remove();
    html = '';
    var currentDate = new Date();
    var cm = parseInt(currentDate.getMonth()) + 1;
    currentDate.setMonth(cm);
    var currentMonth = parseInt(currentDate.getMonth())+1;
    if (currentMonth<10) currentMonth = "0"+currentMonth;
    plcalc.ca = parseFloat(item_cost) * plcalc.quantity;
    html += '<div id="plcalc" class="small">';
    html += '<img src="https://payl8r.com/frontend/img/payl8r-logo.png" alt="Payl8r logo" id="payl8r_logo"/>';
    html += '<p class="payl8r-small-title">View Finance Options</p>';
    html += '<div class="payl8r-plan plan0" months="0"><h3>Pay £<span class="current-amount0">'+parseFloat(plcalc.ca).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></h3><p class="payl8r-large payl8r-white">before '+currentDate.getDate()+'/'+currentMonth+'/'+currentDate.getFullYear()+'</p><div class="payl8r-total-box"><span class="payl8r-total-repayment-0" style="">Total repayment £'+plcalc.ca.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></div></div>';
    var a3 = (((plcalc.ca * plcalc.rate) * 3) + plcalc.ca) / 3;
    var a3t = a3.toFixed(2) * 3;
    html += '<div class="payl8r-plan plan3" months="3"><h3>£<span class="current-amount3">'+a3.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span> / month</h3><p class="payl8r-large payl8r-white">for 3 months</p><div class="payl8r-total-box"><span class="payl8r-total-repayment-3" style="">Total repayment £'+a3t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></div></div>';
    var a6 = (((plcalc.ca * plcalc.rate) * 6) + plcalc.ca) / 6;
    var a6t = a6.toFixed(2) * 6;
    html += '<div class="payl8r-plan plan6" months="6"><h3>£<span class="current-amount6">'+a6.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span> / month</h3><p class="payl8r-large payl8r-white">for 6 months</p><div class="payl8r-total-box"><span class="payl8r-total-repayment-6" style="">Total repayment £'+a6t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></div></div>';
    var a9 = (((plcalc.ca * plcalc.rate) * 9) + plcalc.ca) / 9;
    var a9t = a9.toFixed(2) * 9;
    html += '<div class="payl8r-plan plan9" months="9"><h3>£<span class="current-amount9">'+a9.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span> / month</h3><p class="payl8r-large payl8r-white">for 9 months</p><div class="payl8r-total-box"><span class="payl8r-total-repayment-9" style="">Total repayment £'+a9t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></div></div>';
    html += '</div>';
    frame.html(html);
    jQuery('.payl8r-plan').hover(function(){
        jQuery('.payl8r-plan').removeClass('payl8r-selected');
        jQuery(this).addClass('payl8r-selected');
    });
};
plcalc.make = function(items, order_total, link, link_text){
    if (plcalc.minOrder > order_total) {
        console.log('ERROR: Order total is less than minimum order amount.');
        return false;
    }

    if (parseInt(order_total) > parseInt(plcalc.maxBeforeDeposit)) {
        plcalc.depositRequired = true;
    }
    if (items !== null) items = plcalc.makeItemsText(items);

    var html = plcalc.formatHtml(items, order_total, link, link_text);
    jQuery('#plcalc').remove();
    jQuery(".calc").append(html);

    jQuery('#payl8r_close').click(function(){
        jQuery('#plcalc').remove();
    });

    jQuery('.payl8r-plan').click(function(){
        jQuery('#payl8r_plan').val(jQuery(this).attr('months'));
        jQuery('#payl8r_payment_per_month').val('£' + jQuery('.current-amount'+jQuery(this).attr('months')).html());
        jQuery('#payl8r_total').val('£' + jQuery('.payl8r-total-repayment-'+jQuery(this).attr('months')).html());
        jQuery('.payl8r-plan').removeClass('payl8r-selected');
        jQuery(this).addClass('payl8r-selected');
        jQuery('#payl8r_calc_confirm').prop('disabled', false);
        jQuery('#payl8r_ttp span').html(jQuery('.payl8r-total-repayment-'+jQuery(this).attr('months')).html());
    });

    jQuery(".payl8r-dropdown dt a").click(function() {
        jQuery(".payl8r-dropdown dd ul").toggle();
    });

    jQuery(".payl8r-dropdown dd ul li a").click(function() {
        var text = jQuery(this).html();
        jQuery(".payl8r-dropdown dt a span").html(text);
        jQuery(".payl8r-dropdown dd ul").hide();
        plcalc.currentAmount = parseInt(plcalc.origionalAmount) - parseInt(jQuery(this).attr('total'));
        var a3 = (((plcalc.currentAmount * plcalc.rate) * 3) + plcalc.currentAmount) / 3;
        var a3t = a3.toFixed(2) * 3;
        var a6 = (((plcalc.currentAmount * plcalc.rate) * 6) + plcalc.currentAmount) / 6;
        var a6t = a6.toFixed(2) * 6;
        var a9 = (((plcalc.currentAmount * plcalc.rate) * 9) + plcalc.currentAmount) / 9;
        var a9t = a9.toFixed(2) * 9;
        jQuery('.current-amount0, .payl8r-total-repayment-0').html(plcalc.currentAmount.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        jQuery('.current-amount3').html(a3.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        jQuery('.payl8r-total-repayment-3').html(a3t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        jQuery('.current-amount6').html(a6.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        jQuery('.payl8r-total-repayment-6').html(a6t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        jQuery('.current-amount9').html(a9.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        jQuery('.payl8r-total-repayment-9').html(a9t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        var selected = jQuery('.payl8r-plan.payl8r-selected').attr('months');
        jQuery('#payl8r_total').val('£' + jQuery('.payl8r-total-repayment-'+selected).html());
        jQuery('#payl8r_payment_per_month').val('£' + jQuery('.current-amount'+selected).html());
        jQuery('#payl8r_deposit_total').val('£' + parseInt(jQuery(this).attr('total')).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
        jQuery('#payl8r_deposit').val(jQuery(this).attr('deposit'));
        if (!jQuery('.payl8r-plan.payl8r-selected').length) selected = '0';
        jQuery('#payl8r_ttp span').html(jQuery('.payl8r-total-repayment-'+selected).html());
    });

    function getSelectedValue(id) {
        return jQuery("#" + id).find("dt a span.value").html();
    }

    jQuery(document).bind('click', function(e) {
        var $clicked = jQuery(e.target);
        if (! $clicked.parents().hasClass("payl8r-dropdown"))
            jQuery(".payl8r-dropdown dd ul").hide();
    });

    jQuery('.payl8r-helper-button').click(function() {
        if (plcalc.helper === false) {
            jQuery(this).addClass('payl8r-selected');
            setTimeout(function(){
                plcalc.helper = true;
            },100);
        }
    });
    jQuery('#plcalc').click(function() {
        if (jQuery('.payl8r-helper-button').hasClass('payl8r-selected') && plcalc.helper === true)
            jQuery('.payl8r-helper-button').removeClass('payl8r-selected');
        plcalc.helper = false;
    });
};

// Format text for description
plcalc.makeItemsText = function(items) {
    var i = 0;
    var itemstext = "";
    for (;items[i];) {
        itemstext += items[i] + "<br>";
        i++;
    }
    return itemstext;
};

function updatePrice(element){
    var price = $("#calc_price").val();
    price = price.replace("£", "");
    console.log(price);

    window.location.href = "/calculator/" + price;
}

// Format HTML for rendering
plcalc.formatHtml = function(itemstext, order_total, link, link_text) {
    var html = '<div id="plcalc">';
    html += '<div id="payl8r_close"></div>';
    html += '<img src="https://payl8r.com/frontend/img/payl8r-logo.png" alt="Payl8r logo" id="payl8r_logo"/>';
    html += '<form class="payl8r-window" action="'+link+'" method="post">';

    if (itemstext !== null) {
        html += '<table><tr>';
        html += '<td>Description</td>';
        html += '<td class="payl8r-grey">'+itemstext+'</td>';
        html += '</tr><tr>';
        html += '<td>Order total</td>';
        html += "<td class='blue'><input style='width: 75px;' id='calc_price' type='text' class='calcprice border-0 p-0' value='£" + order_total.toFixed(2).replace(/(\\d)(?=(\\d{3})+\\.)/g, '$1,')+"'><a href='#' onclick='updatePrice()' style='color: deepskyblue;'>update</a></td>"
        html += '</tr></table>';
    }

    if (plcalc.depositRequired === true) {
        var tbd = parseFloat(plcalc.maxBeforeDeposit);
        //html += '<p class="payl8r-large">For purchases over £'+tbd.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+' we require a minimum deposit of '+plcalc.minimumDeposit*100+'%</p>';
        html += '<div style="position:relative"><dl class="payl8r-box-large payl8r-dropdown" id="payl8rDepositAmount">';
        var p1 = order_total * plcalc.minimumDeposit;
        var p2 = order_total * (plcalc.minimumDeposit * 2);
        var p3 = order_total * (plcalc.minimumDeposit * 3);
        var p4 = order_total * (plcalc.minimumDeposit * 4);
        var p5 = order_total * (plcalc.minimumDeposit * 5);
        plcalc.currentAmount = plcalc.currentAmount-p1;
        html += '<dt>';
        html += '<li><a href="#payl8rDepositAmount"><span>£'+p1.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+' <small>deposit</small></span></a></li>';
        html += '</dt>';
        html += '<dd><ul>';
        html += '<li><a href="#payl8rDepositAmount" total="'+p1+'" deposit="1">£'+p1.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+' <small>deposit</small></a></li>';
        html += '<li><a href="#payl8rDepositAmount" total="'+p2+'" deposit="2">£'+p2.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+' <small>deposit</small></a></li>';
        html += '<li><a href="#payl8rDepositAmount" total="'+p3+'" deposit="3">£'+p3.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+' <small>deposit</small></a></li>';
        html += '<li><a href="#payl8rDepositAmount" total="'+p4+'" deposit="4">£'+p4.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+' <small>deposit</small></a></li>';
        html += '<li><a href="#payl8rDepositAmount" total="'+p5+'" deposit="5">£'+p5.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+' <small>deposit</small></a></li>';
        html += '</ul></dd>';
        var helpertext = "For purchases over £150.00 we require a minimum deposit of 10%.  Please select an amount. The deposit will be taken from your card when you confirm the order. If your order or application does not complete the deposit will not be charged.";
        html += '</dl><input type="hidden" id="payl8r_deposit_total" name="payl8r_deposit_total" value="'+p1+'"/><input type="hidden" id="payl8r_deposit" name="payl8r_deposit" value="1"/><div id="payl8r_deposit_helper" class="payl8r-helper-button">?<div class="payl8r-helper-text">'+helpertext+'</div></div></div>';
    }
    html += '<input type="hidden" value="" id="payl8r_plan" name="payl8r_plan" />';
    html += '<input type="hidden" value="" id="payl8r_payment_per_month" name="payl8r_payment_per_month" />';
    html += '<input type="hidden" value="" id="payl8r_total" name="payl8r_total" />';

    html += '<div><div class="payl8r-half">';
    var helpertextplan = 'Please select a plan that you find the most affordable. You can change the plan at anytime if you need longer to pay by contacting us.';
    html += '<div style="position: relative;"><p class="payl8r-large" style="margin:15px 0 20px;">Choose a plan</p><div id="payl8r_plan_helper" class="payl8r-helper-button">?<div class="payl8r-helper-text">'+helpertextplan+'</div></div></div>';
    var currentDate = new Date();
    var cm = parseInt(currentDate.getMonth()) + 1;
    currentDate.setMonth(cm);
    var currentMonth = parseInt(currentDate.getMonth())+1;
    if (currentMonth<10) currentMonth = "0"+currentMonth;
    html += '<div class="payl8r-plan plan0" months="0"><h3>Pay £<span class="current-amount0">'+parseFloat(plcalc.currentAmount).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></h3><p class="payl8r-large payl8r-white">before '+currentDate.getDate()+'/'+currentMonth+'/'+currentDate.getFullYear()+'</p><div class="payl8r-total-box">interest 0% (0% APR)<span class="payl8r-total-repayment-0" style="display:none;">'+plcalc.currentAmount.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></div></div>';
    var a3 = (((plcalc.currentAmount * plcalc.rate) * 3) + plcalc.currentAmount) / 3;
    var a3t = a3.toFixed(2) * 3;
    html += '<div class="payl8r-plan plan3" months="3"><h3>£<span class="current-amount3">'+a3.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span> / month</h3><p class="payl8r-large payl8r-white">for 3 months</p><div class="payl8r-total-box">interest '+(plcalc.rate*100)+'% p.m. ('+((plcalc.rate*100)*12)+'% APR)<span class="payl8r-total-repayment-3" style="display:none;">'+a3t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></div></div>';
    var a6 = (((plcalc.currentAmount * plcalc.rate) * 6) + plcalc.currentAmount) / 6;
    var a6t = a6.toFixed(2) * 6;
    html += '<div class="payl8r-plan plan6" months="6"><h3>£<span class="current-amount6">'+a6.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span> / month</h3><p class="payl8r-large payl8r-white">for 6 months</p><div class="payl8r-total-box">interest '+(plcalc.rate*100)+'% p.m. ('+((plcalc.rate*100)*12)+'% APR)<span class="payl8r-total-repayment-6" style="display:none;">'+a6t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></div></div>';
    var a9 = (((plcalc.currentAmount * plcalc.rate) * 9) + plcalc.currentAmount) / 9;
    var a9t = a9.toFixed(2) * 9;
    html += '<div class="payl8r-plan plan9" months="9"><h3>£<span class="current-amount9">'+a9.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span> / month</h3><p class="payl8r-large payl8r-white">for 9 months</p><div class="payl8r-total-box">interest '+(plcalc.rate*100)+'% p.m. ('+((plcalc.rate*100)*12)+'% APR)<span class="payl8r-total-repayment-9" style="display:none;">'+a9t.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></div></div>';
    html += '</div>';
    html += '<div class="payl8r-half">';
    var helpertexttotal = 'This is the total amount that you will have pay on the plan that have you selected. You can repay early at anytime at no extra cost.  If you find that you can not make a payment then simply contact us and we will allow you to choose a longer plan with less monthly payments. You will not be charged any direct debit fees if you miss a payment.';
    html += '<div style="position: relative;"><p class="payl8r-large payl8r-ttp" style="position: relative;">Total</p><div id="payl8r_total_helper" class="payl8r-helper-button">?<div class="payl8r-helper-text">'+helpertexttotal+'</div></div></div>';
    html += '<h2 id="payl8r_ttp">£<span>'+plcalc.currentAmount.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span></h2>';
    //html += '<p class="payl8r-grey">interest '+(plcalc.rate*100)+'% per month ('+((plcalc.rate*100)*12)+'% APR)</p>';
    if (link_text===null) link_text = 'Find a Clinic';
    html += '<a class="btn payl8r-btn" id="payl8r_calc_confirm" href="/clinics" disabled>Find a Clinic </a>';
    html += '</div><div style="clear:both;"></div></div>';
    html += '</form>';
    html += '</div>';
    return html;
};


window.addEventListener("message", pl_iframe_heightUpdate, false);
plcalc.prevHeight = jQuery('[name="payl8r"]').height();
function pl_iframe_heightUpdate (event) {
    var origin = event.origin || event.originalEvent.origin;
    if (origin !== "https://payl8r.com" && origin !== "https://staging.payl8r.com")
        return;
    if (plcalc.prevHeight !== jQuery('[name="payl8r"]').height())
        jQuery('[name="payl8r"]').height(event.data);
}

/* PAYMENT GATEWAY */
jQuery(document).ready(function($) {

    $('#agree_precontract1, #agree_precontract2').on('change', function(e) {
        if ($('#agree_precontract1').is(':checked') && $('#agree_precontract2').is(':checked')) {
            $('#agree_precontract').val('true');
        } else {
            $('#agree_precontract').val('false');
        }
    });

    

    $('.paymentForm_checkbox').on('change', function(e) {
        $(this).closest('.paymentForm_checkbox_label').toggleClass('paymentForm_checkbox_label-active');
    });

    $('.js-payment-type').on('click', function(e) {
        e.preventDefault();
        $('.js-step-your-loan').removeClass('paymentForm_button-disabled');
        $('.js-payment-type').removeClass('paymentForm_card-on');
        $(this).addClass('paymentForm_card-on');
        $('#loan_term_months').val($(this).attr('data-months'));
    });

    /* STEP 1 */
    $('.js-step-your-loan').on('click', function(e) {
        $('.paymentForm-yourLoan').addClass('paymentForm-hide');
        $('.paymentForm-yourInfo').removeClass('paymentForm-hide');
        $('.payment_journey_step[data-id="2"]').addClass('payment_journey_step-on');
        $('.payment_journey_step[data-id="1"]').addClass('payment_journey_step-previous');
    });


    /* STEP 2 */
    $('.js-previous-your-info').on('click', function(e) {
        $('.paymentForm-yourInfo').addClass('paymentForm-hide');
        $('.paymentForm-yourLoan').removeClass('paymentForm-hide');
        $('.payment_journey_step[data-id="2"]').removeClass('payment_journey_step-on');
        $('.payment_journey_step[data-id="1"]').removeClass('payment_journey_step-previous');
    });

    $("#paymentForm-yourInfo").on('submit', function(e) {

        e.preventDefault();

        var match = 0;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: '/gaincredit/applications',
            method: 'POST',
            dataType: "json",
            data: {
                loan_amount: $('#loan_amount').val(),
                loan_term_months: $('#loan_term_months').val(),
                title: $('#title').val(),
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                dob_day: $('#dob_day').val(),
                dob_month: $('#dob_month').val(),
                dob_year: $('#dob_year').val(),
                email: $('#email').val(),
                mobile_phone: $('#mobile_phone').val(),
                post_code: $('#post_code').val(),
                building_info: $('#building_info').val(),
                street: $('#street').val(),
                city: $('#city').val(),
                employment_type: $('#employment_type').val(),
                monthly_income: $('#monthly_income').val(),
                monthly_expenses: $('#monthly_expenses').val(),
                no_of_dependents: $('#no_of_dependents').val()
            },
        }).fail(function(data) {
            $('.paymentForm-yourInfo').addClass('paymentForm-hide');
            $('.paymentForm-yourInfoFail').removeClass('paymentForm-hide');
            $('.paymentForm-yourInfoFail .error_message').html('<p>Failed: The application has failed to return a value.</p>');
            match = 1;
        }).done(function(data) {
            if(data.statusCode===500) {
                // most likely a field missing?
                $('.paymentForm-yourInfo').addClass('paymentForm-hide');
                $('.paymentForm-yourInfoFail').removeClass('paymentForm-hide');
                $('.paymentForm-yourInfoFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
                match = 1;
            }
            if(data.statusCode===400) {
                // error in the form
                $('.paymentForm-yourInfo').addClass('paymentForm-hide');
                $('.paymentForm-yourInfoFail').removeClass('paymentForm-hide');
                $('.paymentForm-yourInfoFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
                match = 1;
            }
            if(data.status==="SOFT_APPROVED") {
                $('#application_ref').val(data.application_ref);
                $('.paymentForm-yourInfo').addClass('paymentForm-hide');
                $('.paymentForm-yourInfoSuccess').removeClass('paymentForm-hide');
                match = 1;
            } else {
                $('.paymentForm-yourInfo').addClass('paymentForm-hide');
                $('.paymentForm-yourInfoUnapproved').removeClass('paymentForm-hide');
                match = 1;
            }
            if(match===0) {
                // otherwise application failed
                $('.paymentForm-yourInfo').addClass('paymentForm-hide');
                $('.paymentForm-yourInfoFail').removeClass('paymentForm-hide');
                $('.paymentForm-yourInfoFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
            }
        });

    });


    $('.js-previous-your-info-success').on('click', function(e) {
        $('.paymentForm-yourInfoSuccess').addClass('paymentForm-hide');
        $('.paymentForm-yourInfoFail').addClass('paymentForm-hide');
        $('.paymentForm-yourInfo').removeClass('paymentForm-hide');       
    });

    $('.js-next-your-info-success').on('click', function(e) {
        $('.paymentForm-yourInfoSuccess').addClass('paymentForm-hide');
        $('.paymentForm-yourCreditCheck').removeClass('paymentForm-hide');
        $('.payment_journey_step[data-id="3"]').addClass('payment_journey_step-on');
        $('.payment_journey_step[data-id="2"]').addClass('payment_journey_step-previous');
    });


    /* STEP 3 */
    $('.js-previous-your-credit-check').on('click', function(e) {
        $('.paymentForm-yourCreditCheck').addClass('paymentForm-hide');
        $('.paymentForm-yourInfoSuccess').removeClass('paymentForm-hide');
        $('.payment_journey_step[data-id="3"]').removeClass('payment_journey_step-on');
        $('.payment_journey_step[data-id="2"]').removeClass('payment_journey_step-previous');
    });    

    $("#paymentForm-yourCreditCheck").on('submit', function(e) {

        e.preventDefault();
        
        var match = 0;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: '/gaincredit/applicationsHard',
            method: 'POST',
            dataType: "json",
            data: {
                application_ref: $('#application_ref').val(),
                agree_credit_check: $('#agree_credit_check').val(),
                bank_account_number: $('#bank_account_number').val(),
                bank_sort_code: $('#bank_sort_code').val(),
                debit_card_type: $('#debit_card_type').val()
            },
        }).fail(function(data) {
            $('.paymentForm-yourCreditCheck').addClass('paymentForm-hide');
            $('.paymentForm-yourCreditCheckFail').removeClass('paymentForm-hide');
            $('.paymentForm-yourCreditCheckFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
        }).done(function(data) {
            if(data.statusCode===500) {
                // most likely a field missing?
                $('.paymentForm-yourCreditCheck').addClass('paymentForm-hide');
                $('.paymentForm-yourCreditCheckFail').removeClass('paymentForm-hide');
                $('.paymentForm-yourCreditCheckFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
                match = 1;
            }
            if(data.statusCode===400) {
                // error in the form
                $('.paymentForm-yourCreditCheck').addClass('paymentForm-hide');
                $('.paymentForm-yourCreditCheckFail').removeClass('paymentForm-hide');
                $('.paymentForm-yourCreditCheckFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
                match = 1;
            }
            if(data.status==="HARD_APPROVED") {
                match = 1;
                $('.js-card_capture_url').html('<iframe id="card_capture_url" src="'+data.card_capture_url+'" class="paymentForm_iframe" />');
                $('.paymentForm-yourCreditCheck').addClass('paymentForm-hide');
                $('.paymentForm-yourCreditCheckSuccess').removeClass('paymentForm-hide');
            } else if(data.status==="REJECTED_HARD") {
                match = 1;
                $('.paymentForm-yourCreditCheck').addClass('paymentForm-hide');
                $('.paymentForm-yourCreditCheckUnapproved').removeClass('paymentForm-hide');
            }
            if(match===0) {
                $('.paymentForm-yourCreditCheck').addClass('paymentForm-hide');
                $('.paymentForm-yourCreditCheckFail').removeClass('paymentForm-hide');
                $('.paymentForm-yourCreditCheckFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
            }
        });
    
    });


    $('.js-previous-your-credit-check-success').on('click', function(e) {
        $('.paymentForm-yourCreditCheckFail').addClass('paymentForm-hide');
        $('.paymentForm-yourCreditCheckSuccess').addClass('paymentForm-hide');
        $('.paymentForm-yourCreditCheck').removeClass('paymentForm-hide');
    });

    $('.js-next-your-credit-check-success').on('click', function(e) {
        $('.paymentForm-yourCreditCheckSuccess').addClass('paymentForm-hide');
        $('.paymentForm-cardDetails').removeClass('paymentForm-hide');
        $('.payment_journey_step[data-id="4"]').addClass('payment_journey_step-on');
        $('.payment_journey_step[data-id="3"]').addClass('payment_journey_step-previous');
    });

    /* STEP 4 */
    $('.js-previous-card-details').on('click', function(e) {
        $('.paymentForm-cardDetails').addClass('paymentForm-hide');
        $('.paymentForm-cardDetailsFail').addClass('paymentForm-hide');
        $('.paymentForm-yourCreditCheckSuccess').removeClass('paymentForm-hide');
        $('.payment_journey_step[data-id="4"]').removeClass('payment_journey_step-on');
        $('.payment_journey_step[data-id="3"]').removeClass('payment_journey_step-previous');
    });

    $("#paymentForm-cardDetails").on('submit', function(e) {

        e.preventDefault();
        
        var match = 0;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: '/gaincredit/cardSubmitted',
            method: 'POST',
            dataType: "json",
            data: {
                application_ref: $('#application_ref').val(),
                card_captured: $('#card_captured').val(),
                card_ref: $('#card_ref').val()
            },
        }).fail(function(data) {
            $('.paymentForm-cardDetails').addClass('paymentForm-hide');
            $('.paymentForm-cardDetailsFail').removeClass('paymentForm-hide');
            $('.paymentForm-cardDetailsFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
        }).done(function(data) {
            if(data.statusCode===500) {
                // most likely a field missing?
                $('.paymentForm-cardDetails').addClass('paymentForm-hide');
                $('.paymentForm-cardDetailsFail').removeClass('paymentForm-hide');
                $('.paymentForm-cardDetailsFail .error_message').html('<p>'+data.error_code+': '+data.error_message+'</p>');
                match = 1;
            }
            if(data.statusCode===400) {
                // error in the form
                $('.paymentForm-cardDetails').addClass('paymentForm-hide');
                $('.paymentForm-cardDetailsFail').removeClass('paymentForm-hide');
                $('.paymentForm-cardDetailsFail .error_message').html('<p>'+data.error_code+': '+data.error_message+'</p>');
                match = 1;
            }
            if(data.status==="CARD_SUBMITTED") {
                $('.js-loan_explanation_doc_url').html('<iframe id="loan_explanation_doc_url" src="'+data.loan_explanation_doc_url+'" class="paymentForm_iframe" />');
                $('.js-secci_doc_url').html('<iframe id="secci_doc_url" src="'+data.secci_doc_url+'" class="paymentForm_iframe" />');
                $('.paymentForm-cardDetails').addClass('paymentForm-hide');
                $('.paymentForm-overview').removeClass('paymentForm-hide');
                $('.payment_journey_step[data-id="5"]').addClass('payment_journey_step-on');
                $('.payment_journey_step[data-id="4"]').addClass('payment_journey_step-previous');
                match = 1;
            }
            if(match===0) {
                $('.paymentForm-cardDetails').addClass('paymentForm-hide');
                $('.paymentForm-cardDetailsFail').removeClass('paymentForm-hide');
                $('.paymentForm-cardDetailsFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
            }
        });
    
    });
    
    /* STEP 5 */
    $('.js-previous-overview').on('click', function(e) {
        $('.paymentForm-overview').addClass('paymentForm-hide');
        $('.paymentForm-cardDetails').removeClass('paymentForm-hide');
        $('.payment_journey_step[data-id="5"]').removeClass('payment_journey_step-on');
        $('.payment_journey_step[data-id="4"]').removeClass('payment_journey_step-previous');
    });

    $("#paymentForm-overview").on('submit', function(e) {

        e.preventDefault();
            
        var match = 0;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: '/gaincredit/loanexplanationaccepted',
            method: 'POST',
            dataType: "json",
            data: {
                application_ref: $('#application_ref').val(),
                agree_precontract: $('#agree_precontract').val(),
            },
        }).fail(function(data) {
            $('.paymentForm-overview').addClass('paymentForm-hide');
            $('.paymentForm-overviewFail').removeClass('paymentForm-hide');
            $('.paymentForm-overviewFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
        }).done(function(data) {
            if(data.statusCode===500) {
                // most likely a field missing?
                $('.paymentForm-overview').addClass('paymentForm-hide');
                $('.paymentForm-overviewFail').removeClass('paymentForm-hide');
                $('.paymentForm-overviewFail .error_message').html('<p>'+data.error_code+': '+data.error_message+'</p>');
                match = 1;
            }
            if(data.statusCode===400) {
                // error in the form
                $('.paymentForm-overview').addClass('paymentForm-hide');
                $('.paymentForm-overviewFail').removeClass('paymentForm-hide');
                $('.paymentForm-overviewFail .error_message').html('<p>'+data.error_code+': '+data.error_message+'</p>');
                match = 1;
            }
            if(data.status==="CONTRACT_AGREED") {
                $('.js-esign_doc_url').html('<iframe id="esign_doc_url" src="'+data.esign_doc_url+'" class="paymentForm_iframe" />');
                $('.paymentForm-overview').addClass('paymentForm-hide');
                $('.paymentForm-confirm').removeClass('paymentForm-hide');
                $('.payment_journey_step[data-id="6"]').addClass('payment_journey_step-on');
                $('.payment_journey_step[data-id="5"]').addClass('payment_journey_step-previous');
                match = 1;
            }
            if(match===0) {
                $('.paymentForm-overview').addClass('paymentForm-hide');
                $('.paymentForm-overviewFail').removeClass('paymentForm-hide');
                $('.paymentForm-overviewFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
            }
        });
    
    });


    /* STEP 6 */
    $('.js-previous-confirm').on('click', function(e) {
        $('.paymentForm-overviewFail').addClass('paymentForm-hide');
        $('.paymentForm-confirm').addClass('paymentForm-hide');
        $('.paymentForm-overview').removeClass('paymentForm-hide');
        $('.payment_journey_step[data-id="6"]').removeClass('payment_journey_step-on');
        $('.payment_journey_step[data-id="5"]').removeClass('payment_journey_step-previous');
    });

    $("#paymentForm-confirm").on('submit', function(e) {

        e.preventDefault();
            
        var match = 0;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: '/gaincredit/eSignRequest',
            method: 'POST',
            dataType: "json",
            data: {
                application_ref: $('#application_ref').val(),
                agree_esign: $('#agree_esign').val(),
                signature: $('#signature').val(),
                email: $('#email').val(),
                clinic_name: $('#clinic_name').val()
            },
        }).fail(function(data) {
            $('.paymentForm-confirm').addClass('paymentForm-hide');
            $('.paymentForm-confirmFail').removeClass('paymentForm-hide');
            $('.paymentForm-confirmFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
        }).done(function(data) {
            if(data.statusCode===500) {
                // most likely a field missing?
                $('.paymentForm-confirm').addClass('paymentForm-hide');
                $('.paymentForm-confirmFail').removeClass('paymentForm-hide');
                $('.paymentForm-confirmFail .error_message').html('<p>'+data.error_code+': '+data.error_message+'</p>');
                match = 1;
            }
            if(data.statusCode===400) {
                // error in the form
                $('.paymentForm-confirm').addClass('paymentForm-hide');
                $('.paymentForm-confirmFail').removeClass('paymentForm-hide');
                $('.paymentForm-confirmFail .error_message').html('<p>'+data.error_code+': '+data.error_message+'</p>');
                match = 1;
            }
            if(data.status==="LOAN_APPROVED") {
                $('.paymentForm-confirm').addClass('paymentForm-hide');
                $('.paymentForm-approved').removeClass('paymentForm-hide');
                match = 1;
            }
            if(match===0) {
                $('.paymentForm-confirm').addClass('paymentForm-hide');
                $('.paymentForm-confirmFail').removeClass('paymentForm-hide');
                $('.paymentForm-confirmFail .error_message').html('<p>'+data.statusCode+': '+data.message+'</p>');
            }
        });

        /* STEP 7 */
        $('.js-previous-approved').on('click', function(e) {
            $('.paymentForm-confirmFail').addClass('paymentForm-hide');
            $('.paymentForm-confirm').removeClass('paymentForm-hide');
        });
    
    });
    
     $(document).ready(function(){
        // $("#notice_popup").modal();
    });

});
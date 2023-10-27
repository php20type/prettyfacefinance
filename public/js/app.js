// Example starter JavaScript for disabling form submissions if there are invalid fields
(function($) {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    $(".price-calc").click(function () {
        var price = $("#plcalcvalue").val();

        console.log("Re-assigning page...");
        window.location.href = "/calculator/" + price;
    })

    // Toggle editable
    $('h5 .fa-edit').click(function () {
        var parentPanel = $(this).parents('.card');
        var inputs = parentPanel.find('input:not([type=file]), textarea');

        $.each(inputs, function () {
            $(this).attr('disabled', false);
        });

        $(this).toggleClass('fa-edit');
    });

    // Submit both forms on the clinic edit page (sidebar and main)
    $(".multi-submit").click(function (e) {
        // Prevent singular submit
        e.preventDefault();
        //$(this).attr('disabled', true);

        // Find all forms on this page
        var forms = $(this).parents('body').find('form.multi-part-form');

        // Submit all forms
        if($("[name='telephone']").val() != '' && $("[name='telephone']").val().length == 11){
            $.each(forms, function (index, form) {
                if(index > 0){
                    $.ajax({
                        type: "POST",
                        url: $(this).attr('action'),
                        data: $(form).serialize(),
                        success: function (data) {
                            $(forms).first().submit();
                        },
                        error: function (x, h, r) {
                            console.log(x, h, r);
                        }
                    });
                }
            });
        }else{
            if($("p.danger").length == 0){
                $("[name='telephone']").css({
                    border: 'solid 1px red'
                }).after("<p class='danger'>This is a required field</p>");
            }
        }
    });

    // Append text of file path to file upload buttons
    $(".btn-file").find('input').change(function () {
        var fullPath = $(this).val();
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }

            $(this).parent().find('span').text(filename);
        }
    });

    // Add buying options on clinic administration page
    $("#addBuyingOption").click(function () {
        // Get next buying options number
        var nextNum = $(this).parent().siblings('#new-buying-options').find('.row').length + 1;

        // Create new row
        var row = $("<div class='row'></div>");
        var name = $("<div class='col-9'><input name='buyingoptions[" + nextNum + "][name]' type='text' step='any' class='form-control rounded-0' placeholder='Buying Option Name'></div>");
        var price = $("<div class='col-3'><div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text rounded-0'>£</span></div><input name='buyingoptions[" + nextNum + "][price]' type='number' class='form-control text-center rounded-0' placeholder='0.00'></div></div>");

        // Attach fields to new row
        row.append(name, price);

        // Append new row
        $("#new-buying-options .form-group").append(row);
    });

    // Toggle between buying option types
    $("input[name='buying_option_type']").click(function () {
        if ($(this).val() == "single") {
            $(".new-buying-options").addClass('collapse');
            $(".single-price").show();
            $("[name*='buyingoptions']").val("");
            $("#addBuyingOption").addClass('collapse')

        } else {
            // Isn't single, must be multiple
            $(".new-buying-options").removeClass('collapse');
            $(".single-price").hide();
            $("[name='single_price']").val("");
            $("#addBuyingOption").removeClass('collapse')
        }
    });

    // Prevent some buttons from submitting their forms
    $(".no-submit").click(function (e) {
        e.preventDefault();
    });

    // Sort Select boxes alphabetically
    var options = $('.service-form .form-group select option');

    var arr = options.map(function (_, o) {
        return {t: $(o).text(), v: o.value};
    }).get();

    arr.sort(function (o1, o2) {
        return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
    });

    options.each(function (i, o) {
        o.value = arr[i].v;
        $(o).text(arr[i].t);
    });

    $(".autocomplete-input").keyup(function(){
       var term = $(this).val().toLowerCase();

       $(".autocomplete-results .col-12").each(function(index){
          var val = $(this).text();

          if(term.length > 2){
              if(val.toLowerCase().includes(term)){
                  $(this).show();
                  $(".autocomplete-results").show();
              }else{
                  $(this).hide();
              }
          }else{
              $(this).hide();
              $(".autocomplete-results").hide();
          }
       });

        $(".autocomplete-results .col-12").click(function(){

        })
    })

    $("[name='filter']").keyup(function(){
        var term = $(this).val().toLowerCase();
        var clinics = $("#user_id option");

        if(term.length >= 3){
            clinics.each(function(){
                var name = $(this).text();

                if(!name.toLowerCase().includes(term)){
                    $(this).hide();
                }else{
                    $(this).show();
                }

                clinics.attr('selected', false);
            })

            $(".select-all").attr("disabled", false);
        }else{
            clinics.show();
            $(".select-all").attr("disabled", true);
        }
    })
})(jQuery);
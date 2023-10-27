@extends('layouts.frontend_updated')
@section('content')

<section class="page-header-section">
    <img class="header_image" src="{{ asset('new_css/img/home/finance-bg.jpg') }}" alt="header images" />
    <div class="header_title">
        <h2>EQUIPMENT FINANCE</h2>
    </div>
</section>

    <section class="contact_us-section">

        @if (session()->has('alert-success'))
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="float:none;margin:auto;">
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('alert-success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="">

                <div class="col-lg-12">
                    <div class="about_right-content-sec mb-4">
                        <p>
                            Asset finance is a type of loan available for your business to acquire the assets required to
                            achieve its goals. This form of finance can be a useful way to get essential or expensive equipment
                            that your business doesn’t have the cash to purchase outright.
                        </p>

                        <p>
                            <img class="tickicon" src="{{ asset('new_css/img/home/tickicon.png') }}" />Typical terms of 1-5 years
                        </p>

                        <p>
                            <img class="tickicon" src="{{ asset('new_css/img/home/tickicon.png') }}" />Lend from £1000-£150,000
                        </p>

                        <p>
                            <img class="tickicon" src="{{ asset('new_css/img/home/tickicon.png') }}" />All business considered - including start ups
                        </p>
                       
                
                        <p>
                            Cosmetic Finance Group can help you with equipment finance. Just fill in the form below and one of
                            our agents will be in touch within 24 working hours.
                        </p>
                    </div>
                </div>

               

                <div class="col-lg-12 contact-form second" style="float:none;margin:auto;">
                    <h2>EQUIPMENT FINANCE</h2>
                    


                    {!! Form::open([
                        'route' => 'equipment-finance.store',
                        'method' => 'post',
                        'novalidate' => '',
                        'files' => true,
                        'class' => 'needs-validation contact',
                    ]) !!}

                    <section class="step-1">

                    <h4 class="mb-2">Primary Contact Information</h4>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Your Name*</label>
                                <input type="text" name="name" required class="form-control">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="email">Email Address*</label>
                                <input type="email" name="email" class="form-control" required>
                                @if ($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                                
                            </div>

                            <div class="col-6">
                                <label for="phone">Phone Number*</label>
                                <input type="text" name="phone" class="form-control" required>
                                @if ($errors->has('phone'))
                                    <div class="error">{{ $errors->first('phone') }}</div>
                                @endif
                              
                            </div>
                        </div>
                    </div>



                    <div class="form-group pb-4">
                        <button type="submit" name="next" class="btn btn-default g-recaptcha nextStep">Next</button>
                    </div>

                    </section>

                    <section class="step-2" style="display: none;">
                        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="company">Address*</label>
                            </div>

                            <div class="col-12 mb-2">
                                <input type="text" required name="contact_address_line_1" class="form-control" placeholder="Address Line 1">
                            </div>

                            <div class="col-12 mb-2">
                                <input type="text" required name="contact_address_line_2" class="form-control" placeholder="Address Line 2">
                            </div>

                            <div class="col-6">
                                <input type="text" required name="contact_city" class="form-control" placeholder="City">
                            </div>

                            <div class="col-6">
                                <input type="text" required name="contact_zip_code" class="form-control" placeholder="Postal / Zip Code">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                         

                            <div class="col-6">
                                <div>
                                    <label for="company">Are you a home owner?*</label>
                                </div>

                                <label class="checkbox-inline">
                                    <input type="radio" required class="form-check-input" name="home_owner" value="Yes">
                                    <label class="form-check-label">Yes</label>
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="radio" required class="form-check-input" name="home_owner" value="No">
                                    <label class="form-check-label">No</label>
                                  </label>
                            </div>

                            <div class="col-6">
                                <label for="company">DOB*</label>
                                <input type="text" required name="dob" class="form-control datepicker">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">Please list any existing lending you have</label>
                                <textarea autocomplete="off" name="existing_lending" class="form-control" style="resize: both; min-height: 52px; height: 52px;"></textarea>
                                <em class="fs-6">Include bank loans, overdrafts, director loans & any other loans</em>
                            </div>
                        </div>
                    </div>

                    

                  
                   

                    <h4 class="mb-2 mt-5">Company Information</h4>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="company">Company*</label>
                                <input type="text" name="company" class="form-control" required>
                                @if ($errors->has('company'))
                                    <div class="error">{{ $errors->first('company') }}</div>
                                @endif
                                
                            </div>

                            <div class="col-6">
                                <label for="phone">Website</label>
                                <input type="text" name="website" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="company">Company Address</label>
                            </div>

                            <div class="col-12 mb-2">
                                <input type="text" name="address_line_1" class="form-control" placeholder="Address Line 1">
                            </div>

                            <div class="col-12 mb-2">
                                <input type="text" name="address_line_2" class="form-control" placeholder="Address Line 2">
                            </div>

                            <div class="col-6">
                                <input type="text" name="city" class="form-control" placeholder="City">
                            </div>

                            <div class="col-6">
                                <input type="text" name="zip_code" class="form-control" placeholder="Postal / Zip Code">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="company">Registered Office Address (if different to above)</label>
                            </div>

                            <div class="col-12 mb-2">
                                <input type="text" name="reg_address_line_1" class="form-control" placeholder="Address Line 1">
                            </div>

                            <div class="col-12 mb-2">
                                <input type="text" name="reg_address_line_2" class="form-control" placeholder="Address Line 2">
                            </div>

                            <div class="col-6">
                                <input type="text" name="reg_city" class="form-control" placeholder="City">
                            </div>

                            <div class="col-6">
                                <input type="text" name="reg_zip_code" class="form-control" placeholder="Postal / Zip Code">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                         

                            <div class="col-6">
                                <div>
                                    <label for="company">Trading Style*</label>
                                </div>

                                <label class="checkbox-inline">
                                    <input type="radio" required class="form-check-input" name="trade_style" value="Limited Company">
                                    <label class="form-check-label">Limited Company</label>
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="radio" required class="form-check-input" name="trade_style" value="Sole Trader">
                                    <label class="form-check-label">Sole Trader</label>
                                  </label>
                            </div>

                            <div class="col-6">
                                <label for="company">Company Registration Number (if applicable)</label>
                                <input type="text" name="company_reg_number" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">When was your business established</label>
                                <input type="text" name="business_established_date" class="form-control datepicker">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="name">Accounts for previous year</label>
                                </div>
                                
                                <label style="background-color: #B29961;color: white;" class="btn btn-default btn-file pull-right"
                                style="margin-right: 10px;">
                                    <span><i class="fa fa-upload mr-2"></i> Upload</span> 
                                    <input type="file" name="previous_year" id="previous_year" style="display: none;">
                                </label>
                            </div>

                            <div class="col-6">
                                <label for="name">Annual Turnover*</label>
                                <input type="text" required name="annual_turnover" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">Gross profit</label>
                                <input type="text" name="gross_profit" class="form-control">
                            </div>

                            <div class="col-6">
                                <label for="name">Net profit</label>
                                <input type="text" name="net_profit" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">Details of any other Directors (if applicable)</label>
                                <textarea autocomplete="off" name="any_other_directors" class="form-control" style="resize: both; min-height: 52px; height: 52px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div>
                                    <label for="company">Do you give consent for credit search*</label>
                                </div>

                                <label class="checkbox-inline">
                                    <input type="radio" required class="form-check-input" name="credit_search" value="Yes">
                                    <label class="form-check-label">Yes</label>
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="radio" required class="form-check-input" name="credit_search" value="No">
                                    <label class="form-check-label">No</label>
                                  </label>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div>
                                    <label for="company">Bank Statements</label>
                                </div>

                                <label style="background-color: #B29961;color: white;" class="btn btn-default btn-file pull-right"
                                style="margin-right: 10px;">
                                    <span><i class="fa fa-upload mr-2"></i> Upload</span> 
                                    <input type="file" name="bank_statement" id="bank_statement" style="display: none;">
                                </label>

                                <p class="fs-6" style="text-align: left;border-bottom:unset;padding-top: 10px;">
                                    <em>Please upload recent three months of bank statements or alternatively email to admin@cosmeticfinancegroup.co.uk</em>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="name">Needs indentified*</label>
                                    <textarea autocomplete="off" required name="needs_identified" class="form-control" style="resize: both; min-height: 52px; height: 52px;"></textarea>
                                    <em>Please describe what equipment you wish to purchase</em>
                                </div>
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Company you are purchasing from*</label>
                                    <input type="text" required name="purchasing_from" class="form-control">
                                </div>
    
                                <div class="col-6">
                                    <label for="name">Cost of equipment*</label>
                                    <input type="text" required name="cost_of_equipment" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="name">Term required for repayment</label>
                                    <input type="text" name="term_required" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Return on Investment</label>
                                    <textarea autocomplete="off" name="return_on_investment" class="form-control" style="resize: both; min-height: 52px; height: 52px;"></textarea>
                                    <em>Please describe how you feel this equipment will benefit your business and how much additional revenue you project it will generate</em>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="name">Any other information you feel relevant</label>
                                    <textarea autocomplete="off" name="other_info" class="form-control" style="resize: both; min-height: 52px; height: 52px;"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <em>
                                        DECLARATION: By completing and signing this proposal form, the business & its owners certify that all information and supporting documents submitted aretrue, correct and complete. This personal information will be used by Cosmetic Finance Group or any of its partners, agents or affiliates for the purpose of conducting credit reference checks in respect of the individuals included on the proposal form. 
                                    </em>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="name">Signature</label>
                                    <div id="signature-pad" class="signature-pad" style="width: 100%;">
                                        <div class="signature-pad--body">
                                            <canvas></canvas>
                                        </div>
                                        <div class="signature-pad--footer">
                                            <div class="description">Sign above</div>
                    
                                            <div class="signature-pad--actions">
                                                <div class="column">
                                                    <input type="button" value="Clear" data-action="clear"  class="button clear btn btn-secondary">
                                                    
                                                    {{-- <button type="button" class="button"
                                                        data-action="change-background-color">Change background
                                                        color</button>
                                                    <button type="button" class="button"
                                                        data-action="change-color">Change color</button>
                                                    <button type="button" class="button"
                                                        data-action="change-width">Change width</button> --}}
                                                        <input type="button" value="Undo" data-action="undo"  class="button clear btn btn-secondary">
                                                  
                    
                                                </div>
                    
                                                <input type="hidden" name="signature" class="signature">
                    
                                                <div class="column" style="display: none;">
                                                    <button type="button" class="button save save-png"
                                                        data-action="save-png">Save as PNG</button>
                                                    <button type="button" class="button save"
                                                        data-action="save-jpg">Save as JPG</button>
                                                    <button type="button" class="button save"
                                                        data-action="save-svg">Save as SVG</button>
                                                    <button type="button" class="button save"
                                                        data-action="save-svg-with-background">Save as SVG with
                                                        background</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Untitled</label>
                                    <input type="text" name="Untitled" class="form-control datepicker">
                                </div>
                            </div>
                        </div>

                        <div class="form-group pb-4">
                            <button type="button" class="back btn btn-default g-recaptcha">Back</button>
                            <button type="submit" name="send" class="btn btn-default g-recaptcha">Submit</button>
                        </div>
                    </section>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-css')
    <style>
        .error {
            color: red;
        }
        .tickicon{
            width: 30px !important;
        }
    </style>
     <link rel="stylesheet" href="{{ asset('css/signature-pad.css') }}">
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection

@section('page-js')
    <script src="{{ asset('js/signature_pad.umd.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $( ".datepicker" ).datepicker();
       
        // signaturePad js start
        const wrapper = document.getElementById("signature-pad");
        const clearButton = wrapper.querySelector("[data-action=clear]");
        // const changeBackgroundColorButton = wrapper.querySelector("[data-action=change-background-color]");
        // const changeColorButton = wrapper.querySelector("[data-action=change-color]");
        // const changeWidthButton = wrapper.querySelector("[data-action=change-width]");
        const undoButton = wrapper.querySelector("[data-action=undo]");
        const savePNGButton = wrapper.querySelector("[data-action=save-png]");
        const saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
        const saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
        const saveSVGWithBackgroundButton = wrapper.querySelector("[data-action=save-svg-with-background]");
        const canvas = wrapper.querySelector("canvas");
        const signaturePad = new SignaturePad(canvas, {
            // It's Necessary to use an opaque color when saving image as JPEG;
            // this option can be omitted if only saving as PNG or SVG
            backgroundColor: 'rgb(255, 255, 255)'
        });

        // Adjust canvas coordinate space taking into account pixel ratio,
        // to make it look crisp on mobile devices.
        // This also causes canvas to be cleared.
        function resizeCanvas() {
            // When zoomed out to less than 100%, for some very strange reason,
            // some browsers report devicePixelRatio as less than 1
            // and only part of the canvas is cleared then.
            const ratio = Math.max(window.devicePixelRatio || 1, 1);

            // This part causes the canvas to be cleared
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);

            // This library does not listen for canvas changes, so after the canvas is automatically
            // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
            // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
            // that the state of this library is consistent with visual state of the canvas, you
            // have to clear it manually.
            //signaturePad.clear();

            // If you want to keep the drawing on resize instead of clearing it you can reset the data.
            signaturePad.fromData(signaturePad.toData());
        }

        // On mobile devices it might make more sense to listen to orientation change,
        // rather than window resize events.
        window.onresize = resizeCanvas;
        //resizeCanvas();

        function download(dataURL, filename) {
            const blob = dataURLToBlob(dataURL);
            const url = window.URL.createObjectURL(blob);

            const a = document.createElement("a");
            a.style = "display: none";
            a.href = url;
            a.download = filename;

            document.body.appendChild(a);
            a.click();

            window.URL.revokeObjectURL(url);
        }

        // One could simply use Canvas#toBlob method instead, but it's just to show
        // that it can be done using result of SignaturePad#toDataURL.
        function dataURLToBlob(dataURL) {
            // Code taken from https://github.com/ebidel/filer.js
            const parts = dataURL.split(';base64,');
            const contentType = parts[0].split(":")[1];
            const raw = window.atob(parts[1]);
            const rawLength = raw.length;
            const uInt8Array = new Uint8Array(rawLength);

            for (let i = 0; i < rawLength; ++i) {
                uInt8Array[i] = raw.charCodeAt(i);
            }

            return new Blob([uInt8Array], {
                type: contentType
            });
        }

        clearButton.addEventListener("click", () => {
            signaturePad.clear();
        });

        undoButton.addEventListener("click", () => {
            const data = signaturePad.toData();

            if (data) {
                data.pop(); // remove the last dot or line
                signaturePad.fromData(data);
            }
        });

        // changeBackgroundColorButton.addEventListener("click", () => {
        //     const r = Math.round(Math.random() * 255);
        //     const g = Math.round(Math.random() * 255);
        //     const b = Math.round(Math.random() * 255);
        //     const color = "rgb(" + r + "," + g + "," + b + ")";

        //     signaturePad.backgroundColor = color;
        //     const data = signaturePad.toData();
        //     signaturePad.clear();
        //     signaturePad.fromData(data);
        // });

        // changeColorButton.addEventListener("click", () => {
        //     const r = Math.round(Math.random() * 255);
        //     const g = Math.round(Math.random() * 255);
        //     const b = Math.round(Math.random() * 255);
        //     const color = "rgb(" + r + "," + g + "," + b + ")";

        //     signaturePad.penColor = color;
        // });

        // changeWidthButton.addEventListener("click", () => {
        //     const min = Math.round(Math.random() * 100) / 10;
        //     const max = Math.round(Math.random() * 100) / 10;

        //     signaturePad.minWidth = Math.min(min, max);
        //     signaturePad.maxWidth = Math.max(min, max);
        // });

        savePNGButton.addEventListener("click", () => {
            if (signaturePad.isEmpty()) {
                //alert("Please provide a signature first.");
            } else {
                const dataURL = signaturePad.toDataURL();
                $(".signature").val(dataURL);
                //download(dataURL, "signature.png");
            }
        });

        saveJPGButton.addEventListener("click", () => {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                const dataURL = signaturePad.toDataURL("image/jpeg");
                download(dataURL, "signature.jpg");
            }
        });

        saveSVGButton.addEventListener("click", () => {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                const dataURL = signaturePad.toDataURL('image/svg+xml');
                download(dataURL, "signature.svg");
            }
        });

        saveSVGWithBackgroundButton.addEventListener("click", () => {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                const dataURL = signaturePad.toDataURL('image/svg+xml', {
                    includeBackgroundColor: true
                });
                download(dataURL, "signature.svg");
            }
        });
        // signaturePad js end


        $(".contact").validate({
            submitHandler: function(event ) {

                if($('.step-2').css('display') == 'none')
                {
                    $('.step-1').hide();
                    $('.step-2').show();
                    resizeCanvas();

                    $('html, body').animate({
                        scrollTop: $(".contact-form").offset().top
                    }, 1000);
                }
                else{
                    $(".save-png").trigger('click');
                    $('form.contact').submit();
                    event.preventDefault();
                    return false;

                }
                
            }
        });

        $("body").on("submit", "form", function() {
            $(this).submit(function() {
                return false;
            });
            return true;
        });


        $(".back").click(function(){
            $('.step-2').hide();
            $('.step-1').show();

            $('html, body').animate({
                scrollTop: $(".contact-form").offset().top
            }, 1000);
        });
    </script>
@endsection

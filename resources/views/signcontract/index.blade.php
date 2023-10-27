@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 py-5">
                <h2 class="border-bottom pb-3">Contract Details</h2>
            </div>
        </div>

        @if ($errors->any())
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        See below for detailed information
                    </div>
                </div>
            </div>
        @endif

        <div class="col-12">
            @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error'); ?>
            @endif
        </div>

        <div class="row">
            <div class="col-12 request-form" style="padding-bottom: 15px;">
                {!! Form::open([
                    'route' => ['signcontract.update', $id],
                    'method' => 'patch',
                    'class' => 'myForm',
                    'id' => 'myForm',
                    'files' => true,
                ]) !!}

                <div class="col-12">
                    <p>This Agreement (“Agreement”) is made and entered into as of the date written below and by and between
                        Cosmetic Finance Group Limited (“CFG”) and IAR <input type="text"
                            class="form-control inputFields" required name="iar" />
                        (Introducer Appointed
                        Representative, “IAR”), (each a “Party” and collectively the “Parties”) with regard to the
                        following:
                    </p>

                    <p class="mt-3">
                        WHEREAS, <input type="text" class="form-control inputFields" required name="whereas" /> is
                        engaged, on an
                        independent
                        contractor basis, to act as an IAR of CFG, and WHEREAS,
                        as an IAR of CFG, <input type="text" class="form-control inputFields" required name="cfg" />
                        shall solicit clients
                        for the COMMERCIAL CREDIT BROKER services provided by
                        CFG, and WHEREAS, <input type="text" class="form-control inputFields" required
                            name="whereas_cfg" />
                        and CFG wish to clarify
                        the capacity in which <input type="text" class="form-control inputFields" required
                            name="capacity" /> shall serve CFG and
                        the
                        terms and conditions of this agreement with CFG.
                    </p>


                    <p class="mt-3">
                    <h5>AGREEMENT</h5>
                    In consideration of the foregoing and the mutual covenants contained herein and for other good and
                    valuable consideration, the parties agree as follows:
                    </p>

                    <ol>
                        <li><input type="text" class="form-control inputFields" required name="duties" /> Duties: IAR
                            shall:
                            <ul>
                                <li>Become an IAR of CFG;</li>
                                <li>Execute for CFG customers’ NO advisory services;</li>
                                <li>Perform such other duties, in accordance with CFG'S procedures, as are customarily
                                    performed by
                                    one holding the position of an IAR in a retail firm; and
                                    e. Perform faithfully, industriously and to the best of their ability, all duties that
                                    may be
                                    required of <input type="text" class="form-control inputFields" required
                                        name="pursuant_agreement" /> pursuant to this
                                    Agreement.</li>
                            </ul>
                        </li>
                        <li>Compliance with Rules and Regulations. IAR agrees that when sourcing leads, <input
                                type="text" class="form-control inputFields" required name="leads" /> will strictly
                            adhere to all of the guidelines and procedures established by CFG for the conduct of its IARs as
                            set
                            forth in CFG'S Policies & Procedures Manual; as such manual may be modified from time to time.
                            Pursuant to those requirements, credit services that have not been approved for inclusion in
                            CFG'S
                            program shall not be offered or sold through CFG locations. <input type="text"
                                class="form-control inputFields" required name="cfg_location" /> will also strictly adhere
                            to all
                            rules, regulations, and reporting requirements of CFG & any other relevant regulatory
                            authorities in
                            which <input type="text" class="form-control inputFields" required name="in_which" /> is
                            registered with , and all
                            procedures of any lead broker with which CFG may become
                            associated at any time during the term of this Agreement.</li>

                        <li>
                            Insurance and Licenses. <input type="text" class="form-control inputFields" required
                                name="licenses" /> shall be
                            responsible for maintaining all individual securities
                            registrations required for <input type="text" class="form-control inputFields" required
                                name="registrations_required" /> to carry
                            out their duties hereunder.
                        </li>

                        <li>
                            Supervision. <input type="text" class="form-control inputFields" required
                                name="supervision" />
                            shall be an IAR of CFG ,
                            and with the exception of FCA regulation, shall be
                            subject in all respects to the supervision, direction and control of the management of CFG.
                            <input type="text" class="form-control inputFields" required name="management_of_cfg" />
                            duties as an IAR are exclusively supervised by CFG for CFG..
                        </li>

                        <li>
                            Location. IAR will render his/her duties under this Agreement at the locations of <input
                                type="text" class="form-control inputFields" required name="locations_of" /> as
                            designated from time to time.
                        </li>

                        <li>
                            Compensation. As full payment for CFG services under this Agreement, CFG will charge <input
                                type="text" class="form-control inputFields" required name="cfg_will_charge" /> IAR
                            an
                            Application Fee <input type="text" class="form-control inputFields" required
                                name="application_fee" /> the sum as described
                            in the attached Exhibit "A." The Application Fee may be
                            changed at any time at the sole discretion of CFG, provided, however, that no change may be made
                            retroactively.
                            With respect to fees payable to <input type="text" class="form-control inputFields" required
                                name="payable_to" /> , CFG
                            shall make no payment to IAR . No finance will be
                            payable
                            to <input type="text" class="form-control inputFields" required name="payable_to_relating" />
                            relating to products or services
                            for which <input type="text" class="form-control inputFields" required
                                name="services_for_which" />
                            is not fully licensed and or
                            approved to
                            provide.
                            On approval of finance for <input type="text" class="form-control inputFields" required
                                name="finance_for" /> customer's
                            CFG will retain 10% of the total sum approved by the
                            lender and will retain 60% of such sum with the remaining 40% being retained by the lender.
                            Please
                            see Fee examples in Exhibit 'A'.
                        </li>

                        <li>
                            Trade Secrets. With the exception of the compensation described in paragraph 6 above, CFG
                            will be
                            entitled to all of the benefits or profits arising from, or incident to, all of the work,
                            services
                            and advice <input type="text" class="form-control inputFields" required name="and_advice" />
                            provides hereunder. In
                            consideration of the agreement of CFG to engage <input type="text"
                                class="form-control inputFields" required name="to_engage" /> as
                            provided herein, and as an expressed condition thereto, <input type="text"
                                class="form-control inputFields" required name="condition_thereto" /> agrees that, except at
                            the
                            written
                            direction of CFG , <input type="text" class="form-control inputFields" required
                                name="direction_of_cfg" /> will not at any
                            time after the termination of this Agreement, either
                            directly or indirectly, divulge, disclose, or communicate any trade secrets. Trade secrets shall
                            mean any information which is not generally known or publicly available outside of CFG
                            concerning
                            any matters relating to the affairs or business of CFG including, without limitation the
                            generality
                            of the foregoing information concerning lenders , lenders customers accounts or portfolios,
                            and/or
                            any other information concerning the business of the lender, its manner of operation, its plans,
                            or
                            other data.
                        </li>

                        <li>
                            Books and Records. IAR agrees that all memoranda, notes, records or other documents made or
                            compiled by IAR, or made available to IAR during the term of this Agreement concerning the
                            business
                            of the lender, or any account or portfolios of any of the lender's customers, shall be delivered
                            by
                            IAR to the lender upon the termination of IAR's status as an independent contractor or at any
                            other
                            time at the lender's request, and that none of such records, nor any part of them, is to be
                            removed
                            from the branch at which IAR is engaged, either in original form or in duplicated or copied
                            form,
                            and that the names, addresses, and other facts in such records are not to be transmitted
                            verbally
                            except as necessary in the ordinary course of conducting business for the lender.
                        </li>

                        <li>
                            Unfair Competition. IAR also agrees that, during his/her engagement under this Agreement and
                            within two (2) year after the termination of this Agreement, IAR will not either directly or
                            indirectly, for his/her own account or as an agent, representative, servant or IAR, officer,
                            director or principal shareholder of any corporation or member of any firm, or participant in
                            any
                            venture which:
                            <ul>
                                <li>
                                    induce any person employed by or contracted with CFG to leave such
                                    employment/engagement.
                                </li>
                                <li>
                                    engage, hire, employ or solicit the employment of any of the IARs of CFG affiliates,
                                    other
                                    than
                                    on behalf of CFG; or
                                </li>
                                <li>
                                    interfere with, disrupt or attempt to disrupt the relationship, contractual or
                                    otherwise,
                                    between
                                    CFG and any existing or prospective customer of the lender.
                                </li>
                            </ul>
                        </li>

                        <li>
                            IAR Covenants. The parties acknowledge that upon termination of registration, IAR will not
                            solicit business from CFG, specifically customers of the lender at the time of the termination
                            of
                            registration. While some persons may desire to move their accounts to IAR if IAR continues in
                            the
                            business and this Agreement does not prevent that, IAR will do nothing to encourage,
                            communicate, or
                            initiate those transfers.
                        </li>

                        <li>
                            Modification and Waiver. No waiver or modification of this Agreement shall be valid unless
                            in
                            writing and duly executed by the party to be charged therewith. Waiver by either party hereto of
                            any
                            breach or default by the other party or any of the terms and provisions of this Agreement shall
                            not
                            operate as a waiver of any other breach or default, whether similar to, or different from, the
                            breach or default waived.
                        </li>

                        <li>
                            Entire Agreement. This Agreement and it's attachments constitutes the entire Agreement
                            between
                            the parties hereto with respect to IAR's engagement with CFG and supersedes all prior agreements
                            and
                            understandings, written or oral, between IAR and CFG with respect to such affiliation, including
                            any
                            written agreements previously executed by IAR and CFG. This Agreement and the rights and
                            obligations
                            hereunder shall be assignable or transferable by CFG at the sole option of CFG. This Agreement
                            may
                            only be amended in writing signed by duly authorized representatives of the parties hereto.
                        </li>

                        <li>
                            Termination. This Agreement may be terminated at any time by IAR or CFG. However, IAR hereby
                            agrees and acknowledges that the provisions of paragraphs 8, 9, 10 and 12 of this Agreement
                            shall
                            survive the termination of this Agreement and of IAR's association with CFG hereunder,
                            irrespective
                            of the reason therefore, in accordance with the terms of such paragraphs. Notwithstanding
                            anything
                            else herein to the contrary, IAR's registration may be terminated at will by IAR or by CFG at
                            any
                            time. Nothing herein nor in any other document, including without limitation, any personnel
                            manual
                            of CFG constitutes a guarantee of continued registration, changes the "at will" status of IAR's
                            registration, or affects the ability of IAR or of CFG to terminate IAR's registration at any
                            time.
                        </li>

                        <li>
                            Transfer and Assignment. This Agreement and the rights and obligations hereunder shall be
                            assignable or transferable by CFG at the sole option of CFG.
                        </li>

                        <li>
                            Governing Law. The terms of this Agreement shall be construed in accordance with and governed by
                            the laws of England & Wales and exclusive venue shall be in Manchester for any dispute arising
                            in
                            connection with or related to this agreement.
                        </li>

                        <li>
                            Counterparts. This Agreement may be executed in counterparts and all documents so executed shall
                            constitute one agreement binding on all of the parties hereto, notwithstanding that all of the
                            parties are not signatories to the original or the same counterparts.
                        </li>
                    </ol>

                    <p>
                        IN WITNESS WHEREOF, the parties hereto have executed this Agreement on the date set forth above. I
                        acknowledge that I have received the IAR manual.
                    </p>

                    <h5>ADVISOR REPRESENTATIVE</h5>

                    <div class="from-group col-md-8 row">
                        <label>Signature Date</label>
                        <input type="text" required name="signature_date" class="form-control dateFields">
                    </div>

                    <div class="from-group col-md-8 row">
                        <label>IAR Name (print)</label>
                        <input type="text" required name="iar_name" class="form-control">
                    </div>



                    <div class="from-group col-md-8 row">
                        <label>Signature</label>
                        <div id="signature-pad" class="signature-pad">
                            <div class="signature-pad--body">
                                <canvas></canvas>
                            </div>
                            <div class="signature-pad--footer">
                                <div class="description">Sign above</div>

                                <div class="signature-pad--actions">
                                    <div class="column">
                                        <button type="button" class="button clear btn btn-secondary"
                                            data-action="clear">Clear</button>
                                        {{-- <button type="button" class="button"
                                            data-action="change-background-color">Change background
                                            color</button>
                                        <button type="button" class="button"
                                            data-action="change-color">Change color</button>
                                        <button type="button" class="button"
                                            data-action="change-width">Change width</button> --}}
                                        <button type="button" class="button btn btn-secondary"
                                            data-action="undo">Undo</button>

                                    </div>

                                    <input type="hidden" name="signature" class="signature">

                                    <div class="column" style="display: none;">
                                        <button type="button" class="button save save-png" data-action="save-png">Save
                                            as
                                            PNG</button>
                                        <button type="button" class="button save" data-action="save-jpg">Save as
                                            JPG</button>
                                        <button type="button" class="button save" data-action="save-svg">Save as
                                            SVG</button>
                                        <button type="button" class="button save"
                                            data-action="save-svg-with-background">Save as SVG with
                                            background</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="from-group col-md-8 row">
                        <label>Date</label>
                        <input type="text" required name="date" class="form-control dateFields">
                    </div>



                    Exhibit “A” – <strong>Compensation Schedule</strong>
                    <p>
                        IAR Agreement
                    </p>

                    <p class="mt-3">
                        CFG will be compensated by Fees from funding received by IAR for services they provide to
                        consumers.
                        The sum equivalent to 10% of the approved lending will be retained and distributed at the rate
                        of
                        60% to CFG and 40% retained by the lender.
                    </p>

                    <p class="mt-3">
                        <strong>Example;</strong>
                    </p>

                    <table>
                        <tr>
                            <td>Funding Amount</td>
                            <td>£1000.00</td>
                        </tr>
                        <tr>
                            <td>10% Fee</td>
                            <td>£100.00</td>
                        </tr>
                        <tr>
                            <td>Fee to CFG</td>
                            <td style="text-align: right;">£60.00</td>
                        </tr>
                        <tr>
                            <td>Fee to Lender</td>
                            <td style="text-align: right;">£40.00</td>
                        </tr>
                        <tr>
                            <td>Funds sent to IAR</td>
                            <td>£900.00</td>
                        </tr>
                    </table>


                    <p class="mt-3">
                    <table>
                        <tr>
                            <td>Application Fee</td>
                            <td>£150 (non refundable)</td>
                        </tr>
                    </table>
                    </p>

                    <p class="mt-3">
                        £50 monthly fee once live (minimum 12 months contract)
                        thereafter, 3 months notice if you wish to cancel (to be given in writing)
                    </p>

                    <p class="mt-3">
                        These schedules are subject to change at any time.
                    </p>

                    <button type="button" onclick="submitForm();"
                        class="btn btn-primary btn-lg btn-block-sm mt-3 float-right">SUBMIT</button>
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/signature-pad.css') }}">
    <link rel="stylesheet" href="{{ asset('css//bootstrap-datepicker3.min.css') }}">
    <style>
        .inputFields {
            display: inline-block;
            width: auto;
            padding: 0;
            font-size: small;
        }

        label.error {
            color: red;
            font-style: italic;
        }
    </style>
@endsection

@section('page-js')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/signature_pad.umd.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <script>
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
        resizeCanvas();

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

        $('.dateFields').datepicker({
            endDate: '+0d',
            autoclose: true
        });

        function submitForm() {
            $(".save-png").trigger('click');
            $('form#myForm').submit();
        }


        $(".myForm").validate();
    </script>
@endsection

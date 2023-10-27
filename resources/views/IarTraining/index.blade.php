@extends("layouts.frontend")
@section("content")
    <div class="container">
        <div class="row border-bottom py-3 mt-3">
            <div class="col-12">
                <h1>IAR TRAINING</h1>
            </div>
        </div>

        <div class="video-information-sec my-5 video-container">
            <div class="video-foreground" id="ytplayer"></div>      
        </div>

        <div class="my-5">
            @if(empty($QuizReviewedInfo))
            <div class="from-group downloadable-sec" style="display: none;">
                <label>Signature*</label>


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

                @if (isset($companyDetailsmodel->signature) && $companyDetailsmodel->signature != '')
                    <img style="height: 180px;"
                        src="{{ asset('uploads/' . $companyDetailsmodel->signature) }}" />
                @endif

            </div>

            {!! Form::open([
                'route' => 'iartraining.confirmReviewedInfo',
                'method' => 'post',
                'novalidate' => '',
                'files' => true,
                'class' => 'needs-validation contact',
            ]) !!}
            
            <input type="hidden" name="clinic_id" value="{{ request()->id }}">
            <input type="hidden" name="signature" class="signature">

            <input type="checkbox" class="inputDisabled" disabled class="mt-4" required name="is_reviewed_information" value="1"> I
            confirm that I have reviewed and understood all information within the three
            training manuals*
            <br />
            <button class="btn btn-primary px-5 mt-2 inputDisabled" disabled name="send" onclick="submitForm();" type="button">
                Take Quiz
            </button>

            <p class="fs-6 mb-3 mt-2">
                <em>You are required to watch the entire video before proceeding to complete the quiz.</em>
            </p>

            {!! Form::close() !!}
            @else
                <a href="{{ route('iartraining.takequiz',request()->id) }}" class="btn btn-primary px-5">Quiz</a>
            @endif
         </div>
    </div>
@endsection

@section('page-css')
    <style>
        .video-container{
            /* width:100vw; */
            height:80vh;
            overflow:hidden;
            position:relative;
        }

        .video-container iframe{
            position: absolute;
            top: -60px;
            left: 0;
            width: 100%;
            height: calc(100% + 120px);
        }
    </style>
     <link rel="stylesheet" href="{{ asset('css/signature-pad.css') }}">
@endsection

@section('page-js')
<script src="https://www.youtube.com/iframe_api"></script>
<script src="{{ asset('js/signature_pad.umd.js') }}"></script>
<script>
    var player;
    
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('ytplayer', {
            height: '600',
            width: '100%',
            videoId: 'QPcfSeenWbs',
            playerVars: { 
                'autoplay': 0,
                'controls': 1,
                'rel' : 0,
                'fs' : 0,
            },
            events: {
                'onStateChange': function(event) {
                    if (event.data == YT.PlayerState.PLAYING) {
                        setTimeout(function(){ 
                            $(".downloadable-sec").show();
                            $('.inputDisabled').prop("disabled", false);
                            resizeCanvas();
                        }, 540000);
                    }
                }
            }
        });
    }

    $(document).ready(function () {
        $("body").on("contextmenu",function(e){
            return false;
        });
    });

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

        function submitForm(){
            $(".save-png").trigger('click');
            $(".contact").submit();
        }
</script>
@endsection
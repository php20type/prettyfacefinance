<footer class="container-fluid pb-5 text-center text-md-left">
    <div class="inner container">
        <div class="row">
            <div class=" d-md-block col-md mt-5 border-left border-md-0">
                <h6 class="text-uppercase mb-5">Navigate</h6>

                <nav class="nav flex-column">
                    <a class="nav-link px-0" href="/">HOME</a>
                    <a class="nav-link px-0" href="/practioner-information">PRACTIONER INFO</a>
                    <a class="nav-link px-0" href="/clinics">SHOP & APPLY</a>
                    <a class="nav-link px-0" href="/snap-finance">FINANCE</a>
                    <a class="nav-link px-0" href="/faq">FAQ</a>
                    <a class="nav-link px-0" href="/terms-and-conditions">TERMS & CONDITIONS</a>
                    <a class="nav-link px-0" href="/privacy-policy">PRIVACY POLICY</a>
                    <a class="nav-link px-0" href="#">CONTACT US</a>
                    <a class="nav-link px-0" href="/complaints-policy">COMPLAINTS POLICY</a>
                    @guest
                    <a class="nav-link px-0" href="/clinics/request">CLINIC REQUEST FORM</a>
                    @endguest
                </nav>
            </div>
            <div class="col-6 col-md mt-5 border-left border-md-0 px-0 px-md-3 text-sm-left">
                <h6 class="text-uppercase mb-5">Contact Us</h6>

                <nav class="nav flex-column text-shift">
                    <a class="nav-link px-0 active" href="mailto:info@cosmeticfinancegroup.co.uk">
                        <i class="fa fa-envelope"></i> info@cosmeticfinancegroup.co.uk
                    </a>
                    <a class="nav-link px-0" href="tel:01613886107">
                        <i class="fa fa-phone"></i> 0161 388 6107
                    </a>
                    <a class="nav-link px-0 " href="#">
                        <i class="fa fa-map-marker"></i>ATRIUM HOUSE - OFFICE 13<br>
                        574 MANCHESTER ROAD<br>
                        BURY<br>
                        BL9 9SW<br>

                    </a>
                </nav>

                <p style="font-size: 13px;font-style: italic;"><br />If your loan application is successful. Upon
                    completion the lender will pay us a commission.
                    This
                    does
                    not affect the price you pay in any way.</p>
            </div>
            <div class="col-6 col-md mt-5 border-left border-md-0 border-sm-left pr-0 px-md-3 text-sm-left pl-sm-3">

                <h6 class="text-uppercase text-sm-center text-lg-left">Follow Us</h6>
                <ul class="nav d-flex justify-content-center justify-content-md-start">
                    <li class="nav-item">
                        <a class="nav-link pl-md-0" href="https://www.facebook.com/prettyfacefinance" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-md-0" href="https://www.instagram.com/prettyfacefinance/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
            <div class="d-none d-md-block col-md mt-5 border-left border-right border-md-0">
                <h6 class="text-uppercase mb-5"><i class="fa fa-instagram"></i> Instagram</h6>

                <div class="row px-3">
                    <div class="col-12 mb-3 px-0">@Prettyfacefinance</div>
                    <?php
                    #3129459053.1677ed0.5c9773e4dd9e470db233414cb0ca6a34
                    #https://api.instagram.com/v1/users/self/media/recent/?access_token=ACCESS-TOKEN

                    /*$client = new GuzzleHttp\Client();
                    $res = $client->get('https://api.instagram.com/v1/users/self/media/recent/?access_token=3129459053.1677ed0.5c9773e4dd9e470db233414cb0ca6a34');
                    $feed = $res->json();
                    $response = $feed['data'];
                    $limit = 4;
                    $i = 0;

                    foreach($response as $item){
                        if($i == $limit){break;}
                        $image = $item['images']['thumbnail']; //array [thumbnail[width, height, url]
                        $created_at = $item['created_time'];
                        $caption = $item['caption']; //array [id, text, created_time, from[id, full_name, profile_picture, username]]
                        $likes = $item['likes'];

                        echo "<div class='col-6 mb-1 p-0'><img src={$image['url']}></div>"; // Post Image
                        $i++;
                    }*/
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="container-fluid border-top copyright py-3">
    <div class="container">
        <div class="row">
            <div class="col-6 px-0 px-md-3 text-center text-md-left">
                <p>© 2021 Cosmetic Finance Group. All rights reserved</p>
            </div>
            <div class="col-6 px-0 px-md-3 text-center text-md-left">
                <!-- <p class="float-right">
                    Website designed and developed by <em><strong>Visionsharp</strong></em>
                </p> -->
            </div>
        </div>
    </div>
</div>
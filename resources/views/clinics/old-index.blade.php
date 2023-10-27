@extends("layouts.frontend")
@section("content")
    <div class="jumbotron jumbotron-fluid">
        <div id="map"></div>
        <div class="container">
            <div class="row px-3 px-lg-0">
                <div class="card col-lg-6 px-0 rounded-0">
                    <div class="card-header text-center rounded-0">
                        <h3 class="mb-0">FIND A LOCAL APPROVED CLINIC</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('clinics.search')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-9 col-md-9 d-flex pr-0 px-md-3">
                                    <div class="form-group mb-0 w-100">
                                        <label for="">Clinic Name</label>
                                        <input type="text" class="form-control border align-self-end rounded-0 autocomplete-input" name="term">

                                        <div class="row autocomplete-results">
                                            @foreach(App\Clinic::all()->where('visible', 1)->where('approved', 1) as $clinic)
                                                <div class="col-12">
                                                    <a href="/clinics/{{$clinic->id}}">{{$clinic->name}}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 d-flex pl-0 px-md-3">
                                    <button class="btn btn-primary btn-block align-self-end rounded-0">Go</button>
                                </div>
                            </div>
                        </form>

                        <form action="{{route('clinics.search')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-6 col-md-6 d-flex pr-0 px-md-3">
                                    <div class="form-group mb-0 w-100">
                                        <label for="">Your Postcode</label>
                                        @if($postcode)
                                            <input type="text" class="form-control border align-self-end rounded-0" name="postcode" value="{{$term}}">
                                        @else
                                            <input type="text" class="form-control border align-self-end rounded-0" name="postcode">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 d-flex pl-0 px-md-3">
                                    <div class="form-group">
                                        <label for="within">Within: </label>
                                        <select name="within" id="within" class="form-control">
                                            <option value="5" <?php echo $within == 5 ? 'selected' : ''; ?>>5 miles</option>
                                            <option value="10" <?php echo $within == 10 ? 'selected' : ''; ?>>10 miles</option>
                                            <option value="15" <?php echo $within == 15 ? 'selected' : ''; ?>>15 miles</option>
                                            <option value="20" <?php echo $within == 20 ? 'selected' : ''; ?>>20 miles</option>
                                            <option value="25" <?php echo $within == 25 ? 'selected' : ''; ?>>25 miles</option>
                                            <option value="30" <?php echo $within == 30 ? 'selected' : ''; ?>>30 miles</option>
                                            <option value="35" <?php echo $within == 35 ? 'selected' : ''; ?>>35 miles</option>
                                            <option value="40" <?php echo $within == 40 ? 'selected' : ''; ?>>40 miles</option>
                                            <option value="45" <?php echo $within == 45 ? 'selected' : ''; ?>>45 miles</option>
                                            <option value="50" <?php echo $within == 50 ? 'selected' : ''; ?>>50 miles</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 d-flex pl-0 px-md-3">
                                    <button class="btn btn-primary btn-block align-self-end rounded-0">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($search)
        <div class="container">
            <!-- Services offered by... -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">SEARCH RESULTS FOR</a></li>
                    <li class="breadcrumb-item active text-uppercase" aria-current="page">{{$term}}</li>
                </ol>
            </nav>
        </div>
    @else
        <div class="container">
            <!-- Services offered by... -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">VIEWING </a></li>
                    <li class="breadcrumb-item active text-uppercase" aria-current="page">ALL CLINICS</li>
                </ol>
            </nav>
        </div>
    @endif

    <div class="container clinics-list py-2">
        <div class="row">
            @foreach($clinics->where('approved', 1)->where('visible', 1) as $clinic)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                    <a href="/clinics/{{$clinic->id}}">
                        <div class="clinic card px-0 my-3 h-100 rounded-0">
                            <div class="clinic-logo border-bottom d-flex align-items-center">
                                @if($clinic->logo)
                                    <img class="card-img-top" data-src="{{$clinic->logo}}" alt="Card image cap">
                                @else
                                    <img class="card-img-top img-fluid px-3" src="{{asset('img/logo.png')}}" alt="Card image cap">
                                @endif
                            </div>
                            <div class="card-body d-flex flex-wrap align-items-end pb-0">
                                <h5 class="card-title align-self-start">{{$clinic->name}}</h5>
                                <p class="card-text w-100">
                                    {{$clinic->address1}}<br>
                                    {{$clinic->address2}}
                                </p>
                            </div>
                            <div class="card-footer border-0">
                                <small class="text-muted">{{$clinic->postcode}}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        (function ($) {
            var myLazyLoad = new LazyLoad();

            $(document).ready(function () {

                // Pagination
                $(".page-link").click(function (e) {
                    e.preventDefault();

                    var target = $(this).attr("href");
                    var currentPage = parseInt($(this).text());

                    $(".page").hide();
                    $(target).css("display", "flex");
                    $(".page-item").removeClass('active');
                    $(this).parent().addClass('active');
                    $(".pagination-text span").text((((currentPage - 1) * 24) + 1) + " - " + (currentPage * 24));
                });
            })
        })(jQuery);

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPmmOlqol8qs_zsQOdBd1C4iwaK3uKO84&callback=initMap&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x212121&style=element:labels.icon%7Cvisibility:off&style=element:labels.text.fill%7Ccolor:0x757575&style=element:labels.text.stroke%7Ccolor:0x212121&style=feature:administrative%7Celement:geometry%7Ccolor:0x757575&style=feature:administrative.country%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&style=feature:administrative.land_parcel%7Cvisibility:off&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xbdbdbd&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:poi.park%7Celement:geometry%7Ccolor:0x181818&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x616161&style=feature:poi.park%7Celement:labels.text.stroke%7Ccolor:0x1b1b1b&style=feature:road%7Celement:geometry.fill%7Ccolor:0x2c2c2c&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x8a8a8a&style=feature:road.arterial%7Celement:geometry%7Ccolor:0x373737&style=feature:road.highway%7Celement:geometry%7Ccolor:0x3c3c3c&style=feature:road.highway.controlled_access%7Celement:geometry%7Ccolor:0x4e4e4e&style=feature:road.local%7Celement:labels.text.fill%7Ccolor:0x616161&style=feature:transit%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:water%7Celement:geometry%7Ccolor:0x000000&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x3d3d3d&size=480x360"
            async defer></script>

    <script type="text/javascript">
        var options = {
            zoom: 6,
            center: {lat: 53.375536, lng: -8.519380},
            disableDefaultUI: true,
            zoomControl: true,
            mapTypeControlOptions: {
                mapTypeIds: [
                    'roadmap',
                    'styled_map'
                ]
            }
        };

        var map;

        function initMap() {
            console.log("initialising map");

            var styledMapType = new google.maps.StyledMapType(
                [
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#8b8b8b"
                            },
                            {
                                "saturation": "0"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ff0000"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            },
                            {
                                "lightness": "85"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            },
                            {
                                "lightness": "60"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            },
                            {
                                "lightness": "0"
                            },
                            {
                                "weight": "3.19"
                            },
                            {
                                "saturation": "0"
                            },
                            {
                                "gamma": "1.04"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway.controlled_access",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            },
                            {
                                "lightness": "60"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway.controlled_access",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            },
                            {
                                "lightness": "60"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            },
                            {
                                "lightness": "60"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            },
                            {
                                "color": "#ff0000"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#b48620"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "lightness": "100"
                            },
                            {
                                "saturation": "80"
                            },
                            {
                                "color": "#b4934a"
                            },
                            {
                                "gamma": "1.70"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#b4934a"
                            }
                        ]
                    }
                ],
                {name: 'Styled Map'});

            var map = new google.maps.Map(document.getElementById('map'), options);

            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');

            @foreach($clinics->where('approved', 1)->where('visible', 1) as $clinic)
                @if($clinic->lat && $clinic->lng)
                    var marker = new google.maps.Marker({
                        map: map,
                        position: {lat: <?php echo $clinic->lat; ?>, lng: <?php echo $clinic->lng; ?>},
                        icon: "/img/marker.png"
                    });

                    var contentString = '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h1 id="firstHeading" class="firstHeading"><?php echo str_replace('\'', '', trim(preg_replace('/\s\s+/', ' ', $clinic->name))); ?></h1>'+
                        '<div id="bodyContent">'+
                        "<a href='/clinics/<?php echo $clinic->id; ?>'>View Clinic</a>"+
                        '</div>' +
                        '</div>';

                    var infowindow_<?php echo $clinic->id; ?> = new google.maps.InfoWindow({
                        content: contentString
                    });

                    marker.addListener('click', function() {
                        infowindow_<?php echo $clinic->id; ?>.open(map, marker);
                    });
                @endif
            @endforeach
        }

        var mapData = [
        @foreach($clinics->where('approved', 1)->where('visible', 1) as $clinic)
            {
                postcode: "{{$clinic->postcode}}", name: "{{trim(preg_replace('/\s\s+/', ' ', htmlspecialchars($clinic->name)))}}", link: "{{$clinic->id}}"
            },
        @endforeach
        ];
    </script>


    <!-- Postcode search -->
    <script>
        (function ($) {
            $.expr[":"].contains = $.expr.createPseudo(function (arg) {
                return function (elem) {
                    return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });

            function valid_postcode(postcode) {
                postcode = postcode.replace(/\s/g, "");
                var regex = /^[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}$/i;
                return regex.test(postcode);
            }

            function haversineDistance(coords1, coords2, isMiles) {
                function toRad(x) {
                    return x * Math.PI / 180;
                }

                var lon1 = coords1[0];
                var lat1 = coords1[1];

                var lon2 = coords2[0];
                var lat2 = coords2[1];

                var R = 6371; // km

                var x1 = lat2 - lat1;
                var dLat = toRad(x1);
                var x2 = lon2 - lon1;
                var dLon = toRad(x2);
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var d = R * c;

                if (isMiles) d /= 1.60934;

                return d;
            }

            var postcodes = [];

            <?php foreach(App\Clinic::all()->pluck('postcode') as $postcode): ?>
            if (valid_postcode('<?php echo $postcode; ?>')) {
                postcodes.push('<?php echo $postcode; ?>');
            }
            <?php endforeach; ?>

            $(document).ready(function () {
                var postcode = "{{$term}}";
                var latlng = {};

                $.get('https://api.postcodes.io/postcodes/' + postcode, function (data) {
                    latlng.lat = data.result.latitude;
                    latlng.lng = data.result.longitude;
                }).done(function () {
                    $(".col-lg-4").hide();

                    @foreach($clinics as $clinic)
                        @if($clinic->lat && $clinic->lng)
                            var distance = haversineDistance([latlng.lat, latlng.lng], [{{$clinic->lat}}, {{$clinic->lng}}], true);
                            distance = Math.floor(distance);

                            if(distance <= {{$within}}){
                                $(".col-lg-4:contains('{{$clinic->postcode}}')").show().find('.card-footer').append("<div class='distance w-100'><small class='text-muted'><i class='fa fa-map-marker'></i> " + distance + " miles away</small></div>");
                            }
                        @endif
                    @endforeach
                });
            })
        })(jQuery);
    </script>
@endsection
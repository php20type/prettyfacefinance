@extends('layouts.frontend')
@section('content')
    <div class="jumbotron jumbotron-fluid mb-3">
        <!-- Map -->
        <div id="map"></div>
        <!-- Clinic card -->
        <div class="container clinic-info">
            <div class="row px-3 px-lg-0">
                <div class="card col-lg-8 px-0 rounded-0">
                    <div class="card-header text-center rounded-0">
                        <h3 class="mb-0">{{ $clinic->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{ $clinic->logo }}" alt="">
                            </div>
                            <div class="col-12 col-md-8">
                                <p class="text-muted py-3 p-md-0">{{ $clinic->description }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <nav class="nav flex-column">
                                    <a class="nav-link px-0" href="http://{{ $clinic->website }}"><i
                                            class="fa fa-globe fa-fw"></i> {{ $clinic->website }}</a>
                                    <a class="nav-link px-0" href="mailto:{{ $clinic->email }}"><i
                                            class="fa fa-envelope fa-fw"></i> {{ $clinic->email }}</a>
                                    <a class="nav-link px-0" href="tel:{{ $clinic->telephone }}"><i
                                            class="fa fa-phone fa-fw"></i> {{ $clinic->telephone }}</a>
                                </nav>

                            </div>
                            <div class="col-12 col-md-6">
                                <nav class="nav flex-column">
                                    <a class="nav-link px-0"
                                        href="https://www.google.com/maps/?q={{ $clinic->lat }},{{ $clinic->lng }}">
                                        <i class="fa fa-map-marker fa-fw"></i>
                                        {{ $clinic->address1 }}
                                        {{ $clinic->address2 }}, {{ $clinic->town }}
                                        {{ $clinic->postcode }}
                                    </a>
                                </nav>
                            </div>
                            <div class="col-12">
                                <p>If your loan application is successful. Upon completion the lender will pay us a
                                    commission.
                                    This
                                    does
                                    not affect the price you pay in any way.</p>
                            </div>

                            <div class="col-12 mt-2">
                                <p style="font-size: 13px;font-style: italic;">Cosmetic Finance Group Ltd trading as
                                    Cosmetic Finance Group is a credit broker, not a
                                    lender. Snap Finance Ltd act as the lender. Registered address: Snap
                                    Finance Ltd, 1 Vincent Avenue, Crownhill, Milton Keynes, MK8 0AB. Credit subject to
                                    status. T&Cs
                                    apply. Representative example: Cost of goods £600, Deposit £50, Amount of credit £550,
                                    Annual Fixed Interest Rate 26.47%, monthly payment £22.41, Term 36 months, Total payable
                                    £856.76, representative 29.9% APR. For more information about Snap Finance, please visit
                                    our finance page <a href="/finance">here</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Services offered by... -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">SERVICES & PROCEDURES OFFERED BY</a></li>
                <li class="breadcrumb-item active text-uppercase" aria-current="page">{{ $clinic->name }}</li>
                @auth
                    @if (Auth::user()->role == 1)
                        <li class="ml-3">
                            <a href="/clinics/{{ $clinic->id }}/edit" class="btn btn-primary btn-sm float-right">Edit
                                Clinic</a>
                        </li>
                    @endif
                @endauth
            </ol>


        </nav>
    </div>

    <div class="container">
        <div class="row">
            <!-- Services & procedures -->
            <div class="col-12 col-md-12">
                <div id="accordion" class="mb-3">
                    @if (count($services) > 0)
                        <!-- All categories -->
                        @foreach ($services as $category => $serviceCollection)
                            <?php
                            $formattedCategory = str_replace(' ', '', $category);
                            $formattedCategory = str_replace('(', '', $formattedCategory);
                            $formattedCategory = str_replace(')', '', $formattedCategory);
                            $formattedCategory = str_replace('/', '', $formattedCategory);
                            ?>
                            <div class="card mt-3 w-100 rounded-0">
                                <div class="card-header border-bottom-0" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $formattedCategory }}">
                                    <h5>
                                        {{ $category }}
                                    </h5>
                                    <i class="fa-regular fa-chevron-down"></i>
                                </div>
                                <div id="{{ $formattedCategory }}" class="card-body collapse p-0"
                                    data-bs-parent="#accordion">
                                    <!-- All services -->
                                    @foreach ($serviceCollection as $service)
                                        <div class="card border-0">
                                            <div class="card-body border-top">
                                                <div class="row">
                                                    <div class="col-12 col-lg-8">
                                                        <h6>
                                                            {{ $service->name }}
                                                        </h6>
                                                        <p>{{ $service->description }}</p>
                                                    </div>

                                                    <div class="col-12 col-lg-4 add-to-basket">
                                                        <div class="row">
                                                            {!! Form::open(['route' => 'basket.add', 'method' => 'post', 'class' => 'w-100']) !!}
                                                            <input name="id" type="hidden"
                                                                value="{{ $service->id }}">
                                                            <input name="clinic" type="hidden"
                                                                value="{{ $clinic->id }}">
                                                            <input type="hidden" name="quantity" value="1">

                                                            @if (count($service->buyingOptions) < 1)
                                                                <div class="col-12 single-price text-right mb-3">
                                                                    £{{ $service->price }}
                                                                </div>
                                                            @else
                                                                <div class="col-12 single-price text-right mb-3">
                                                                    £{{ $service->buyingOptions->min('price') }} -
                                                                    £{{ $service->buyingOptions->max('price') }}
                                                                </div>
                                                            @endif
                                                            <!-- Buying options -->
                                                            @if (count($service->buyingOptions) > 0)
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <select name="buyingOptions" id="buyingOptions"
                                                                            class="form-control rounded-0" required>
                                                                            <option value="">Choose an Option</option>
                                                                            @foreach ($service->buyingOptions as $buyingOption)
                                                                                <option value="{{ $buyingOption->id }}">
                                                                                    {{ $buyingOption->name }} -
                                                                                    £{{ $buyingOption->price }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <!-- Buying options end -->
                                                            <div class="col-12">
                                                                <button class="btn btn-primary btn-block">
                                                                    <i class="fa fa-shopping-basket mr-2"></i> Add to Basket
                                                                </button>
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- Services end -->
                                </div>
                            </div>
                        @endforeach

                        <div class="mt-3">
                            <p>If your loan application is successful. Upon completion the lender will pay us a
                                commission.
                                This
                                does
                                not affect the price you pay in any way.</p>
                        </div>
                    @else
                        There are currently no services to display.
                    @endif
                    <!-- Categories end -->
                </div>
            </div>
            <!-- Payment calculator -->
            <div class="col-12 col-md-4 mb-5">
                @if ($clinic->qualifications->count() > 0)
                    <div class="card w-100 my-3">
                        <div class="card-header">
                            Qualifications
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @foreach ($clinic->qualifications as $qualification)
                                    <li class="list-group-item list-group-item-light">
                                        @if ($qualification->path)
                                            <a href="{{ $qualification->path }}">
                                                <i class="fa fa-link"></i> {{ $qualification->name }}
                                            </a>
                                        @else
                                            {{ $qualification->name }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @include('calculator.mini')
            </div>
        </div>
    </div>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPmmOlqol8qs_zsQOdBd1C4iwaK3uKO84&callback=initMap&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x212121&style=element:labels.icon%7Cvisibility:off&style=element:labels.text.fill%7Ccolor:0x757575&style=element:labels.text.stroke%7Ccolor:0x212121&style=feature:administrative%7Celement:geometry%7Ccolor:0x757575&style=feature:administrative.country%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&style=feature:administrative.land_parcel%7Cvisibility:off&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xbdbdbd&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:poi.park%7Celement:geometry%7Ccolor:0x181818&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x616161&style=feature:poi.park%7Celement:labels.text.stroke%7Ccolor:0x1b1b1b&style=feature:road%7Celement:geometry.fill%7Ccolor:0x2c2c2c&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x8a8a8a&style=feature:road.arterial%7Celement:geometry%7Ccolor:0x373737&style=feature:road.highway%7Celement:geometry%7Ccolor:0x3c3c3c&style=feature:road.highway.controlled_access%7Celement:geometry%7Ccolor:0x4e4e4e&style=feature:road.local%7Celement:labels.text.fill%7Ccolor:0x616161&style=feature:transit%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:water%7Celement:geometry%7Ccolor:0x000000&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x3d3d3d&size=480x360"
        async defer></script>

    <script>
        var options = {
            zoom: 6,
            center: {
                lat: 53.375536,
                lng: -8.519380
            },
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

            var styledMapType = new google.maps.StyledMapType(
                [{
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
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
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#ff0000"
                        }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f2f2f2"
                        }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry.fill",
                        "stylers": [{
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
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
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
                        "stylers": [{
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
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [{
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
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    },
                    {
                        "featureType": "road.highway.controlled_access",
                        "elementType": "geometry.fill",
                        "stylers": [{
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
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry.fill",
                        "stylers": [{
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
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry.fill",
                        "stylers": [{
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
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
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
                        "stylers": [{
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
                        "stylers": [{
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
                        "stylers": [{
                            "color": "#b4934a"
                        }]
                    }
                ], {
                    name: 'Styled Map'
                });

            var map = new google.maps.Map(document.getElementById('map'), options);

            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');


            options.zoom = 13;

            @if ($clinic->lat && $clinic->lng)
                var marker = new google.maps.Marker({
                    map: map,
                    position: {
                        lat: <?php echo $clinic->lat; ?>,
                        lng: <?php echo $clinic->lng; ?>
                    },
                    icon: "/img/marker.png"
                });
            @endif
        }
    </script>
@endsection

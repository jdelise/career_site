@extends('app')
@section('title','Indianapolis Career In Real Estate - Contact Us')
@section('description','')
@section('main-content')
    <div class="header-breadcrumb page-header default mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Contact Us</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Contact Us</p>
                        </li>
                    </ul>
                    <span id="current-date">{{date('n D, Y')}}</span>
                </div>
            </div>
        </div>
    </div>
    <div id="content">

        <div class="container">
            <div class="row">
                @include('flash::message')
                @include('admin/partials/forms/errors')
                <div class="col-sm-6">
                    <h2 class="section-title mbottom50">6 Metro Indianapolis Offices</h2>

                    <div id="contact_form">
                        <form name="htmlform" method="post" action="{{url('contact_us')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="field mbottom10">
                                <div class="label-form">
                                    <input type="text" placeholder="Your Name (required)" name="name" maxlength="50"
                                           size="30" class="form-control" required>
                                </div>
                            </div>
                            <div class="field mbottom10">
                                <div class="label-form">
                                    <input type="text" placeholder="Your Phone (required)" name="phone"
                                           class="form-control" maxlength="80" size="30" required>
                                </div>
                            </div>
                            <div class="field mbottom10">
                                <div class="label-form">
                                    <input type="email" placeholder="Your Email (required)" name="email"
                                           class="form-control" maxlength="80" size="30" required>
                                </div>
                            </div>
                            <div class="field mbottom10">
                                <div class="label-form">
                                    <input type="text" placeholder="Subject" name="subject" class="form-control"
                                           maxlength="50" size="30" required>
                                </div>
                            </div>
                            <div class="field mbottom10">
                                <div class="label-form">
                                    <textarea name="comments" placeholder="Your Message" class="form-control"
                                              maxlength="1000" cols="25" rows="6" required></textarea>
                                </div>
                            </div>
                            <div class="field submit">
                                <button type="submit" class="btn2 btn-2 mbottom60" tabindex="5">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <!-- end contact_form -->
                </div>
                <div class="col-sm-6">
                    <div id="map" class="">
                    </div>
                    <!-- end map -->
                </div>

            </div>
        </div>
    </div><!-- end content -->
@endsection
@section('footer-scripts')
    <script src="{{asset('frontend/js/jquery.gmap.min.js')}}"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript"> /* Google Map */
        jQuery(document).ready(function () {

            /*
             Find the Latitude and Longitude of your address:
             - http://itouchmap.com/latlong.html
             - http://universimmedia.pagesperso-orange.fr/geo/loc.htm
             - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

             Find settings explained:
             - https://github.com/marioestrada/jQuery-gMap

             */

            // Map Markers
            var mapMarkers = [{
                address: "270 East Carmel Drive - Carmel IN 46032",
                latitude: 39.96152,
                longitude: -86.12376,
                icon: {
                    image: "{{asset('frontend/images/c21_map.png')}}",
                    iconsize: [152, 56], // w, h
                    iconanchor: [21, 53] // x, y
                }
            }, {
                address: "821 N. State Rd 135 - Greenwood, IN 46142",
                latitude: 39.62808,
                longitude: -86.15783,
                icon: {
                    image: "{{asset('frontend/images/c21_map.png')}}",
                    iconsize: [152, 56], // w, h
                    iconanchor: [21, 53] // x, y
                }
            }, {
                address: "643 Massachusetts Ave. - Indianapolis, IN 46204",
                latitude: 39.77596,
                longitude: -86.14726,
                icon: {
                    image: "{{asset('frontend/images/c21_map.png')}}",
                    iconsize: [152, 56], // w, h
                    iconanchor: [21, 53] // x, y
                }
            }, {
                address: "4929 E. 96th St. - Indianapolis, IN 46240",
                latitude: 39.92654,
                longitude: -86.08648,
                icon: {
                    image: "{{asset('frontend/images/c21_map.png')}}",
                    iconsize: [152, 56], // w, h
                    iconanchor: [21, 53] // x, y
                }
            }, {
                address: "135 E. Sycamore St. - Zionsville, IN 46077",
                latitude: 39.94813,
                longitude: -86.26029,
                icon: {
                    image: "{{asset('frontend/images/c21_map.png')}}",
                    iconsize: [152, 56], // w, h
                    iconanchor: [21, 53] // x, y
                }
            }, {
                address: "7994 E. US 36, Suite C - Avon, IN 46123",
                latitude: 39.76424,
                longitude: -86.38170,
                icon: {
                    image: "{{asset('frontend/images/c21_map.png')}}",
                    iconsize: [152, 56], // w, h
                    iconanchor: [21, 53] // x, y
                }
            }];

            // Map Color Scheme - more styles here http://snazzymaps.com/
            var mapStyles = [
                {
                    "featureType": "water",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#acbcc9"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "stylers": [
                        {
                            "color": "#f2e5d4"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#c5c6c6"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e4d7c6"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#fbfaf7"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#c5dac6"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 33
                        }
                    ]
                },
                {
                    "featureType": "road"
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {},
                {
                    "featureType": "road",
                    "stylers": [
                        {
                            "lightness": 20
                        }
                    ]
                }
            ];

            // Map Initial Location
            var initLatitude = 39.76840;
            var initLongitude = -86.15807;

            // Map Extended Settings
            var map = jQuery("#map").gMap({
                controls: {
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true
                },
                scrollwheel: false,
                markers: mapMarkers,
                latitude: initLatitude,
                longitude: initLongitude,
                zoom: 10
                //style: mapStyles
            });

        });
    </script><!-- END Google Maps code -->
@endsection
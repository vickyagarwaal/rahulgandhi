



<!-- footer area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->

<!-- jquery -->
<script src="{{asset('assets/common/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/common/js/jquery-migrate-3.3.2.min.js')}}"></script>
<!-- popup -->
@include('frontend.partials.popup.popup-structure')
<!-- bootstrap -->
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- magnific popup -->
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.js') }}"></script>
<!-- wow -->
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<!-- owl carousel -->
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<!-- waypoint -->
<script src="{{ asset('assets/frontend/js/waypoints.min.js') }}"></script>
<!-- counterup -->
<script src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
<!-- imageloaded -->
<script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- isotope -->
<script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
<!-- main js -->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<!-- Progress-Bar -->
<script src="{{ asset('assets/frontend/js/jQuery.rProgressbar.min.js') }}"></script>
<!-- dynamic js -->
<!-- toastr js -->
<script src="{{asset('assets/common/js/toastr.min.js')}}"></script>

<script>
    (function() {
            "use strict";
            
             /**-----------------------------
             *  countdown
             * ---------------------------*/
            var offerTime = $("#offer_time_end").val();
            if ($("#mycountdown").length > 0) {
                var year = offerTime.substr(0, 4);
                var month = offerTime.substr(5, 2);
                var day = offerTime.substr(8, 2);
    
                 $('#mycountdown').countdown({
                    year: year,
                    month: month,
                    day: day,
                    labels: true,
                    labelText: {
                        'days': "{{__('days')}}",
                        'hours': "{{__('hours')}}",
                        'minutes': "{{__('min')}}",
                        'seconds': "{{__('sec')}}",
                    }
                });
            }

            
            $(document).on('click','#product_search_btn',function (e) {
                e.preventDefault();
                var searchTerms = $('#search_term').val();
                $('#search_query').val(searchTerms)
                $('#product_hidden_form_submit_button').trigger('click');
            });
        })(jQuery);
</script>


@include('frontend.partials.popup.popup-jspart')
@yield('scripts')
<!-- tawk api key  -->

</body>
</html>
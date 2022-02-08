@section('scripts')
<script>
    (function () {
        "use strict";
        $(document).on('click','#wishlist',function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url : "{{route('frontend.products.add.to.wishlist.ajax')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        'product_id' : allData.product_id,
                    },
                    beforeSend: function(){
                            el.addClass("disabled")
                            el.html('<i class="fas fa-spinner fa-spin text-white"></i>');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
                        el.html('<i class="fas fa-heart text-white"></i>');
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.info(data.msg);
                        // $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount').text(data.total_wishlist_item);
                    }
                });
            });
    })(jQuery);
</script>   
@endsection
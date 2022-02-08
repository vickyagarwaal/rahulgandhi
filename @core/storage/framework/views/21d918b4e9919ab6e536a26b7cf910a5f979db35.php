



<!-- footer area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->

<!-- jquery -->
<script src="<?php echo e(asset('assets/common/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/common/js/jquery-migrate-3.3.2.min.js')); ?>"></script>
<!-- popup -->
<?php echo $__env->make('frontend.partials.popup.popup-structure', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- bootstrap -->
<script src="<?php echo e(asset('assets/frontend/js/bootstrap.min.js')); ?>"></script>
<!-- magnific popup -->
<script src="<?php echo e(asset('assets/frontend/js/jquery.magnific-popup.js')); ?>"></script>
<!-- wow -->
<script src="<?php echo e(asset('assets/frontend/js/wow.min.js')); ?>"></script>
<!-- owl carousel -->
<script src="<?php echo e(asset('assets/frontend/js/owl.carousel.min.js')); ?>"></script>
<!-- waypoint -->
<script src="<?php echo e(asset('assets/frontend/js/waypoints.min.js')); ?>"></script>
<!-- counterup -->
<script src="<?php echo e(asset('assets/frontend/js/jquery.counterup.min.js')); ?>"></script>
<!-- imageloaded -->
<script src="<?php echo e(asset('assets/frontend/js/imagesloaded.pkgd.min.js')); ?>"></script>
<!-- isotope -->
<script src="<?php echo e(asset('assets/frontend/js/isotope.pkgd.min.js')); ?>"></script>
<!-- main js -->
<script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>
<!-- Progress-Bar -->
<script src="<?php echo e(asset('assets/frontend/js/jQuery.rProgressbar.min.js')); ?>"></script>
<!-- dynamic js -->
<!-- toastr js -->
<script src="<?php echo e(asset('assets/common/js/toastr.min.js')); ?>"></script>

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
                        'days': "<?php echo e(__('days')); ?>",
                        'hours': "<?php echo e(__('hours')); ?>",
                        'minutes': "<?php echo e(__('min')); ?>",
                        'seconds': "<?php echo e(__('sec')); ?>",
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


<?php echo $__env->make('frontend.partials.popup.popup-jspart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('scripts'); ?>
<!-- tawk api key  -->

</body>
</html><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>
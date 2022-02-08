<script>
    (function($){
    "use strict";
        $(document).ready(function () {
            $(document).on('click','#add-cart',function () {
                $(this).addClass("disabled")
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i><?php echo e(__("Adding")); ?>');
            });
        });
    })(jQuery);
</script><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/btn/add-cart.blade.php ENDPATH**/ ?>
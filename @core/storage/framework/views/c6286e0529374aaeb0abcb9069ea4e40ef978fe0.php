<script>
    (function($){
    "use strict";
        $(document).ready(function () {
            $(document).on('click','#submit',function () {
                $(this).addClass("disabled")
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Submitting")); ?>');
            });
        });
    })(jQuery);
</script><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/btn/submit.blade.php ENDPATH**/ ?>
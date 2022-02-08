<script>
    (function($){
    "use strict";
        $(document).ready(function () {
            $(document).on('click','#save',function () {
                $(this).addClass("disabled")
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Saving")); ?>');
            });
        });
    })(jQuery);
</script><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/btn/save.blade.php ENDPATH**/ ?>
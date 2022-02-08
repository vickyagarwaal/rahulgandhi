<script>
    (function($){
    "use strict";
        $(document).ready(function () {
            $(document).on('click','#update',function () {
                $(this).addClass("disabled")
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Updating")); ?>');
            });
        });
    })(jQuery);
</script><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/btn/update.blade.php ENDPATH**/ ?>
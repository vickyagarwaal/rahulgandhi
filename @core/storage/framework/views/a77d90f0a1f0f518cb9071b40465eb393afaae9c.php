<script>
    (function($){
    "use strict";
        $(document).ready(function () {
            $(document).on('click','#<?php echo e($id); ?>',function () {
                $(this).addClass("disabled")
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e($title); ?>');
            });
        });
    })(jQuery);
</script><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/btn/custom.blade.php ENDPATH**/ ?>
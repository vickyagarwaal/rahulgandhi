<script>
    (function($){
    "use strict";
        $(document).ready(function () {
            $(document).on('click','#save',function () {
                $(this).addClass("disabled")
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> {{__("Saving")}}');
            });
        });
    })(jQuery);
</script>
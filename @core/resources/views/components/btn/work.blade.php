<script>
    (function($){
    "use strict";
        $(document).ready(function () {
            $(document).on('click','#work',function () {
                $(this).addClass("disabled")
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> {{__("Working")}}');
            });
        });
    })(jQuery);
</script>
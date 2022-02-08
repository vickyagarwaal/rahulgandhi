<script>
    (function($){
    "use strict";
        $('.icp-dd').iconpicker();
        $('.icp-dd').on('iconpickerSelected', function (e) {
            var selectedIcon = e.iconpickerValue;
            $(this).parent().parent().children('input').val(selectedIcon);
        });
    })(jQuery);
</script><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/icon-picker/js.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{get_static_option('site_title')}} - {{get_static_option('site_tag_line')}}</title>
</head>

<body>

<form action="{{ $paytm_txn_url }}" method="post" id="payment_form">
    <?php
    foreach($paramList as $name => $value) {
        echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
    }
    ?>
    <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
</form>

<script>
(function($){
    "use strict";
    document.getElementById("payment_form").trigger('submit');
})();
</script>
</body>

</html>
    
    
    
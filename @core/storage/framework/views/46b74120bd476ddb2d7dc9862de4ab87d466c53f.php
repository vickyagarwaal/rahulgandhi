
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('contact_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
<?php echo e(get_static_option('contact_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('contact_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('contact_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
<div class="contact-area padding-bottom-120 padding-top-120">
    <div class="container">
        <div class="row">
            <?php if(get_static_option('contact_page_contact_section_status')): ?>
            <div class="col-lg-5">
                <div class="contact-inner-area bg-litewhite">
                    <div class="section-title">
                        <h4 class="title"> <?php echo e(get_static_option('home_page_contact_us_section_title')); ?> </h4>
                    </div>
                    <div class="single-contact-item">
                        <div class="icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="content">
                            <p class="details">
                                <?php $__currentLoopData = explode("\n",get_static_option('home_page_contact_us_section_contact')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="single-contact-item">
                        <div class="icon">
                            <i class="flaticon-mail"></i>
                        </div>
                        <div class="content">
                            <p class="details">
                                <?php $__currentLoopData = explode("\n",get_static_option('home_page_contact_us_section_email')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="single-contact-item">
                        <div class="icon">
                            <i class="flaticon-pin"></i>
                        </div>
                        <div class="content">
                            <p class="details">
                                <?php $__currentLoopData = explode("\n",get_static_option('home_page_contact_us_section_address')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($item); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if(get_static_option('contact_page_map_section_status')): ?>
            <div class="col-lg-3">
                <div class="contact_map">
                    <?php echo render_embed_google_map(get_static_option('contact_page_map_section_location'),get_static_option('contact_page_map_section_zoom')); ?>

                </div>
            </div>
            <?php endif; ?>
            <?php if(get_static_option('contact_page_message_section_status')): ?>
            <div class="col-lg-4">
                <div class="contact-form style-01">
                    <form action="<?php echo e(route('frontend.contact.message')); ?>" method="POST" class="contact-page-form" id="contact_us_form" novalidate="novalidate" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="captcha_token" id="gcaptcha_token">
                        <div class="row">
                            <div class="error-message margin-bottom-10 col-md-12"> </div>
                            <div class="col-md-12">
                                <?php echo render_form_field_for_frontend(get_static_option('contact_page_contact_form_fields')); ?>

                            </div>
                            <div class="col-md-12">
                                <div class="btn-wrapper">
                                    <a href="#" class="boxed-btn" id="contact_us_submit_btn"><span><?php echo e(__('Submit Message')); ?></span></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if(!empty(get_static_option('site_google_captcha_v3_site_key'))): ?>
        <script
                src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
        <script>
            (function() {
                "use strict";

                grecaptcha.ready(function () {
                    grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function (token) {
                        document.getElementById('gcaptcha_token').value = token;
                    });
                });
            })();
        </script>
    <?php endif; ?>
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            function removeTags(str) {
              if ((str===null) || (str==='')){
                   return false;
              }
              str = str.toString();
              return str.replace( /(<([^>]+)>)/ig, '');
           }
       
            $(document).on('click', '#contact_us_submit_btn', function (e) {
                e.preventDefault();
                var el = $(this);
                var myForm = document.getElementById('contact_us_form');
                var formData = new FormData(myForm);
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('frontend.contact.message')); ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Submitting")); ?>');
                    },
                    success: function (data) {
                        var errMsgContainer = $('#contact_us_form').find('.error-message');
                        errMsgContainer.html('');
                        errMsgContainer.html('<div class="alert alert-'+data.type+'">'+removeTags(data.msg)+'</div>');
                        $('#contact_us_form').find('.form-control').val('');
                        el.text('<?php echo e(__("Submit")); ?>');
                    },
                    error: function (data) {
                        var error = data.responseJSON;
                        var errMsgContainer = $('#contact_us_form').find('.error-message');
                        errMsgContainer.html('<div class="alert alert-danger"></div>');
                        $.each(error.errors,function (index,value) {
                            errMsgContainer.find('.alert').append('<span>'+removeTags(value)+'</span>');
                        });
                        el.text('<?php echo e(__("Submit")); ?>');
                    }
                });
            });
        }); 
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/pages/contact-page.blade.php ENDPATH**/ ?>
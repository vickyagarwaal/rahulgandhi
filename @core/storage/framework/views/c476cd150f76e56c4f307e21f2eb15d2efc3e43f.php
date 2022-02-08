<?php if(request()->path() == '/' || \Request::is( 'home/*') ): ?>
<title><?php echo e(get_static_option('site_title')); ?> - <?php echo e(get_static_option('site_tag_line')); ?></title>
<meta name="og:title" content="<?php echo e(get_static_option('og_meta_title')); ?>"/>
<meta name="og:description" content="<?php echo e(get_static_option('og_meta_description')); ?>"/>
<meta name="og:site_name" content="<?php echo e(get_static_option('og_meta_site_name')); ?>"/>
<meta name="og:url" content="<?php echo e(get_static_option('og_meta_url')); ?>"/>
<?php echo render_og_meta_image_by_attachment_id(get_static_option('og_meta_image')); ?>

<?php endif; ?>

<?php if(request()->is([
    get_static_option('blog_page_slug'),
    get_static_option('blog_page_slug').'/*',
    'blog-tags/*',
    get_static_option('about_page_slug'),
    get_static_option('contact_page_slug'),
    get_static_option('service_page_slug'),
    get_static_option('service_page_slug').'/*',
    get_static_option('appointment_page_slug'),
    get_static_option('appointment_page_slug').'/*',
    get_static_option('product_page_slug'),
    get_static_option('product_page_slug').'/*',
])): ?>
<title><?php echo $__env->yieldContent('site-title'); ?> - <?php echo e(get_static_option('site_title')); ?></title>
<?php echo $__env->yieldContent('page-meta-data'); ?>
<?php echo $__env->yieldContent('og-meta'); ?>
<?php else: ?>
<title><?php echo e(get_static_option('site_title')); ?> - <?php echo e(get_static_option('site_tag_line')); ?></title>
<meta name="description" content="<?php echo e(filter_static_option_value('site_meta_description',$global_static_field_data)); ?>">
<meta name="tags" content="<?php echo e(filter_static_option_value('site_meta_tags',$global_static_field_data)); ?>">
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/partials/og-meta.blade.php ENDPATH**/ ?>
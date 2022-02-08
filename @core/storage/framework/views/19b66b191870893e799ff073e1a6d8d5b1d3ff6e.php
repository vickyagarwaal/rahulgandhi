<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Page Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.all','data' => []]); ?>
<?php $component->withName('msg.all'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__("Page Name & Slug Settings")); ?></h4>
                        <form action="<?php echo e(route('admin.general.page.settings')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                        $pages_list = \App\MenuBuilder\MenuBuilderSetup::Instance()->static_pages_list();
                                    ?>
                                    <?php $__currentLoopData = $pages_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="from-group">
                                            <label for="<?php echo e($page); ?>_page_slug"><?php echo e(__(ucfirst(str_replace('_',' ',$page)))); ?> <?php echo e(__('Page Slug')); ?></label>
                                            <input type="text" class="form-control" value="<?php echo e(get_static_option($page.'_page_slug')); ?>" name="<?php echo e($page); ?>_page_slug" placeholder="<?php echo e(__('Slug')); ?>" >
                                            <small><?php echo e(__('slug example:')); ?> <?php echo e($page); ?></small>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="accordion-wrapper">
                                        <div id="accordion-PAGE-SETTINGS">
                                            <?php $__currentLoopData = $pages_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card">
                                                    <div class="card-header" >
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo e($page); ?>_page_PAGE_SETTINGS" aria-expanded="true" >
                                                                <span class="page-title"><?php if(!empty(get_static_option($page.'_page_name'))): ?> <?php echo e(get_static_option($page.'_page_name')); ?> <?php else: ?> <?php echo e(__(ucfirst(str_replace('_',' ',$page)))); ?>  <?php endif; ?></span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="<?php echo e($page); ?>_page_PAGE_SETTINGS" class="collapse"  data-parent="#accordion-PAGE-SETTINGS">
                                                        <div class="card-body">
                                                            <div class="from-group">
                                                                <label for="<?php echo e($page); ?>_page_name"><?php echo e(__('Name')); ?></label>
                                                                <input type="text" class="form-control" name="<?php echo e($page); ?>_page_name" value="<?php echo e(get_static_option($page.'_page_name') ?? ucfirst(str_replace(['_','-'],[' ',' '],$page))); ?>"  placeholder="<?php echo e(__('Name')); ?>" >
                                                            </div>
                                                            <div class="form-group margin-top-20">
                                                                <label for="<?php echo e($page); ?>_page_meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                                                                <input type="text" name="<?php echo e($page); ?>_page_meta_tags"  class="form-control" data-role="tagsinput" value="<?php echo e(get_static_option($page.'_page_meta_tags')); ?>" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="about_page_meta_description"><?php echo e(__('Meta Description')); ?></label>
                                                                <textarea name="<?php echo e($page); ?>_page_meta_description"  class="form-control" rows="5" ><?php echo e(get_static_option($page.'_page_meta_description')); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.update','data' => []]); ?>
<?php $component->withName('btn.update'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <script>
         (function($){
        "use strict";
        $(document).ready(function () {
            $('.page-name').on('bind','change paste keyup',function (e) {
                        $(this).parent().parent().parent().prev().find('.page-title').text($(this).val());
                    })
        });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/backend/general-settings/page-settings.blade.php ENDPATH**/ ?>
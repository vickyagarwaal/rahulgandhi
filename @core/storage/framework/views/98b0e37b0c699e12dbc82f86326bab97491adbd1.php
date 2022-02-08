<div class="support-area padding-top-30">
    <div class="container">
        <div class="support-area-wrapper ">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="support-item-list">
                        <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="support-single-item">
                            <div class="icon">
                                <i class="<?php echo e($data->icon); ?>"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><?php echo e($data->title); ?></h4>
                                <p><?php echo e($data->description); ?></p>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/partials/keyfeature/keyfeature-variant-2.blade.php ENDPATH**/ ?>
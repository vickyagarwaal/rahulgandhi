<div class="counterup-area">
        <div class="counterup-wrapper m-bottom bg-red">
            <div class="row">
                <?php $__currentLoopData = $all_counterups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-counterup-01">
                        <div class="icon">
                            <i class="<?php echo e($data->icon); ?>"></i>
                        </div>
                        <div class="content">
                            <div class="count-wrap"><span class="count-num"><?php echo e($data->number); ?></span><?php echo e($data->extra_text); ?></div>
                            <h4 class="title"><?php echo e($data->title); ?></h4>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
</div><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/partials/counterup-area.blade.php ENDPATH**/ ?>
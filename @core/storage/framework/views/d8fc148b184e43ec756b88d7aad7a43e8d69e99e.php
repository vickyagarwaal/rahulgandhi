<?php if(count($all_sub_category) > 0): ?>
<div class="form-group">
    <label for="sub_category_id"><?php echo e(('Sub Category')); ?></label>
    <select class="form-control" name="sub_category_id" id="sub_category_id">
        <option value="parent" selected disabled><?php echo e(__('Select Sub Category')); ?></option>
        <?php $__currentLoopData = $all_sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($data->id); ?>"><?php echo e(purify_html($data->name)); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/backend/products/components/sub-category.blade.php ENDPATH**/ ?>
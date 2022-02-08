<div class="form-group">
    <label for="<?php echo e($name); ?>" class="d-block"> <?php echo e($title); ?> </label>
    <div class="btn-group <?php echo e($id); ?>">
        <button type="button" class="btn btn-info bt-xl iconpicker-component">
            <i class="<?php echo e((isset($value))? get_static_option($value) : ''); ?>"></i>
        </button>
        <button type="button" class="icp icp-dd btn bt-xl btn-info dropdown-toggle"
                data-selected="<?php echo e((isset($value))? get_static_option($value) : ''); ?>" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only"><?php echo e(__("Toggle Dropdown")); ?></span>
        </button>
        <div class="dropdown-menu"></div>
    </div>
    <input type="hidden" class="form-control"  id="<?php echo e($id); ?>" name="<?php echo e($name); ?>" value="<?php echo e((isset($value))? get_static_option($value) : ''); ?>">
</div>
<?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/icon-picker/field.blade.php ENDPATH**/ ?>
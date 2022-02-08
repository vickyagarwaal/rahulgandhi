<?php switch($status):
    case ('draft'): ?>
        <span class="alert alert-primary" ><?php echo e(__('Draft')); ?></span>
        <?php break; ?>
    <?php case ('pending'): ?>
        <span class="alert alert-warning" ><?php echo e(__('Pending')); ?></span>
        <?php break; ?>
    <?php case ('complete'): ?>
        <span class="alert alert-success" ><?php echo e(__('Complete')); ?></span>
        <?php break; ?>
    <?php case ('close'): ?>
        <span class="alert alert-danger" ><?php echo e(__('Close')); ?></span>
        <?php break; ?>
    <?php case ('in_progress'): ?>
        <span class="alert alert-info" ><?php echo e(__('In Progress')); ?></span>
        <?php break; ?>
    <?php case ('publish'): ?>
        <span class="alert alert-success" ><?php echo e(__('Publish')); ?></span>
        <?php break; ?>
    <?php case ('confirm'): ?>
        <span class="alert alert-success" ><?php echo e(__('Confirm')); ?></span>
        <?php break; ?>
    <?php case ('yes'): ?>
        <span class="alert alert-success" ><?php echo e(__('Yes')); ?></span>
        <?php break; ?>
    <?php case ('no'): ?>
        <span class="alert alert-danger" ><?php echo e(__('No')); ?></span>
        <?php break; ?>
    <?php case ('cancel'): ?>
        <span class="alert alert-danger" ><?php echo e(__('Cancel')); ?></span>
        <?php break; ?>
    <?php case ('replied'): ?>
        <span class="alert alert-success" ><?php echo e(__('Replied')); ?></span>
        <?php break; ?>
    <?php case ('opened'): ?>
        <span class="alert alert-info" ><?php echo e(__('Opened')); ?></span>
        <?php break; ?>
    <?php case ('cancel'): ?>
        <span class="alert alert-danger" ><?php echo e(__('Cancel')); ?></span>
        <?php break; ?>
    <?php default: ?>
    <span class="alert alert-info" ><?php echo e(__('Status Not Available')); ?></span>
<?php endswitch; ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/status-span.blade.php ENDPATH**/ ?>
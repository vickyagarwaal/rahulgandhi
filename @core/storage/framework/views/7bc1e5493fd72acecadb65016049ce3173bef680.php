<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
<?php echo $__env->make('backend.partials.datatable.style-enqueue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('All Admins')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <h4 class="header-title"><?php echo e(__('All Admin Created By Super Admin')); ?></h4>
                                    <div class="data-tables datatable-primary">
                                        <table id="all_user_table" class="text-center">
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th><?php echo e(__('ID')); ?></th>
                                                <th><?php echo e(__('Name')); ?></th>
                                                <th><?php echo e(__('Username')); ?></th>
                                                <th><?php echo e(__('Image')); ?></th>
                                                <th><?php echo e(__('Role')); ?></th>
                                                <th><?php echo e(__('Email')); ?></th>
                                                <th><?php echo e(__('Action')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $all_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($data->id); ?></td>
                                                    <td><?php echo e($data->name); ?></td>
                                                    <td><?php echo e($data->username); ?></td>
                                                    <td>
                                                        <?php
                                                        $img = get_attachment_image_by_id($data->image,null,true);
                                                        ?>
                                                        <?php if(!empty($img)): ?>
                                                            <div class="attachment-preview">
                                                                <div class="thumbnail">
                                                                    <div class="centered">
                                                                        <img class="avatar user-thumb" src="<?php echo e($img['img_url']); ?>" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php  $img_url = $img['img_url']; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($data->role); ?></td>
                                                    <td><?php echo e($data->email); ?></td>
                                                    <td>
                                                        <a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1" role="button" data-toggle="popover" data-trigger="focus" data-html="true" title="" data-content="
                                                       <h6>Are you sure to delete this user?</h6>
                                                       <form method='post' action='<?php echo e(route('admin.delete.user',$data->id)); ?>'>
                                                       <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                                       <br>
                                                        <input type='submit' class='btn btn-danger btn-sm' value='Yes,Delete'>
                                                        </form>
                                                        " data-original-title="">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                        <a href="#"
                                                           data-id="<?php echo e($data->id); ?>"
                                                           data-name="<?php echo e($data->name); ?>"
                                                           data-role="<?php echo e($data->role); ?>"
                                                           data-email="<?php echo e($data->email); ?>"
                                                           data-imageid="<?php echo e($data->image); ?>"
                                                           data-image="<?php echo e($img_url); ?>"
                                                           data-toggle="modal"
                                                           data-target="#user_edit_modal"
                                                           class="btn btn-lg btn-primary btn-sm mb-3 mr-1 user_edit_btn"
                                                        >
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                        <a href="#"
                                                           data-id="<?php echo e($data->id); ?>"
                                                           data-toggle="modal"
                                                           data-target="#user_change_password_modal"
                                                           class="btn btn-lg btn-info btn-sm mb-3 mr-1 user_change_password_btn"
                                                        >
                                                            <?php echo e(__("Change Password")); ?>

                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Primary table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('User Details Edit')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="<?php echo e(route('admin.user.update')); ?>" id="user_edit_modal_form" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name"><?php echo e(__('Name')); ?></label>
                            <input type="text" class="form-control"  id="name" name="name" placeholder="<?php echo e(__('Enter name')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email"><?php echo e(__('Email')); ?></label>
                            <input type="text" class="form-control"  id="email" name="email" placeholder="<?php echo e(__('Email')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="role"><?php echo e(__('Role')); ?></label>
                            <select name="role" id="role" class="form-control">
                                <option value="editor"><?php echo e(__("Editor")); ?></option>
                                <option value="admin"><?php echo e(__("Admin")); ?></option>
                                <option value="super_admin"><?php echo e(__('Super Admin')); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="site_favicon"><?php echo e(__('Image')); ?></label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap">
                                    <?php
                                        $image = get_attachment_image_by_id(get_static_option('image'),null,true);
                                        $image_btn_label = __('Upload Image');
                                    ?>
                                    <?php if(!empty($image)): ?>
                                        <div class="attachment-preview">
                                            <div class="thumbnail">
                                                <div class="centered">
                                                    <img class="avatar user-thumb" src="<?php echo e($image['img_url']); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <?php  $image_btn_label = __('Change Image'); ?>
                                    <?php endif; ?>
                                </div>
                                <input type="hidden" id="image" name="image" value="<?php echo e(get_static_option('image')); ?>">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                    <?php echo e(__($image_btn_label)); ?>

                                </button>
                            </div>
                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Save changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_change_password_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Change Admin Password')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="<?php echo e(route('admin.user.password.change')); ?>" id="user_password_change_modal_form" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="ch_user_id" id="ch_user_id">
                        <div class="form-group">
                            <label for="password"><?php echo e(__('Password')); ?></label>
                            <input type="password" class="form-control" name="password" placeholder="<?php echo e(__('Enter Password')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation"><?php echo e(__('Confirm Password')); ?></label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="<?php echo e(__('Confirm Password')); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Change Password')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Start datatable js -->
    <?php echo $__env->make('backend.partials.datatable.script-enqueue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
    (function($){
    "use strict";
    $(document).ready(function() {
        $(document).on('click','.user_change_password_btn',function(e){
            e.preventDefault();
            var el = $(this);
            var form = $('#user_password_change_modal_form');
            form.find('#ch_user_id').val(el.data('id'));
        });
        $('#all_user_table').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
        $(document).on('click','.user_edit_btn',function(e){
            e.preventDefault();
            var form = $('#user_edit_modal_form');
            var el = $(this);
            form.find('#user_id').val(el.data('id'));
            form.find('#name').val(el.data('name'));
            form.find('#username').val(el.data('username'));
            form.find('#email').val(el.data('email'));
            form.find('#modal_preview_image').attr('src',el.data('image'));
            form.find('#role option[value='+el.data('role')+']').attr('selected',true);
            var image = el.data('image');
            var imageid = el.data('imageid');
            if(imageid != ''){
                form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                form.find('.media-upload-btn-wrapper input').val(imageid);
                form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
            }
        })

    } );
            
    })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/backend/user-role-manage/all-user.blade.php ENDPATH**/ ?>
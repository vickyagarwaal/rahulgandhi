<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Products')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.summernote.css','data' => []]); ?>
<?php $component->withName('summernote.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title"><?php echo e(__('Edit Products')); ?></h4>
                            <a href="<?php echo e(route('admin.products.all')); ?>" class="btn btn-info"><?php echo e(__('All Products')); ?></a>
                        </div>
                        <form action="<?php echo e(route('admin.products.update')); ?>" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control"   name="title" value="<?php echo e($product->title); ?>" placeholder="<?php echo e(__('Title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="slug"><?php echo e(__('Slug')); ?></label>
                                <input type="text" class="form-control"  name="slug" value="<?php echo e($product->slug); ?>" placeholder="<?php echo e(__('slug')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="badge"><?php echo e(__('Badge')); ?></label>
                                <input type="text" class="form-control"  name="badge" value="<?php echo e($product->badge); ?>" placeholder="<?php echo e(__('eg: New')); ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Description')); ?></label>
                                <input type="hidden" name="description" value="<?php echo e($product->description); ?>">
                                <div class="summernote" data-content="<?php echo e($product->description); ?>"><?php echo ($product->description); ?></div>
                            </div>
                            <div class="form-group">
                                <label for="short_description"><?php echo e(__('Short Description')); ?></label>
                                <textarea name="short_description" id="short_description" class="form-control max-height-120" cols="30" rows="4" placeholder="<?php echo e(__('Short Description')); ?>"><?php echo e($product->short_description); ?></textarea>
                            </div>
                            <div class="form-group attributes-field">
                                <label for="attributes"><?php echo e(__('Attributes')); ?></label>
                                <?php
                                    $att_title = unserialize($product->attributes_title);
                                    $att_descr = unserialize($product->attributes_description);
                                ?>
                                <?php if(!empty($att_title)): ?>
                                <?php $__currentLoopData = $att_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $att_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="attribute-field-wrapper">
                                       <input type="text" class="form-control"  id="attributes" name="attributes_title[]" value="<?php echo e($att_title); ?>">
                                       <textarea name="attributes_description[]"  class="form-control" rows="5"><?php echo e($att_descr[$key]); ?></textarea>
                                      <div class="icon-wrapper">
                                          <span class="add_attributes"><i class="ti-plus"></i></span>
                                          <?php if($key > 0): ?> <span class="remove_attributes"><i class="ti-minus"></i></span> <?php endif; ?>
                                      </div>
                                   </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="attribute-field-wrapper">
                                        <input type="text" class="form-control"  id="attributes" name="attributes_title[]" placeholder="<?php echo e(__('Title')); ?>">
                                        <textarea name="attributes_description[]"  class="form-control" rows="5" placeholder="<?php echo e(__('Value')); ?>"></textarea>
                                        <div class="icon-wrapper">
                                            <span class="add_attributes"><i class="ti-plus"></i></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title"><?php echo e(__('Meta Title')); ?></label>
                                    <input type="text" name="meta_title" value="<?php echo e($product->meta_title); ?>" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_title"><?php echo e(__('OG Meta Title')); ?></label>
                                    <input type="text" name="og_meta_title" value="<?php echo e($product->og_meta_title); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                                    <textarea name="meta_description" class="form-control" rows="5" id="meta_description"><?php echo e($product->meta_description); ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_description"><?php echo e(__('OG Meta Description')); ?></label>
                                    <textarea name="og_meta_description" class="form-control" rows="5" id="og_meta_description"><?php echo e($product->og_meta_description); ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                                    <input type="text" name="meta_tags" class="form-control" data-role="tagsinput"
                                        id="meta_tags" value="<?php echo e($product->meta_tags); ?>" >
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="og_meta_image"><?php echo e(__('OG Meta Image')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                <?php
                                                    $image = get_attachment_image_by_id($product->og_meta_image,null,true);
                                                    $image_btn_label = 'Upload Image';
                                                ?>
                                                <?php if(!empty($image)): ?>
                                                    <div class="attachment-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered">
                                                                <img class="avatar user-thumb" src="<?php echo e($image['img_url']); ?>" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php  $image_btn_label = 'Change Image'; ?>
                                                <?php endif; ?>
                                            </div>
                                            <input type="hidden" id="og_meta_image" name="og_meta_image" value="<?php echo e($product->og_meta_image); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e(__($image_btn_label)); ?>

                                            </button>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category"><?php echo e(__('Category')); ?></label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value=""><?php echo e(__("Select Category")); ?></option>
                                    <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($product->category_id == $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e(purify_html($category->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div id="AppendSubCategory">
                                <?php if(!empty($product->sub_category_id)): ?>
                                <div class="form-group">
                                    <label for="category"><?php echo e(__('Sub Category')); ?></label>
                                    <select class="form-control" name="sub_category_id" id="sub_category_id">
                                        <?php $__currentLoopData = $all_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($product->sub_category_id == $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <label for="sub_category_id"><?php echo e(('Sub Category')); ?></label>
                                        <select class="form-control" name="sub_category_id" >
                                            <option value="parent" selected disabled><?php echo e(__('Select Category First')); ?></option>
                                        </select>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="regular_price"><?php echo e(__('Regular Price')); ?></label>
                                    <input type="number" class="form-control"  id="regular_price" name="regular_price" value="<?php echo e($product->regular_price); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sale_price"><?php echo e(__('Sale Price')); ?></label>
                                    <input type="number" class="form-control"  id="sale_price" name="sale_price" value="<?php echo e($product->sale_price); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="sku"><?php echo e(__('SKU')); ?></label>
                                    <input type="text" class="form-control"  id="sku" name="sku" value="<?php echo e($product->sku); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stock_status"><?php echo e(__('Stock')); ?></label>
                                    <select name="stock_status" class="form-control" id="stock_status">
                                        <option <?php if($product->stock_status == 'in_stock'): ?> selected <?php endif; ?> value="in_stock"><?php echo e(__('In Stock')); ?></option>
                                        <option <?php if($product->stock_status == 'out_stock'): ?> selected <?php endif; ?> value="out_stock"><?php echo e(__('Out Of Stock')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.fields.image','data' => ['name' => 'image','id' => $product->image,'title' => __('Image'),'dimentions' => '350 x 500']]); ?>
<?php $component->withName('fields.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('image'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->image),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Image')),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('350 x 500')]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                            <div class="form-group">
                                <label for="image"><?php echo e(__('Gallery')); ?></label>
                                <?php
                                    $gallery_images = !empty( $product->gallery) ? explode('|', $product->gallery) : [];
                                ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gl_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $work_section_img = get_attachment_image_by_id($gl_img,null,true);
                                            ?>
                                            <?php if(!empty($work_section_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($work_section_img['img_url']); ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <input type="hidden" name="gallery" value="<?php echo e($product->gallery); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__('Upload Image')); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                            </div>
                            <?php if(get_static_option('product_tax_type') == 'individual'): ?>
                            <div class="form-group">
                                <label for="tax_percentage"><?php echo e(__('Tax Percentage')); ?></label>
                                <input type="number" class="form-control"  id="tax_percentage" name="tax_percentage" value="<?php echo e($product->tax_percentage); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="is_featured"><strong><?php echo e(__('Is Featured in Homepage?')); ?></strong></label>
                                <label class="switch">
                                    <input type="checkbox"  <?php if($product->is_featured): ?> checked <?php endif; ?> name="is_featured" id="is_featured">
                                    <span class="slider-yes-no"></span>
                                </label>
                            </div>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.fields.status','data' => ['name' => 'status','title' => __('Status'),'value' => $product->status]]); ?>
<?php $component->withName('fields.status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('status'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Status')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->status)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                            <button type="submit" id="save" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Save Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => []]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => []]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.save','data' => []]); ?>
<?php $component->withName('btn.save'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.summernote.js','data' => []]); ?>
<?php $component->withName('summernote.js'); ?>
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
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>
    (function ($){
    "use strict";
        $(document).ready(function () {
            
            $(document).on('click','.attribute-field-wrapper .add_attributes',function (e) {
               e.preventDefault();
                $(this).parent().parent().parent().append(' <div class="attribute-field-wrapper">\n' +
                    '<input type="text" class="form-control"  id="attributes" name="attributes_title[]" placeholder="<?php echo e(__('Title')); ?>">\n' +
                    '<textarea name="attributes_description[]"  class="form-control" rows="5" placeholder="<?php echo e(__('Value')); ?>"></textarea>\n' +
                    '<div class="icon-wrapper">\n' +
                    '<span class="add_attributes"><i class="ti-plus"></i></span>\n' +
                    '<span class="remove_attributes"><i class="ti-minus"></i></span>\n' +
                    '</div>\n' +
                    '</div>');

            });
            loadDefault();

            $(document).on('change','#category',function(){
                    var category_id = $(this).val();
                    LoadajAjaxsubCategory(category_id);
            });

            function loadDefault(){
                var category_id = $('#category').val();
                LoadajAjaxsubCategory(category_id);
            }

           function  LoadajAjaxsubCategory(category_id) {
               $.ajax({
                   type: 'GET',
                   url: '<?php echo e(route("admin.products.subcategory.info")); ?>',
                   data: {category_id: category_id},
                   success: function (resp) {
                       $("#AppendSubCategory").html(resp.view);
                   }, error: function () {

                   }
               });
           }

        });
    })(jQuery)
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/backend/products/edit-product.blade.php ENDPATH**/ ?>
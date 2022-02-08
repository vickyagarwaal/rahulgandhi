<div class="our-product-area padding-top-50 padding-bottom-10">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-12">
                <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title b-top desktop-center padding-top-25 margin-bottom-55">
                    <h3 class="title"><?php echo e(get_static_option('home_page_featured_product_section_title')); ?></h3>
                </div>
            </div>
        </div>
                <div class="row">
                   


                    <?php $__currentLoopData = $all_featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin-bottom-30">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.single','data' => ['id' => $data->id,'badge' => $data->badge,'image' => $data->image,'title' => $data->title,'slug' => $data->slug,'subCategoryId' => $data->sub_category_id,'salePrice' => $data->sale_price,'category' => $data->category]]); ?>
<?php $component->withName('frontend.product.single'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->id),'badge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->badge),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->title),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'subCategoryId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->sub_category_id),'salePrice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->sale_price),'category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->category)]); ?>
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/partials/featured-products.blade.php ENDPATH**/ ?>
<div class="product-single-item">
    <div class="product-header">
        <div class="img-icon">
            <?php echo render_image_markup_by_attachment_id($image,'','grid'); ?>

            <?php if(!empty($badge)): ?>
            <span class="badge"><?php echo e($badge); ?></span>
            <?php endif; ?>
            <div class="social-link">
                <ul>
                    <li>
                        <a href="#" class="wishlist" id="wishlist" data-product_id="<?php echo e($id); ?>" data-product_title="<?php echo e($title); ?>"><i class="far fa-heart"></i></a>
                    </li>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.quickview.li','data' => ['id' => $id]]); ?>
<?php $component->withName('quickview.li'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="pcontent">
        <h4 class="title"><a href="<?php echo e(route('frontend.products.single',['slug'=>$slug,'id'=>$id])); ?>"><?php echo e($title); ?></a></h4>
        <p class="info-text">(<?php echo e($subCategoryId ? get_product_category_name_by_id($subCategoryId) : optional($category)->name); ?>)</p>
    </div>
    <div class="product-wrap ">
        <span class="sign"><?php echo e(amount_with_currency_symbol($salePrice)); ?></span>
        <?php if(!empty($regularPrice)): ?><del class="del-price"><?php echo e(amount_with_currency_symbol($regularPrice)); ?></del><?php endif; ?>
    </div>
    <div class="product-footer padding-bottom-30">
        <div class="btn-wrapper">
            <a href="<?php echo e(route('frontend.products.add.to.cart')); ?>" class="boxed-btn ajax_add_to_cart" data-product_id="<?php echo e($id); ?>" data-product_title="<?php echo e($title); ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <?php echo e(get_static_option('product_add_to_cart_button_text')); ?></a>
        </div>
    </div>
</div><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/frontend/product/single.blade.php ENDPATH**/ ?>
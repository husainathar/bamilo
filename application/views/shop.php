<?php $this->load->view('html_tags');?>
<!-- Class ( site_boxed - dark - preloader1 - preloader2 - preloader3 - light_header - dark_sup_menu - menu_button_mode - transparent_header - header_on_side ) -->
<body class="light_header">
<div id="main_wrapper">

    <!-- Main Header -->
    <?php $this->load->view('header');?>
    <!-- End Main Header -->

    <!-- Add To Cart -->
    <section class="content_section">
        <input type="hidden" name="hdnCategoryId" id="hdnCategoryId" value="<?=$categoryId;?>">
        <div class="content content_spacer clearfix">
            <!-- content -->
            <div class="content_block col-md-9 f_left">
                <h2 class="title1 upper">Products</h2>
                <!-- Products -->
                <ul id="products-list" class="products_filter clearfix">
                    <?php if(isset($products) and !empty($products)) { foreach($products as $row) { ?>
                    <li class="filter_item_block " data-animation-delay="300" data-animation="rotateInUpLeft">
                        <div class="add2cart_slide">
                            <div class="add2cart_image">
                                <a data-rel="magnific-popup" href="<?=base_url() . $row['image_url'];?>">
                                    <span class="add2cart_zoom"><i class="ico-plus3"></i></span>
                                    <img src="<?=base_url() . $row['image_url'];?>" width="200" height="200" alt="<?=$row['desc'];?>">
                                </a>
                            </div>
                            <div class="add2cart_details">
                                <div class="con_cont">
                                    <a href="#" class="add2cart_prod_name"><?=$row['model'];?></a>
                                    <span class="add2cart_prod_price">
                                        <ins>$<?=$row['price'];?></ins>
                                    </span>
                                </div>
                                <div class="add2cart_buttons clearfix">
                                    <a href="#" class="pro_add2cart_add"><i class="ico-cart"></i>Buy Now</a>
                                    <a href="<?=site_url('product-details/' . $row['product_id']);?>" class="pro_add2cart_details"><i class="ico-angle-right"></i>Show Details</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } } else { ?>
                        <li>Sorry, no product found.</li>
                    <?php } ?>
                </ul>
                <!-- End Products -->
            </div>
            <!-- End content -->

            <!-- sidebar -->
            <aside class="col-md-3 right_sidebar">
                <h2 class="title1 upper">Category</h2>
                <?php
                    function parseCategory($array) {
                        if (count($array)) {
                            echo "<ul class='list-unstyled'>";
                            foreach ($array as $vals) {
                                echo "<li class='' id=\"".$vals['category_id']."\"><a href='javascript:void(0);' data-category-id='".$vals['category_id']."' class='category-list'>".$vals['category_name'];
                                if (count($vals['sub_categories'])) {
                                    parseCategory($vals['sub_categories']);
                                }
                                echo "</a></li>";
                            }
                            echo "</ul>";
                        }
                    }
                ?>
                <?php  if(isset($categories) and !empty($categories)){parseCategory($categories); } ?>
               <br>
               <?php if(isset($attributes) and !empty($attributes)){ foreach($attributes as $attributeId => $v) { ?>
                   <h2 class="title1"><?=$v['attribute_name'];?></h2>
                   <?php if(isset($v['options']) and !empty($v['options'])) { ?>
                   <ul class="list clearfix">
                       <?php foreach($v['options'] as $optionId => $option) { ?>
                           <li><input type="checkbox" class="category-attributes" name="chkAttributes[]" id="chkAttributes_<?=$optionId;?>" value="<?=$optionId;?>"> <?=$option;?></li>
                       <?php } ?>
                   </ul><br>
                   <?php } ?>
               <?php } } ?>
            </aside>
            <!-- End sidebar -->
        </div>

    </section>
    <!-- End Add To Cart  -->

    <!-- Footer  -->
    <?php $this->load->view('footer'); ?>
    <!-- End Footer -->
</body>
<script src="<?=base_url(); ?>js/appJS/shop.js"></script>
</html>
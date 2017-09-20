<?php $this->load->view('html_tags');?>
<!-- Class ( site_boxed - dark - preloader1 - preloader2 - preloader3 - light_header - dark_sup_menu - menu_button_mode - transparent_header - header_on_side ) -->
<body class="light_header">
<div id="main_wrapper">

    <!-- Main Header -->
    <?php $this->load->view('header');?>
    <!-- End Main Header -->

    <!-- Single Product -->
    <?php if(isset($products) and !empty($products)){ $products = $products[0];?>
    <div class="content row_spacer">
        <div class="shop_product_wrapper clearfix">
            <!-- Single Product -->
            <div class="single_product_slider">
                <div class="thumbs_gall_slider_con content_thumbs_gall">
                    <div class="thumbs_gall_slider_larg ">
                        <div class="item">
                            <a href="<?=base_url() . $products['image_url'];?>">
                                <img src="<?=base_url() . $products['image_url'];?>">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single_product_details">
                <h1 class="single_product_title upper"><?=$products['model'];?></h1>
                <div class="single_product_price_con clearfix">
                    <ins>$<?=$products['price'];?></ins>
                </div>
                <p class="single_product_desc"><?=$products['desc'];?></p>
                    <div class="product_options clearfix">
                        <?php if(isset($attributes) and !empty($attributes)){ foreach($attributes as $attributeId => $v) { ?>
                            <div class="product_option_item">
                                <span class="option_name"><?=$v['attribute_name'];?></span>
                                <label class="orderby_label product_option_con">
                                    <select class="orderby" id="option_size" name="option_size">
                                        <option value="">Select...</option>
                                        <?php foreach($v['options'] as $optionId => $option) { ?>
                                            <option value="<?=$optionId;?>" class="active"><?=$option;?></option>
                                        <?php } ?>
                                    </select>
                                </label>
                            </div>
                        <?php } } ?>
                    </div>
            </div>
            <!-- End Single Product -->
        </div>
    </div>
    <?php } ?>
    <!-- End Single Product -->

    <!-- Footer  -->
    <?php $this->load->view('footer'); ?>
    <!-- End Footer -->
</body>
<script src="<?=base_url(); ?>js/appJS/shop.js"></script>
</html>
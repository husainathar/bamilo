<?php if(isset($products) and !empty($products)) { foreach($products as $row) { ?>
    <li class="filter_item_block " data-animation-delay="300" data-animation="rotateInUpLeft">
        <div class="add2cart_slide">
            <div class="add2cart_image">
                <a data-rel="magnific-popup" href="<?=base_url() . $row['image_url'];?>" class="add2cart_img">
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

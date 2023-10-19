<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('boutique_designer_shop_slider_arrows') == '1'){ ?>
    <section id="slider">
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
          <?php
            for ( $i = 1; $i <= 4; $i++ ) {
              $mod =  get_theme_mod( 'boutique_designer_shop_post_setting' . $i );
              if ( 'page-none-selected' != $mod ) {
                $boutique_designer_shop_slide_post[] = $mod;
              }
            }
             if( !empty($boutique_designer_shop_slide_post) ) :
            $args = array(
              'post_type' =>array('post'),
              'post__in' => $boutique_designer_shop_slide_post
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){ ?>
                  <img class="my-5" src="<?php the_post_thumbnail_url('full'); ?>"/>
                <?php }else { ?><div class="bg-color"></div> <?php } ?>
              <div class="carousel-caption slide-inner">
                <?php if( get_theme_mod('boutique_designer_shop_slide_heading') != ''){ ?>
                  <h3><?php echo esc_html(get_theme_mod('boutique_designer_shop_slide_heading','')); ?></h3>
                <?php }?>
                <h2 class="slider-title"><?php the_title();?></h2>
                <p class="mb-0"><?php echo wp_trim_words( get_the_content(), 30 );?></p>
                <div class="home-btn my-lg-4 my-md-4 my-3">
                  <a class="p-lg-2 p-md-2 p-1" href="<?php the_permalink(); ?>"><?php echo esc_html('READ MORE','boutique-designer-shop'); ?></a>
                </div>
              </div>
            </div>
            <?php $i++; endwhile;
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
          <div class="no-postfound"></div>
            <?php endif;
          endif;?>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
            </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php if( get_option('boutique_designer_shop_product_enable') == '1'){ ?>
    <section id="millions-of-hours" class="py-5">
      <div class="container">
          <div class="product-heading text-center">
            <?php if( get_theme_mod('boutique_designer_shop_millions_of_hours_sub_heading') != '' ){ ?>
              <h6><?php echo esc_html(get_theme_mod('boutique_designer_shop_millions_of_hours_sub_heading')); ?></h6>
            <?php }?>
            <?php if( get_theme_mod('boutique_designer_shop_millions_of_hours_heading') != '' ){ ?>
              <h3><?php echo esc_html(get_theme_mod('boutique_designer_shop_millions_of_hours_heading')); ?></h3>
            <?php }?>
          </div>
          <div class="row mt-5">
            <?php
            $boutique_designer_shop_catData = get_theme_mod('boutique_designer_shop_millions_of_hours_category');
            $boutique_designer_shop_count_catData = get_theme_mod('boutique_designer_shop_millions_of_hours_number');
            if ( class_exists( 'WooCommerce' ) ) {
            $boutique_designer_shop_args = array(
              'post_type' => 'product',
              'posts_per_page' => $boutique_designer_shop_count_catData,
              'product_cat' => $boutique_designer_shop_catData,
              'order' => 'ASC'
            );
            $loop = new WP_Query( $boutique_designer_shop_args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
              <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <div class="product-img wrapper mb-3">
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, ''); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                  <div class="box-content">
                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                  </div>
                  <div class="sale-tag">
                    <span><?php woocommerce_show_product_sale_flash( $post, $product ); ?></span>
                  </div>
                  <div class="product-details text-center py-2">
                    <h4><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
                    <span><?php esc_attr( apply_filters( 'woocommerce_product_price_class', '' ) ); ?><?php echo ( $product->get_price_html()); ?></span>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_query(); ?>
            <?php } ?>
          </div>
        
      </div>
    </section>
  <?php } ?>
</main>

<?php get_footer(); ?>
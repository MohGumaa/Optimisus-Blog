<?php
/**
 * Partial template for content in front page
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$post_not_to_repeat = [];
?>
<?php 
    $args = array( 
		'cat' => array(3),
        'posts_per_page' => 7,
        'post_type' => 'post',
	); 

    $sectionA = new WP_Query( $args );
    if ( $sectionA->have_posts() ) :
        $loopSectionA = 0;
?>
    <section class="pb-4 section-a">
        <div class="container">
            <div class="latest-posts">
                <?php  while( $sectionA->have_posts() ) : $sectionA->the_post(); if ($loopSectionA === 0) :?>
                    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <div class="post-bg w-100 h-100" style="background: url('<?php the_post_thumbnail_url('large');?>'); background-repeat: no-repeat; background-position: center; background-size: cover;  transform: scale(1);">
                            <a href="<?php the_permalink();?>" class="d-block w-100 h-100"></a>
                        </div>
                        <div class="post-body">
                            <span class="d-block card-text">
                                <small class="fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                <small class="ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                            </span>
							<?php
                            the_title(
                                sprintf( '<h1 class="post-title"><a href="%s" class="text-white" rel="bookmark">', esc_url( get_permalink() ) ),
                                '</a></h1>'
                            );
                            ?>
                        </div>
                    </article>
                <?php elseif ( $loopSectionA  === 4 &&  is_active_sidebar( 'custom-adspost' ) ) : ?>
                    <div class="grid-card shadow-sm overflow-hidden">
                        <article>
                            <div class="card h-100">
                                <?php dynamic_sidebar( 'custom-adspost' ); ?>
                            </div>
                        </article>
                    </div>
                <?php else : ?>
                    <div class="grid-card shadow-sm">
                        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                            <div class="card h-100">
                                <a href="<?php the_permalink();?>" class="card-img-top">
                                    <?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
                                </a>
                                <div class="card-body px-2 pt-2 pb-1">
                                    <span class="d-block card-text mb-2">
                                        <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                        <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                    </span>
                                    <?php
                                    the_title(
                                        sprintf( '<h2 class="card-title fs-medium"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                        '</a></h2>'
                                    );
                                    ?>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endif; $loopSectionA++; array_push($post_not_to_repeat, get_the_ID());  endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>


<?php 
    $args = array( 
        'posts_per_page' => 7,
        'post_type' => 'post',
        'category_name'  => 'press-releases',
        'post__not_in'   => $post_not_to_repeat,
    ); 
    $sectionB = new WP_Query( $args );
    if ( $sectionB->have_posts() ) :

        $loopSectionB = 0;
        $category_id = get_cat_ID( 'Press Releases' );
        $category_link = get_category_link( $category_id );
?>

    <section class="pt-4 section-b">
        <div class="container position-relative">
        
            <div class="section-header">
                <h2 class="section-title">
                    <a href="<?php echo esc_url( $category_link ); ?>">Press Releases</a>
                </h2>
                <div class="subtitle">Press Releases</div>
            </div>

            <div class="row">
                <?php while ( $sectionB->have_posts() ) : $sectionB->the_post();  if (++$loopSectionB < 4) :?>
                    <div class="col-md-4 col-sm-6 col-12 mb-3 grid-card">
                        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                            <div class="card border-0 h-100 bg-transparent">
                                <a href="<?php the_permalink();?>" class="card-img-top">
                                    <?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
                                </a>
                                <div class="card-body py-2 px-0">
                                    <span class="d-block card-text mb-2">
                                        <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                        <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                    </span>
                                    <?php
                                    the_title(
                                        sprintf( '<h3 class="card-title fs-normal"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                        '</a></h3>'
                                    );
                                    ?>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php else: ?>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 grid-card <?php echo ++$loopSectionB === 7 ? 'd-block d-sm-none d-md-none d-lg-block' : '' ?>">
                        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                            <div class="card border-0 h-100 bg-transparent">
                                <a href="<?php the_permalink();?>" class="card-img-top">
                                    <?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
                                </a>
                                <div class="card-body py-2 px-0">
                                    <span class="d-block card-text mb-2">
                                        <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                        <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                    </span>
                                    <?php
                                    the_title(
                                        sprintf( '<h3 class="card-title fs-medium"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                        '</a></h3>'
                                    );
                                    ?>
                                </div>
                            </div>
                        </article>
                    </div>

                <?php endif; array_push($post_not_to_repeat, get_the_ID()); endwhile;?>
            </div>

        </div>
    </section>

<?php endif; wp_reset_postdata(); ?>

<div class="container">

    <?php 
        $args = array( 
            'posts_per_page' => 6,
            'post_type' => 'post',
            'category_name'  => 'market',
            'post__not_in'   => $post_not_to_repeat,
        ); 

        $sectionC = new WP_Query( $args );

        if ( $sectionC->have_posts() ) :
            $loopSectionC = 0;
            $category_id = get_cat_ID( 'Market' );
            $category_link = get_category_link( $category_id );
    ?>

        <section class="pt-4 section-c">

            <div class="header-with-underline border-bottom my-4">
                <h2 class="heading">
                    <a href="<?php echo esc_url( $category_link ); ?>" class="text-dark">Market</a>
                </h2>
            </div>

            <div class="row">
                <?php while ( $sectionC->have_posts() ) : $sectionC->the_post(); ?>
                    <div class="col-md-4 col-sm-6 col-12 mb-3 grid-card">
                        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                            <div class="card border-0 h-100 bg-transparent">
                                <a href="<?php the_permalink();?>" class="card-img-top">
                                    <?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
                                </a>
                                <div class="card-body py-2 px-0">
                                    <span class="d-block card-text mb-2">
                                        <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                        <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                    </span>
                                    <?php
                                    the_title(
                                        sprintf( '<h3 class="card-title fs-normal"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                        '</a></h3>'
                                    );
                                    ?>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php array_push($post_not_to_repeat, get_the_ID()); endwhile;?>
            </div>

        </section>

    <?php endif; wp_reset_postdata(); ?>

    <!-- Three Sections -->
    <div class="row">
        
        <div class="col-lg-4 col-md-6 col-12">

            <?php 
                $args = array( 
                    'posts_per_page' => 5,
                    'post_type' => 'post',
                    'category_name'  => 'features',
                    'post__not_in'   => $post_not_to_repeat,
                );

                $sectionD = new WP_Query( $args );
                if ( $sectionD->have_posts() ) :
                    $loopSectionD = 0;
                    $category_id = get_cat_ID( 'Features' );
                    $category_link = get_category_link( $category_id );
            ?>

                <section class="wrapper section-d">

                    <div class="header-with-underline border-bottom my-4">
                        <h2 class="heading">
                            <a href="<?php echo esc_url( $category_link ); ?>" class="text-dark">features</a>
                        </h2>
                    </div>
                    
                    <?php while ( $sectionD->have_posts() ) : $sectionD->the_post(); if ( ++$loopSectionD === 1 ) : ?>
                        <div class="grid-card">
                            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                <div class="card border-0 h-100 bg-transparent">
                                    <a href="<?php the_permalink();?>" class="card-img-top">
                                        <?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
                                    </a>
                                    <div class="card-body py-2 px-0">
                                        <span class="d-block card-text mb-2">
                                            <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                            <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                        </span>
                                        <?php
                                        the_title(
                                            sprintf( '<h3 class="card-title fs-normal"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                            '</a></h3>'
                                        );
                                        ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php else : ?>
                        <?php
                            the_title(
                                sprintf( '<h4 class="fs-medium fw-lighter border-top py-2 my-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                '</a></h4>'
                            );
                            ?>
                    <?php endif; array_push($post_not_to_repeat, get_the_ID()); endwhile;?>

                </section>
            
            <?php endif; wp_reset_postdata(); ?>
            
        </div>

        <div class="col-lg-4 col-md-6 col-12">

            <?php 
                $args = array( 
                    'posts_per_page' => 5,
                    'post_type' => 'post',
                    'category_name'  => 'learn',
                    'post__not_in'   => $post_not_to_repeat,
                );

                $sectionE = new WP_Query( $args );
                if ( $sectionE->have_posts() ) :
                    $loopSectionE = 0;
                    $category_id = get_cat_ID( 'Learn' );
                    $category_link = get_category_link( $category_id );
            ?>

                <section class="wrapper section-e">

                    <div class="header-with-underline border-bottom my-4">
                        <h2 class="heading">
                            <a href="<?php echo esc_url( $category_link ); ?>" class="text-dark">Learn</a>
                        </h2>
                    </div>
                    
                    <?php while ( $sectionE->have_posts() ) : $sectionE->the_post(); if ( ++$loopSectionE === 1 ) : ?>
                        <div class="grid-card">
                            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                <div class="card border-0 h-100 bg-transparent">
                                    <a href="<?php the_permalink();?>" class="card-img-top">
                                        <?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
                                    </a>
                                    <div class="card-body py-2 px-0">
                                        <span class="d-block card-text mb-2">
                                            <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                            <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                        </span>
                                        <?php
                                        the_title(
                                            sprintf( '<h3 class="card-title fs-normal"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                            '</a></h3>'
                                        );
                                        ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php else : ?>
                        <?php
                            the_title(
                                sprintf( '<h4 class="fs-medium fw-lighter border-top py-2 my-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                '</a></h4>'
                            );
                            ?>
                    <?php endif; array_push($post_not_to_repeat, get_the_ID()); endwhile;?>

                </section>

            <?php endif; wp_reset_postdata(); ?>

        </div>

        <div class="col-lg-4 col-md-12 col-12">

            <?php 
                $args = array( 
                    'posts_per_page' => 5,
                    'post_type' => 'post',
                    'category_name'  => 'reviews',
                    'post__not_in'   => $post_not_to_repeat,
                );

                $sectionF = new WP_Query( $args );
                if ( $sectionF->have_posts() ) :
                    $loopSectionF = 0;
                    $category_id = get_cat_ID( 'Reviews' );
                    $category_link = get_category_link( $category_id );
            ?>

                <section class="wrapper section-f">

                    <div class="header-with-underline border-bottom my-4">
                        <h2 class="heading">
                            <a href="<?php echo esc_url( $category_link ); ?>" class="text-dark">reviews</a>
                        </h2>
                    </div>
                    
                    <?php while ( $sectionF->have_posts() ) : $sectionF->the_post(); if ( ++$loopSectionF === 1 ) : ?>
                        <div class="grid-card">
                            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                <div class="card border-0 h-100 bg-transparent">
                                    <a href="<?php the_permalink();?>" class="card-img-top">
                                        <?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
                                    </a>
                                    <div class="card-body py-2 px-0">
                                        <span class="d-block card-text mb-2">
                                            <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                            <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                        </span>
                                        <?php
                                        the_title(
                                            sprintf( '<h3 class="card-title fs-normal"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                            '</a></h3>'
                                        );
                                        ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php else : ?>
                        <?php
                            the_title(
                                sprintf( '<h4 class="fs-medium fw-lighter border-top py-2 my-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                '</a></h4>'
                            );
                            ?>
                    <?php endif; array_push($post_not_to_repeat, get_the_ID()); endwhile;?>

                </section>

            <?php endif; wp_reset_postdata(); ?>

        </div>

        <?php 
            $args = array( 
                'posts_per_page' => 5,
                'post_type' => 'post',
                'category_name'  => 'price-analysis',
                'post__not_in'   => $post_not_to_repeat,
            ); 

            $sectionF = new WP_Query( $args );
        
            if ( $sectionF ->have_posts() ) :
                $loopSectionF = 0;
                $category_id = get_cat_ID( 'Price Analysis' );
                $category_link = get_category_link( $category_id );
        ?>

            <section class="py-4 section-f">
                <div class="header-with-underline border-bottom my-4">
                    <h2 class="heading">
                        <a href="<?php echo esc_url( $category_link ); ?>" class="text-dark">Price Analysis</a>
                    </h2>
                </div>
                
                <div class="sectionF-posts">

                    <?php while ( $sectionF ->have_posts() ) : $sectionF ->the_post(); if (++$loopSectionF == 1) :?>
                        <div class="main">
                            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                <div class="card border-0 h-100">
                                    <a href="<?php the_permalink();?>" class="card-img-top">
                                        <?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
                                    </a>
                                    <div class="card-body py-2 px-0">
                                        <span class="d-block card-text mb-2">
                                            <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                            <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                        </span>
                                        <?php
                                        the_title(
                                            sprintf( '<h3 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                            '</a></h3>'
                                        );
                                        ?>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php else: ?>
                        <div class="small-box">
                            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                <div class="card border-0 h-100">
                                    <a href="<?php the_permalink();?>" class="card-img-top">
                                        <?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
                                    </a>
                                    <div class="card-body pt-2 pb-0 px-0">
                                        <span class="d-block card-text mb-2">
                                            <small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                            <small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                        </span>
                                        <?php
                                        the_title(
                                            sprintf( '<h3 class="card-title fs-medium"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                            '</a></h3>'
                                        );
                                        ?>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </article>
                        </div>

                    <?php endif; array_push($post_not_to_repeat, get_the_ID()); endwhile;?>

                </div>
                        
            </section>

        <?php endif; wp_reset_postdata(); ?>

    </div>

</div>




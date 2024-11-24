<?php get_header(); ?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <h1><?php esc_html_e('Blog', 'renegade-insurance') ?></h1>
      <div class="container">
        <div class="blog-items">
          <?php
          if (have_posts()):
            while (have_posts()) : the_post();
              get_template_part('template-parts/content');
            endwhile;
          ?>
            <div class="rgi-pagination">
              <div class="pages new">
                <?php previous_posts_link(esc_html__("<< Newer posts", 'renegade-insurance')); ?>
              </div>
              <div class="pages old">
                <?php next_posts_link(esc_html__("Older posts >>", 'renegade-insurance')); ?>
              </div>
            </div>
          <?php
          else: ?>
            <p><?php esc_html_e('Nothing yet to be displayed!', 'renegade-insurance') ?></p>
          <?php endif; ?>
        </div>

      </div>
    </main>
  </div>
</div>
<?php get_footer(); ?>
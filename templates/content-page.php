<article <?php post_class('row'); ?>>
    <div class="medium-12 columns">
    <header>
      <h1 class="entry-title uppercase"><?php the_title(); ?><span class="trait-lozanges"></span></h1>
    </header>
    
    <div class="entry-content row">
        <?php the_content(); ?>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </div>
</article>

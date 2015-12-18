<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
   
    <header>
      <h1 class="entry-title uppercase"><?php the_title(); ?><span class="trait-lozanges"></span></h1>
    </header>
    
    <div class="entry-content row">
         <aside id="projet-infos" class="medium-4 columns">
            
            <?php
                $terms = get_the_terms( $post->ID, 'Compétences' );
                if ( $terms && ! is_wp_error( $terms ) ) : 
                    $draught_links = array();
                    foreach ( $terms as $term ) {
                        $draught_links[] = '<a href="/a-propos/'.$term->slug .'" title="voir la page '. $term->name .'">'.$term->name .'</a>';
                    }
                    $on_draught = join( " et ", $draught_links );
                ?>
                <p>Sur ce projet, Alberto a participé en tant que&nbsp;: <?php echo $on_draught; ?>.</p>
            <?php endif; ?>

             <p><?php the_meta(); ?> </p>
             
         </aside>
         
          <div id="projet-main-content" class="medium-8 columns">
               
                <?php the_content(); ?>
          </div>
          
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    
  </article>
  
  <div id="wrapper-comments">
  <?php comments_template('/templates/comments.php'); ?>
  </div>
                                              
<div class="last-section-deco"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco-projet.svg" class=" rotate180"></div>
                                               
<?php endwhile; ?>

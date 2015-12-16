<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
      <p>préciser auteur ou comédien ?</p>
    </header>
    <div class="entry-content row">
         <aside id="projet-infos" class="medium-4 columns">
             <ul>
                 <li>image</li>
                 <li>Personnage : <span>6</span></li>
                 <li>Durée : <span>2H</span></li>
                 <li>Année : <span>2015</span></li>
                 <li>
                     Un petit texte descriptif...
                 </li>
             </ul>
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

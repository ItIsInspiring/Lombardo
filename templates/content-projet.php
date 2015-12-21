<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    <div class="small-10 small-centered medium-12 columns">

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

                <ul id="list_infosProjet">
                    <?php $infosProjet = get_post_meta( $post->ID, 'infosProjet', true ); 
                    foreach( $infosProjet as $infoProjet){
                       echo " <li><strong>Date de création :</strong> ". $infoProjet['annee-de-creation'] . '</li>';
                       echo " <li><strong>Durée :</strong> ". $infoProjet['duree'] . '</li>';
                       echo " <li><strong>Personnage(s) :</strong> ". $infoProjet['personnages'] . '</li>';
                       echo " <li><strong>Équipe :</strong> ". $infoProjet['equipe'] . '</li>';    
                    }?>
                </ul>

             </aside>

             <div id="projet-main-content" class="medium-8 columns">
                   <?php echo $infoProjet['synopsis'] ?>
                    <?php the_content(); ?>
             </div><!-- fin de #projet-main-content -->
          
    </div><!-- fin de entry-content -->  
         
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      <?php
            $defaults = array(
                'before'           => '<p>' . __( 'Pages:' ),
                'after'            => '</p>',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'number',
                'separator'        => ' ',
                'nextpagelink'     => __( 'Next page' ),
                'previouspagelink' => __( 'Previous page' ),
                'pagelink'         => '%',
                'echo'             => 1
            );

                wp_link_pages( $defaults );

        ?>
    </footer>
    
    </div><!-- fin de small-10 -->
  </article>
  
 
  <div id="wrapper-comments">
      <div class="row">
          <div class="small-10 medium-10 small-centered columns">
              <?php comments_template('/templates/comments.php'); ?>
          </div>  
      </div>
  </div>
                                              
<div class="last-section-deco"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/bg-bloc-deco-projet.svg" class=" rotate180"></div>
                                               
<?php endwhile; ?>

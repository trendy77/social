<?php

// TEMPLATE - VIRAL CONTENT

// Run the loop as normal
<?php if ( $featured->have_posts() ) : ?>
  
   <?php while ( $featured->have_posts() ) : $featured->the_post(); ?>
          // featured posts found, do stuff
   <?php endwhile; ?>
   
   <?php else: ?>
         // no featured posts found
<?php endif; ?>

<?php wp_reset_postdata(); ?>

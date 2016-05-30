				<div id="sidebar1" class="sidebar" role="complementary">

					<?php if ( is_active_sidebar( 'widget-default' ) ) : ?>

						<?php dynamic_sidebar( 'widget-default' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

					<?php endif; ?>

				</div>
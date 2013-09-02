<div class="share_this">
           
            <div class="social_buttons">
                <div class="lgn_fb">
                <a href="http://facebook.com/share.php?u=<?php the_permalink() ?>&amp;amp;t=<?php echo urlencode(the_title('','', false)) ?>" title="Share <?php _e('this post on Facebook', 'theron');?>">facebook</a>
                </div>
                <div class="lgn_twt">
                <a href="http://twitter.com/home?status=Reading: <?php the_title(); ?> <?php the_permalink();?>" title="Tweet <?php _e('this post', 'theron'); ?>">Twitter</a>
                </div>
                <div class="lgn_del">
				<a title="<?php _e('Submit to', 'theron'); ?> Delicious" href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>">del.icio.us</a>
                </div>
                <div class="lgn_digg">
                <a href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink() ?>&amp;amp;title=<?php echo urlencode(the_title('','', false)) ?>" title="Digg <?php _e('this post', 'theron'); ?>">digg</a>
                </div>
                <div class="lgn_stmbl">
                <a title="Stumble <?php _e('This', 'theron'); ?>" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php echo urlencode(the_title('','', false)) ?>">stumbleupon</a>
                </div>
                
                <div class="lgn_gplus">
                <a title="Plus One <?php _e('This', 'theron'); ?>"" href="https://plusone.google.com/_/+1/confirm?hl=en&url=<?php echo the_permalink(); ?>">Google +1</a>
                </div>
                
                <div class="lgn_pin">
                <a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>Pinterest</a>
                </div>
                
            </div>
            
</div>
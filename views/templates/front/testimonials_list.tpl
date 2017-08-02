<!-- Block moduleBlog -->
<div id="moduleBlog_block_left_blog" class="block">
    <h4>Testimonials!</h4>
    <div class="block_content">
        {foreach $testimonials as $testimonial}
            <p><a href="{$testimonial.link}">{$testimonial.author}</a></p>
        {/foreach}
    </div>
</div>
<!-- /Block moduleBlog -->

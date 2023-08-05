<?php $badge = get_post_meta($post->ID, 'Badge', true);
if ($badge) { ?>
    <aside class="toc-card">
        <h3 class="js-project-panel__toggle">What You Will Earn</h3>
        <div id="toc-menu" class="u-hidden">
            <img src="<?php echo $badge; ?>"/>
            <p>Click on the badge to find out more about the skills you will learn by completing this project.</p>
        </div>
    </aside>
<?php } ?>
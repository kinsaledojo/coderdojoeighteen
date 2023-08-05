<?php 
$editor = get_post_meta( $post->ID, $key = 'sushi_card_trinket');
$pdf = get_post_meta($post->ID, 'PDF', true);
$online = get_post_meta($post->ID, 'Online Editor', true);
$raspberry = get_post_meta($post->ID, 'Raspberry Pi', true);

if ($editor) { ?>

<aside class="toc-card">
    <h3 class="js-project-panel__toggle">Table of Contents</h3>
    <div id="toc-menu" class="u-hidden">
        <?php if ($editor) { ?>
            <p>Download and use the Scratch directly on your computer</p>
            <a id="next-link" href="<?php echo $editor[0]; ?>" class="navigation-link">Open In Editor</a>
        <?php } 

        if ($pdf) { ?>
            <p>Download a printable version of the Sushi Cards to use off line</p>
            <a id="next-link" href="<?php echo $pdf; ?>" class="navigation-link">Download PDF</a>
        <?php } 

        if ($online) { ?>
            <p>Visit the Scratch website to sign in if you have a Scratch account</p>
            <a id="next-link" href="<?php echo $online; ?>" class="navigation-link">Scratch Editor</a>
        <?php } 

        if ($raspberry) { ?>
            <p>View this project on the Raspberry Pi website where you can sign in</p>
            <a id="next-link" href="<?php echo $raspberry; ?>" class="navigation-link">View On Raspberry Pi</a>
        <?php } ?>
    </div>
</aside>

<?php } ?>



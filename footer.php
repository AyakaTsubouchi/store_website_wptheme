
</div>
<footer class="site-footer">
    Copyright © <?php
                        echo date("Y")
                        ?> <?php echo get_post_field("name", 533); ?> - All Rights Reserved.
</footer>
<div class="popup-button">

    <div class="message-button" data-toggle="modal" data-target="#messageModal" >
        <i class="fas fa-comment-alt"></i>
</div>
    <div class="close-button">
        <i class="fas fa-times"></i>
    </div>
</div>
<?php include('inc/message-modal.php'); ?>

<?php wp_footer(); ?>

</body>

</html>
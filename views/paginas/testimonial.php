<section class="testimoniales">
<?php foreach($testimoniales as $testimonial): ?>

    <div class="testimonial">

        <blockquote><?php echo $testimonial->contenido; ?></blockquote>
        <p><?php echo  '-' . $testimonial->nombreCompleto; ?></p>

    </div>  

<?php endforeach; ?> 
</section>


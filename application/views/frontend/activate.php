<?php include 'src/includes/header.php' ?>

<div class="content-recovery">
    <div class="row-content-recovery">
        <h2><?php echo $mail['title']; ?></h2>
        <p><?php echo $mail['message']; ?></p>
        <hr>
    </div>
</div>

<?php include 'src/includes/footer.php' ?>

<?php if($mail['redirect']): ?>
<script>
    setTimeout(() => {
        console.log('redirigiendo..');
        window.location = DOMAIN;
    }, 1000);
</script>
<?php endif; ?>

</body>

</html>
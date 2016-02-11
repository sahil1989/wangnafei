<h1>Password Reset</h1>
<div>
    <p>Hello, <?php echo  $firstname; ?>,</p>
    <p>
        You or someone else claimed new password.
    </p>
    <p>
        To <a href="<?php echo  $reset_url; ?>">create new password</a>, please follow the link below.
    </p>
    <p>
        <a href="<?php echo  $reset_url; ?>"><?php echo  $reset_url; ?></a>
    </p>
</div>
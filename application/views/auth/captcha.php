<div>
    <form method="post" action="<?=base_url('auth/captchas', get_protocol()); ?>">
		<?=$image; ?>
		<?=$word; ?>
        <input type="text" name="captcha" />
		<input type="submit" />        
    </form>
</div>
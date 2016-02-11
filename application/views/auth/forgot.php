<div>
    <form method="post" action="<?=base_url('auth/forgot', get_protocol());?>">
        <?php
            $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
        ?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
        <div class="row" style="min-height:470px;">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1>Forgot Password</h1>
                <div class="form-group">
                    <label for="inputEmail">E-mail</label>
                    <input type="text"
                           name="email"
                           id="inputEmail"
                           class="form-control"
                           placeholder="Email address"
                           value="<?=set_value('email'); ?>"
                        >
						<div class="errors-list" style="color:red;"><?=form_error('email'); ?></div>
                </div>
               
                <div>
                    
                </div>
                <div class="text-right">
                    <a href="<?=base_url('auth/login');?>" class="btn btn-link">Login</a>
                    <input type="submit" value="Send" class="btn btn-primary">
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </form>
</div>
<div>
    <form method="post" action="<?=base_url('auth/login', get_protocol());?>">
        <?php
            $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
        ?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1>Authorization</h1>
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
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
					<div class="errors-list" style="color:red;"><?=form_error('password'); ?></div>
                </div>
                <div>
                    <a href="#">Forgot Password?</a>
                </div>
                <div>
                    
                </div>
                <div class="text-right">
                    <a href="<?=base_url('auth/registration', get_protocol());?>" class="btn btn-link">Registration</a>
                    <input type="submit" value="Log In" class="btn btn-primary">
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </form>
</div>
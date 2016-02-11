<div>
    <form method="post" action="<?= base_url('auth/registration', get_protocol()) ?>">
        <?php
            $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
        ?>
        <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1>Sign Up</h1>
                <div class="form-group">
                    <label for="inputEmail">E-mail</label>
                    <input type="text"
                           name="email"
                           id="inputEmail"
                           class="form-control"
                           placeholder="Your Email address"
                           value="<?php echo  set_value('email'); ?>"
                        >
						<span style="color:red;"><?php echo form_error('email'); ?></span>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
					<span style="color:red;"><?php echo form_error('password'); ?></span>
                </div>
                <div class="form-group">
                    <label for="inputPasswordConfirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="inputPasswordConfirmation" class="form-control" placeholder="Password Again" >
					<span style="color:red;"><?php echo form_error('password_confirmation'); ?></span>
                </div>
             
                <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text"
                           name="firstname"
                           id="inputFirstName"
                           class="form-control"
						   placeholder="Your First Name"
                           value="<?php echo  set_value('firstname'); ?>"
                        >
						<span style="color:red;"><?php echo form_error('firstname'); ?></span>
						
                </div>
                <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text"
                           name="lastname"
                           id="inputLastName"
                           class="form-control"
						   placeholder="Your Last Name"
                           value="<?php echo  set_value('lastname'); ?>"
                        >
						<span style="color:red;"><?php echo form_error('lastname'); ?></span>
                </div>

                <div class="text-right">
                    <a href="<?php echo base_url('auth/login', get_protocol());?>" class="btn btn-link">Sign In</a>
                    <input type="submit" value="Register" class="btn btn-primary">
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br />
        <br />
    </form>
</div>
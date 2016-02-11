<header id="header-page">
     <div class="header-page__inner">
        <div class="container">
           <div class="logo"><a href="<?=base_url('', get_protocol());?>"><img src="<?php echo base_url('assets/images/logo.png', get_protocol()); ?>" alt=""></a></div>
           <nav class="navigation awe-navigation" data-responsive="1200">
              <ul class="menu-list">
                 <li class="menu-item-has-children current-menu-parent">
                    <a href="<?= base_url('', get_protocol()); ?>"><?php echo $this->lang->line('home'); ?></a>
                 </li>
                 <?php if (auth()->is_logged()) { ?>
                 <li style="border-right:1px solid #f69825;border-left:1px solid #f69825" class="menu-item-has-children"><a href="<?= base_url('profile', get_protocol()) ?>"><?= auth()->get('firstname') ?></a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('profile', get_protocol()) ?>"><?php echo $this->lang->line('profile'); ?></a>
                        </li>
                        <li><a href="<?= base_url('auth/logout', get_protocol()) ?>"><?php echo $this->lang->line('logout'); ?></a>
                        </li>
                    </ul>
                </li>
                <?php
                }
        				else {
        					?>
                            <li style="border-right:1px solid #f69825;border-left:1px solid #f69825" class="menu-item-has-children"><a href="<?= base_url('auth/login', get_protocol())  ?>"><?php echo $this->lang->line('login'); ?></a>
                           
                        </li>
                            <?php
        				}
        				?>
                <?php /*<li style="border-right:1px solid #f69825;border-left:1px solid #f69825" class="menu-item-has-children">
                  <?php
                  if($this->session->userdata('langtype') == 'chinese') { 
                    ?>
                    <a href="<?= base_url('trip/set_language/english') ?>">English</a>
                    <?php
                  } else {
                    ?>
                    <a href="<?= base_url('trip/set_language/chinese') ?>">Chinese</a>
                    <?php
                  }
                  ?>
                    
                </li>*/ ?>

                  
              </ul>
           </nav>
           <!--<div class="search-box">
              <span class="searchtoggle"><?php echo $this->lang->line('login'); ?></span>
           </div>-->
           <a class="toggle-menu-responsive" href="#">
              <div class="hamburger"><span class="item item-1"></span> <span class="item item-2"></span> <span class="item item-3"></span></div>
           </a>
        </div>
     </div>
  </header>
  <style>
  #text-dangerfontlg, .text-dangerfontlg {
    color:red;
    font-size:14px;
    font-weight: bold;
  }
  </style>
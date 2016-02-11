<div class="widget widget_price_filter" style="margin-top: 13px;">
    <h3><?php echo $this->lang->line('price_range'); ?></h3>
    <div class="price-slider-wrapper">
        <div class="price-slider"></div>
        <div class="price_slider_amount">
            <div class="price_label"><span class="from"></span> - <span class="to"></span>
            </div>
			<input type='hidden' id="fromrange" value="200" />
			<input type='hidden' id="torange" value="2000"/>
        </div>
    </div>
</div>

<div class="widget widget_product_tag_cloud">
    <h3><?php echo $this->lang->line('no_of_stops'); ?></h3>
    <div class="tagcloud">
    <a onclick="noofstopsn('All')" id="nstop1" class="current"><?php echo $this->lang->line('all'); ?></a> 
    <a onclick="noofstopsn('0')" id="nstop2" >0</a> 
    <a onclick="noofstopsn('1')" id="nstop3" >1</a>
    <a onclick="noofstopsn('1m')" id="nstop4" >1+</a>
	<input type="hidden" id="noofstops" value="All" />
    </div>
</div>

<div class="widget checkout-page__sidebar">
    <h3><?php echo $this->lang->line('departure_time'); ?></h3>
    <ul>
        <li><a onclick="depat('All')" class="current" id="fdepart1"><?php echo $this->lang->line('all'); ?></a>
        </li>
        <li><a onclick="depat('1')" id="fdepart2"><?php echo $this->lang->line('before_6_am'); ?></a>
        </li>
        <li><a onclick="depat('2')" id="fdepart3"><?php echo $this->lang->line('6_am_to_12_pm'); ?></a>
        </li>
        <li><a onclick="depat('3')" id="fdepart4"><?php echo $this->lang->line('12_pm_to_6_pm'); ?></a>
        </li>
        <li><a onclick="depat('4')" id="fdepart5"><?php echo $this->lang->line('after_6_pm'); ?></a>
        </li>
    </ul>
	<input type="hidden" id="depattime" value="All" />
	
</div>
<div class="widget checkout-page__sidebar">
    <h3><?php echo $this->lang->line('arrival_time'); ?></h3>
    <ul>
        <li><a onclick="arrival('All')" class="current" id="farrival1"><?php echo $this->lang->line('all'); ?></a>
        </li>
        <li><a onclick="arrival('1')" id="farrival2"><?php echo $this->lang->line('before_6_am'); ?></a>
        </li>
        <li><a onclick="arrival('2')" id="farrival3"><?php echo $this->lang->line('6_am_to_12_pm'); ?></a>
        </li>
        <li><a onclick="arrival('3')" id="farrival4"><?php echo $this->lang->line('12_pm_to_6_pm'); ?></a>
        </li>
        <li><a onclick="arrival('4')" id="farrival5"><?php echo $this->lang->line('after_6_pm'); ?></a>
        </li>
    </ul>
	<input type="hidden" id="arrivaltime" value="All" />
	
</div>
                            
<div class="widget widget_has_radio_checkbox_text">
    <h3><?php echo $this->lang->line('airlines'); ?></h3>
    <div class="widget_content" id="airlinelist">
        <div class="airlineentry" id="check0" >
			<label>
				<input type="checkbox" value="All" class="check0" checked="true" > <i class="awe-icon awe-icon-check"></i> <?php echo $this->lang->line('all'); ?>
			</label>
		</div>
    </div>
	<input type="hidden" id="scriptload" value="1" />
</div>
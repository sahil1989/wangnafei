 <style>
 .awe-search-tabs .ui-tabs-nav{height:auto;border:none;}
 .awe-search-tabs .ui-tabs-nav li{width:100%;}
 
 .awe-search-tabs .ui-tabs-nav li.ui-tabs-active + li .ui-tabs-anchor,
 .awe-search-tabs .ui-tabs-nav li:last-child .ui-tabs-anchor,
 .awe-search-tabs .ui-tabs-nav li .ui-tabs-anchor
 {border:none;}
 .awe-search-tabs .ui-tabs-nav li .ui-tabs-anchor{width:100%;text-align: center}
 .awe-search-tabs { margin-top:0;}
 .page-sidebar .sidebar-title, .awe-search-tabs .ui-tabs-nav{padding:0;}
 .awe-search-tabs .ui-tabs-nav{
	 
	 -webkit-border-radius: none;
    -moz-border-radius:  none;
    -ms-border-radius:  none;
    -o-border-radius:  none;
    border-radius:  none;
	
 }
 .awe-search-tabs__content .col-sm-12 .col-sm-4{padding:0;padding-right:1%;}
 .sear_his {
    position: inherit;
    width: 100%;
    padding: 0;
    margin: 0;
    top: 0;
    left: 0;
 }
 .search{
    border: 1px solid #B9B9B9;
    max-height: 200px;
    overflow-x: hidden;
    overflow-y: scroll;
    display: none;
    position: absolute;
    width: 100%;
	z-index: 9;
	background:#fff;	
}
.search div:hover{
	background:#0091EA;
	color:#fff;
	cursor:pointer;
}
.search div{
    padding: 6px;
    padding-left: 18px;
}
 </style>
 <div lass="sidebar-title">
      <section>
               <div class="">
                        <div class="awe-search-tabs tabs">
                           <ul style="border-top: 2px solid #0091EA;">
                              <li id="nlist1"><a href="#awe-search-tabs-3"><?php echo $this->lang->line('round_trip'); ?></a></li>
                              <li id="nlist2"><a href="#awe-search-tabs-4"><?php echo $this->lang->line('one_way'); ?></a></li>
                              <li id="nlist3"><a href="#awe-search-tabs-5"><?php echo $this->lang->line('multi_destination'); ?></a></li>
                              <li class="nlist4"><a class="ui-tabs-anchor" style="cursor:pointer;"><?php echo $this->lang->line('search_history'); ?></a></li>
							  
                           </ul>
						    <div class="sear_his" style="display:none;">                              
                              	<div>
									<?php 
										if(is_array($searchhistory) && count($searchhistory) > 0)
										{
											foreach($searchhistory as $loop) {
												?>
												<span>
													<a href="#"  onclick="searchHistory(<?php echo $loop->jet_id; ?>)">
														<?php 
                            $departure_pos1 = strpos($loop->departure1, ',');
                            if($departure_pos1 > 0) {
                              $departure1 = explode(",",$loop->departure1)[1];
                            }
                            else {
                              $departure1 = strtoupper($loop->departure1);
                            }

                            $arrival_pos1 = strpos($loop->arrival1, ',');
                            if($arrival_pos1 > 0) {
                              $arrival1 = explode(",",$loop->arrival1)[1];
                            }
                            else {
                              $arrival1 = strtoupper($loop->arrival1);
                            }
														if($loop->journey_type == 'Oneway') {
															echo $departure1.' <i class="fa fa-long-arrow-right"></i> '.$arrival1.' ,'.date_format(date_create($loop->departuredate1), 'D jS M Y')."<br>";
														}
														elseif ($loop->journey_type == 'Round') {
															echo $departure1.' <i class="fa fa-long-arrow-right"></i> '.$arrival1.' ,'.date_format(date_create($loop->departuredate1), 'D jS M Y');
															echo "<br>";
															echo $arrival1.' <i class="fa fa-long-arrow-right"></i> '.$departure1.' ,'.date_format(date_create($loop->returndate1), 'D jS M Y')."<br>";
														}
														else {
															echo $departure1.' <i class="fa fa-long-arrow-right"></i> '.$arrival1.' ,'.date_format(date_create($loop->departuredate1), 'D jS M Y');
                              echo "<br>";
                              if($loop->departure2!="" && $loop->arrival2!="") {
                                  $departure_pos2 = strpos($loop->departure2, ',');
                                if($departure_pos2 > 0) {
                                  $departure2 = explode(",",$loop->departure2)[1];
                                }
                                else {
                                  $departure2 = strtoupper($loop->departure2);
                                }

                                $arrival_pos2 = strpos($loop->arrival2, ',');
                                if($arrival_pos2 > 0) {
                                  $arrival2 = explode(",",$loop->arrival2)[1];
                                }
                                else {
                                  $arrival2 = strtoupper($loop->arrival2);
                                }
                                echo $departure2.' <i class="fa fa-long-arrow-right"></i> '.$arrival2.' ,'.date_format(date_create($loop->departuredate2), 'D jS M Y');
                                echo "<br>";
                              }
                              if($loop->departure3!="" && $loop->arrival3!="") {
                                  $departure_pos3 = strpos($loop->departure3, ',');
                                if($departure_pos3 > 0) {
                                  $departure3 = explode(",",$loop->departure3)[1];
                                }
                                else {
                                  $departure3 = strtoupper($loop->departure3);
                                }

                                $arrival_pos3 = strpos($loop->arrival3, ',');
                                if($arrival_pos3 > 0) {
                                  $arrival3 = explode(",",$loop->arrival3)[1];
                                }
                                else {
                                  $arrival3 = strtoupper($loop->arrival3);
                                }
                                echo $departure3.' <i class="fa fa-long-arrow-right"></i> '.$arrival3.' ,'.date_format(date_create($loop->departuredate3), 'D jS M Y');
                                echo "<br>";
                              }
															
															
														}
															
															echo $loop->adults." Adult";
															if($loop->children!=0){ echo " ,".$loop->children." Children"; }
															if($loop->infants!=0){ echo " ,".$loop->infants." Infants"; }
														
														?>
													</a>
													<i class="fa fa-times remove_search" style="color: #fff; float: right; cursor: pointer;"><b style="display:none;"><?php echo $loop->jet_id; ?></b></i>
												</span>
												
												<?php
											}
										}
									?>		
                                </div>                              
                           	  </div>
							
                           <div class="awe-search-tabs__content tabs__content">
                            
							  
                              <div id="awe-search-tabs-3" class="search-flight" <?php if($_GET['journey_type'] != 'Round') { ?> style="display:none !important;" <?php } ?>>
                                 <form action="<?php echo base_url('trip/FlightResults', get_protocol());?>">
                                    <div class="row">
                                       <div class="col-sm-12 form-elements">
									             <input type="hidden" value="Round" name="journey_type" />
									             <input type="hidden" value="" name="flight_type" id="flight_type"/>
                                          <label><?php echo $this->lang->line('from'); ?></label>
                                          <div class="form-item">
                                             <input type="hidden" value="Round" name="journey_type" />
                                             <input name="section1_Departure_Location" id="from1" class="form-control" value="<?php echo $_GET['section1_Departure_Location']; ?>" type="text">
                                             <span class="from1" id="text-dangerfontlg"></span>
                                          </div>

                                       </div>
                                       
									   <div class="col-sm-12 form-elements">
                                          <label><?php echo $this->lang->line('to'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i>
                                             <input name="section1_Arrival_Location" id="to1" value="<?php echo $_GET['section1_Arrival_Location']; ?>" class="form-control" placeholder="<?php echo $this->lang->line('to'); ?>" value="" type="text" />
                                             <span class="to1" id="text-dangerfontlg"></span>

											</div>
                                       </div>
                                       
									   <div class="col-sm-12" style="padding-right:0; padding-left:0; ">
											<div class="col-sm-4 form-elements">
												  <label><?php echo $this->lang->line('adult'); ?></label>
												  <div class="form-item">
													 <select class="awe-select" id="adl1" name="common_Adults">
														 <?php for($i=1; $i<=9; $i++) { ?>
                                                    <option <?php if($_GET['common_Adults'] == $i) { ?> selected <?php } ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                    <?php } ?>
													 </select>
													 <span class="adl1" id="text-dangerfontlg"></span>
												  </div>
											   </div>
											   <div class="col-sm-4 form-elements">
												  <label><?php echo $this->lang->line('children'); ?></label>
												  <div class="form-item">
													 <select class="awe-select" id="cld1" name="common_Children">
														 <?php for($i=0; $i<9; $i++) { ?>
                                                    <option  <?php if($_GET['common_Children'] == $i) { ?> selected <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
													 </select>
													 <span class="cld1" id="text-dangerfontlg"></span>
												  </div>
											   </div>
											   <div class="col-sm-4 form-elements">
												  <label><?php echo $this->lang->line('infants'); ?></label>
												  <div class="form-item">
													 <select class="awe-select" id="inf1" name="common_Infant">
														<?php for($i=0; $i<=9; $i++) { ?>
                                                    <option <?php if($_GET['common_Infant'] == $i) { ?> selected <?php } ?>  value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
													 </select>
													 <span class="inf1" id="text-dangerfontlg"></span>
												  </div>
											   </div>
											   <div class="col-md-12 text-dangerfontlg"  id="totalval1"></div>
										</div>                                       
									 
									</div>

                                    <div class="row">								
										
									
                                       <div class="col-sm-12 form-elements">
                                          <label><?php echo $this->lang->line('departure_date'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> 
                                         <input class="form-control from_date" id="depdate1" readonly="readonly" name="section1_Departure_Date" value="<?php echo $_GET['section1_Departure_Date']; ?>"  type="text" />
                                         <span class="depdate1" id="text-dangerfontlg"></span>
                                          </div>
                                       </div>
                                       
									   <div class="col-sm-12 form-elements">
                                          <label><?php echo $this->lang->line('return_date'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-calendar"></i>
                                         <input class="form-control to_date" id="retdate1" value="<?php if(isset($_GET['section2_Departure_Date']))echo $_GET['section2_Departure_Date']; ?>" readonly="readonly" name="section2_Departure_Date" type="text" />
                                         <span class="retdate1" id="text-dangerfontlg"></span>
                                          </div>
                                       </div>
									   
									</div>

                                    <div class="row">
									
                                       <div class="col-sm-12 form-elements" id="less12"  style="display:none">
                                          <label><?php echo $this->lang->line('airline'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-plane"></i>
                                             
										  <input type="text" id="testid" data-search="airline1" autocomplete="off"/>
                                          <input type="hidden" data-val="airline1" value="<?php $_GET['common_AirlinePref']; ?>" name="common_AirlinePref" autocomplete="off" />
											<div class="search">
												<?php foreach($airlines as $loop) { ?>
                                                   <div class="airline1" data-value="<?php echo $loop->code; ?>"><?php echo $loop->airlines_name; ?></div>
                                                   <?php } ?>
											</div>
                                          </div>
                                       </div>
                                       
                                    
                                       
									   <div class="col-sm-12 form-elements" id="less13" style="display:none">
                                          <label><?php echo $this->lang->line('class'); ?></label>
                                          <div class="form-item"><i class="awe-icon fa fa-bed"></i>
                                             <select name="common_CabinPref"  class="form-control" id="cabin1">
                                                    <option value="All" selected="selected">All cabins</option>
                                                    <option <?php if($_GET['common_CabinPref'] == 'Economy') { ?> selected <?php } ?>  value="Economy">Economy</option>
                                                    <option  <?php if($_GET['common_CabinPref'] == 'Premium') { ?> selected <?php } ?> value="Premium">Premium</option>
                                                    <option  <?php if($_GET['common_CabinPref'] == 'Business') { ?> selected <?php } ?> value="Business">Business</option>
                                                    <option <?php if($_GET['common_CabinPref'] =='First') { ?> selected <?php } ?>  value="First">First</option>
                                                </select>
                                          </div>
                                       </div>
                                    
									</div>

                                    <div class="row">
									
                                       <div class="col-sm-12 widget widget_has_radio_checkbox_text">
                                            <div class="widget_content">
                                                <label><input type="checkbox" name="common_FlexiblePref" <?php if(isset($_GET['common_FlexiblePref'])) { ?> checked="checked" <?php } ?> id="fexible1"> <i class="awe-icon awe-icon-check"></i> <?php echo $this->lang->line('flexible_dates'); ?></label>
                                            </div>
                                        </div>
										
										<div class="col-sm-12 widget widget_has_radio_checkbox_text">
                                          
                                          <a onclick="dotoggle(1)" id="more1"  style="color:#1A9CEC; font-weight:bold" class="forgot-password"><?php echo $this->lang->line('more_option'); ?></a>
                                       </div>
									   
									</div>
                
                                   
                                  <div class="form-actions"  style="width: 100%;">
								  <input type="submit" onclick="return frmsubmit(1)" id="submit1" value="<?php echo $this->lang->line('search_flights'); ?>">
								  </div>  
                                 </form>
                              </div>
                                                            
                              <div id="awe-search-tabs-4" class="search-flight" <?php if($_GET['journey_type'] != 'Oneway') { ?> style="display:none !important;" <?php } ?>>
                                 <form action="<?php echo base_url('trip/FlightResults', get_protocol());?>">
                                    <div class="row">
                                       <div class="form-elements col-sm-12">
									   <input type="hidden" value="Oneway" name="journey_type" />
									    <input type="hidden" value="" name="flight_type" id="flight_type" />
                                          <label><?php echo $this->lang->line('from'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i>
                                           <input name="section1_Departure_Location" id="from2" value="<?php echo $_GET['section1_Departure_Location']; ?>" class="form-control" placeholder="<?php echo $this->lang->line('from'); ?>" value="" type="text" />
                                            <span class="from2" id="text-dangerfontlg"></span>
                                         </div>
                                       </div>
                                       <div class="form-elements col-sm-12">
                                          <label><?php echo $this->lang->line('to'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> 
                                          <input name="section1_Arrival_Location" value="<?php echo $_GET['section1_Arrival_Location']; ?>" id="to2" class="form-control" placeholder="<?php echo $this->lang->line('to'); ?>" value="" type="text" />
                                            <span class="to2" id="text-dangerfontlg"></span>
                                         </div>
                                       </div>
                                      
										
										<div class="col-sm-12" style="padding-right:0; padding-left:0; ">
												<div class="col-sm-4 form-elements  ">
												  <label><?php echo $this->lang->line('adult'); ?></label>
												  <div class="form-item">
													 <select class="awe-select" id="adl2" name="common_Adults">
															<?php for($i=1; $i<=9; $i++) { ?>
                                                    <option <?php if($_GET['common_Adults'] == $i) { ?> selected <?php } ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                    <?php } ?>
														</select>
														<span class="adl2" id="text-dangerfontlg"></span>
												  </div>
											   </div>
											   <div class="col-sm-4 form-elements  ">
												  <label><?php echo $this->lang->line('children'); ?></label>
												  <div class="form-item">
													 <select class="awe-select" id="cld2" name="common_Children">
															<?php for($i=0; $i<9; $i++) { ?>
                                                    <option  <?php if($_GET['common_Children'] == $i) { ?> selected <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
														</select>
														<span class="cld2" id="text-dangerfontlg"></span>
												  </div>
											   </div>
											   <div class="col-sm-4 form-elements  ">
												  <label><?php echo $this->lang->line('infants'); ?></label>
												  <div class="form-item">
													 <select class="awe-select" id="inf2" name="common_Infant">
															<?php for($i=0; $i<=9; $i++) { ?>
                                                    <option <?php if($_GET['common_Infant'] == $i) { ?> selected <?php } ?>  value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
														</select>
														<span class="inf2" id="text-dangerfontlg"></span>
												  </div>
											   </div> 
											   <div class="col-sm-12 text-dangerfontlg" id="totalval2"></div> 
										</div>
										
									</div>
									<div class="row">
										
										<div class="form-elements col-sm-12">
                                          <label><?php echo $this->lang->line('departure_date'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-calendar"></i> 
                                          <input class="form-control from_date" id="depdate2" readonly="readonly" value="<?php echo $_GET['section1_Departure_Date']; ?>" name="section1_Departure_Date" type="text" />
                                          <span class="depdate2" id="text-dangerfontlg"></span>
                                          </div>
                                       </div>
									   <div class="form-elements col-sm-12" id="less22" style="display:none">
                                          <label><?php echo $this->lang->line('class'); ?></label>
                                          <div class="form-item"><i class="awe-icon fa fa-bed"></i>
                                             <select name="common_CabinPref"  class="form-control" id="cabin2">
                                                <option value="All" selected="selected">All cabins</option>
                                                    <option <?php if($_GET['common_CabinPref'] == 'Economy') { ?> selected <?php } ?>  value="Economy">Economy</option>
                                                    <option  <?php if($_GET['common_CabinPref'] == 'Premium') { ?> selected <?php } ?> value="Premium">Premium</option>
                                                    <option  <?php if($_GET['common_CabinPref'] == 'Business') { ?> selected <?php } ?> value="Business">Business</option>
                                                    <option <?php if($_GET['common_CabinPref'] =='First') { ?> selected <?php } ?>  value="First">First</option>
                                             </select>
                                          </div>
                                       </div>
									   
									    
                                       <div class="form-elements col-sm-12" id="less23" style="display:none;" >
                                          <label><?php echo $this->lang->line('airline'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-plane"></i>
                                             <input type="text" id="testid" data-search="airline2" autocomplete="off"/>
                                          <input type="hidden" data-val="airline2" value="" name="common_AirlinePref" autocomplete="off" />
											<div class="search">
												<?php foreach($airlines as $loop) { ?>
                                                   <div class="airline2" data-value="<?php echo $loop->code; ?>"><?php echo $loop->airlines_name; ?></div>
                                                   <?php } ?>
											</div>
                                          </div>
                                       </div>  
									   
									   
									</div>
									<div class="row">
									   
                                       <div class="col-sm-12 widget widget_has_radio_checkbox_text">
                                            <div class="widget_content">
                                                <label><input type="checkbox" name="common_FlexiblePref"  <?php if(isset($_GET['common_FlexiblePref'])) { ?> checked="checked" <?php } ?> id="fexible2"> <i class="awe-icon awe-icon-check"></i> <?php echo $this->lang->line('flexible_dates'); ?></label>
												
                                            </div>
                                        </div>
										<div class="col-sm-12">                                          
                                          <a onclick="dotoggle(2)" id="more2"  style="color:#1A9CEC; font-weight:bold;" class="forgot-password "><?php echo $this->lang->line('more_option'); ?></a>
                                       </div>
                                    
                                    <div class="col-sm-12 form-group">                                       
									   
									   <div class="form-elements" style="margin-top: 15%">                                          
                                          
                                       </div>
									   
                                    </div>
									</div>
								  
                                   
									<div class="form-actions" style="width: 100%;"><input  type="submit" onclick="return frmsubmit(2)" id="submit2" value="<?php echo $this->lang->line('search_flights'); ?>"></div>  
								  
                                 </form>
                              </div>
                              
                              
                              <div id="awe-search-tabs-5" class="search-flight" <?php if($_GET['journey_type'] == 'Oneway' || $_GET['journey_type'] == 'Round' ) { ?> style="display:none !important;" <?php } ?>>
                                 <form action="<?php echo base_url('trip/FlightResults', get_protocol());?>">
                                  
                                    <div class="row">
                                       <div class="form-elements col-sm-12">
										<input type="hidden" value="MultiDestination" name="journey_type" />
									    <input type="hidden" value="" name="flight_type" id="flight_type"/>
                                          <label><?php echo $this->lang->line('from'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> 
										  <input name="section1_Departure_Location" value="<?php echo $_GET['section1_Departure_Location']; ?>" id="from3" class="form-control" placeholder="<?php echo $this->lang->line('from'); ?>" value="" type="text" />
										  <span class="from3" id="text-dangerfontlg"></span>
										  </div>
                                       </div>
									   
                                       <div class="form-elements col-sm-12">
                                          <label><?php echo $this->lang->line('to'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> 
										  <input name="section1_Arrival_Location" id="to3" value="<?php echo $_GET['section1_Arrival_Location']; ?>" class="form-control" placeholder="<?php echo $this->lang->line('to'); ?>" value="" type="text" />
										  <span class="to3" id="text-dangerfontlg"></span>
										  </div>
                                       </div>
									   
									   <div class="col-sm-12" style="padding-right:0; padding-left:0; ">
                                       
										   <div class="form-elements col-sm-4" >
											  <label><?php echo $this->lang->line('adult'); ?></label>
											  <div class="form-item">
												 <select class="awe-select"  id="adl3" name="common_Adults">                                                
													<?php for($i=1; $i<=9; $i++) { ?>
                                                    <option <?php if($_GET['common_Adults'] == $i) { ?> selected <?php } ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                                    <?php } ?>
												 </select>
											  </div>
											  <span class="adl3" id="text-dangerfontlg"></span>
										   </div>
										   <div class="form-elements col-sm-4">
											  <label><?php echo $this->lang->line('children'); ?></label>
											  <div class="form-item">
												 <select class="awe-select"   id="cld3" name="common_Children">
													<?php for($i=0; $i<9; $i++) { ?>
                                                    <option  <?php if($_GET['common_Children'] == $i) { ?> selected <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
												 </select>
											  </div>
											  <span class="cld3" id="text-dangerfontlg"></span>
										   </div>
										   <div class="form-elements col-sm-4">
											  <label><?php echo $this->lang->line('infants'); ?></label>
											  <div class="form-item">
												 <select class="awe-select"   id="inf3" name="common_Infant">
													<?php for($i=0; $i<=9; $i++) { ?>
                                                    <option <?php if($_GET['common_Infant'] == $i) { ?> selected <?php } ?>  value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												 </select>
											  </div>
										  <span class="inf3" id="text-dangerfontlg"></span>
										  
										</div>
										 <div class="col-md-12 text-dangerfontlg" id="totalval3"></div>
									  </div>
									  
                                    </div>
									
									
                                    <div class="row">
                                       <div class="form-elements col-sm-12">
                                          <label><?php echo $this->lang->line('departure_date'); ?></label>
                                      
                                          <div  class="form-item"><i class="awe-icon awe-icon-calendar"></i> 
										  <input class="form-control from_date" type="text" id="depdate3" readonly="readonly" value="<?php echo $_GET['section1_Departure_Date']; ?>" name="section1_Departure_Date"  onFocus="return setDepartureLocation(3)"  />										  
										  <span class="depdate3" id="text-dangerfontlg"></span>
                                          </div>

										  
                                       </div>
									   
                                       <div class="form-elements col-sm-12" id="less32" style="display:none">
                                          <label><?php echo $this->lang->line('class'); ?></label>
                                          <div class="form-item"><i class="awe-icon fa fa-bed"></i>
                                             <select name="common_CabinPref"  class="form-control" id="cabin3">
                                                 <option value="All" selected="selected">All cabins</option>
                                                    <option <?php if($_GET['common_CabinPref'] == 'Economy') { ?> selected <?php } ?>  value="Economy">Economy</option>
                                                    <option  <?php if($_GET['common_CabinPref'] == 'Premium') { ?> selected <?php } ?> value="Premium">Premium</option>
                                                    <option  <?php if($_GET['common_CabinPref'] == 'Business') { ?> selected <?php } ?> value="Business">Business</option>
                                                    <option <?php if($_GET['common_CabinPref'] =='First') { ?> selected <?php } ?>  value="First">First</option>
                                             </select>
                                          </div>
                                       </div>
									   
									   <div class="form-elements col-sm-12" id="less33" style="display:none;">
                                           <label><?php echo $this->lang->line('airline'); ?></label>
                                          <div class="form-item"><i class="awe-icon awe-icon-plane"></i>
                                             
										  <input type="text" id="testid" data-search="airline3" autocomplete="off"/>
                                          <input type="hidden" data-val="airline3" value="" name="common_AirlinePref" autocomplete="off" />
											<div class="search">
												<?php foreach($airlines as $loop) { ?>
                                                   <div class="airline3" data-value="<?php echo $loop->code; ?>"><?php echo $loop->airlines_name; ?></div>
                                                   <?php } ?>
											</div>
                                          </div>
                                       </div>
									   
                                     </div>
                                    <div class="row"> 
									   
									   <div class="form-elements  col-sm-12 multi1" <?php if(isset($_GET['citycount'])){ if($_GET['citycount']>=2) {  }else{ ?> style="display:none;"<?php } }else{ ?> style="display:none;"<?php } ?> >
                                          <label><?php echo $this->lang->line('from'); ?></label>
                                          <div  class="form-item"><i class="awe-icon awe-icon-marker-1"></i> 
										  <input type="text" name="section3_Departure_Location[]"  value="<?php if(isset($_GET['section3_Departure_Location'][0])) echo $_GET['section3_Departure_Location'][0];?>" id="from4" value="">
										  </div>
                                       </div>
									   
									    
									   <div class="form-elements col-sm-12 multi1" <?php if(isset($_GET['citycount'])){ if($_GET['citycount']>=2) {  }else{ ?> style="display:none;"<?php } }else{ ?> style="display:none;"<?php } ?> >
                                          <label><?php echo $this->lang->line('to'); ?></label>
                                          <div  class="form-item"><i class="awe-icon awe-icon-marker-1"></i> 
										  <input type="text" name="section3_Arrival_Location[]" value="<?php if(isset($_GET['section3_Arrival_Location'][0])) echo $_GET['section3_Arrival_Location'][0] ?>" id="to4" value="">
										  </div>
                                       </div>
									   
									   <div class="form-elements col-sm-12 multi1" <?php if(isset($_GET['citycount'])){ if($_GET['citycount']>=2) {  }else{ ?> style="display:none;"<?php } }else{ ?> style="display:none;"<?php } ?> >
                                          <label><?php echo $this->lang->line('date'); ?></label>
                                          <div  class="form-item"  ><i class="awe-icon awe-icon-calendar"></i> 
										  <input class="form-control to_date" type="text" id="depdate4" readonly="readonly" name="section3_Departure_Date[]" value="<?php if(isset($_GET['section3_Departure_Date'][0])) echo $_GET['section3_Departure_Date'][0]; ?>"  onfocus="return setDepartureLocation(4)"  />
										  <a onclick="cremove(1)" style="font-size: 12px;line-height: 72px;color:red;" id="cremove1">Remove</a>
										  </div>
                                       </div>
									   
									 </div>
                                    <div class="row">
									
									   <div class="form-elements  col-sm-12 multi2" <?php if(isset($_GET['citycount'])) {if($_GET['citycount']>=3) {  }else{ ?> style="display:none;"<?php } }else{ ?> style="display:none;"<?php } ?>>
                                          <label><?php echo $this->lang->line('from'); ?></label>
                                          <div  class="form-item"><i class="awe-icon awe-icon-marker-1"></i> 
										  <input type="text" name="section3_Departure_Location[]" value="<?php if(isset($_GET['section3_Departure_Location'][1]))  echo $_GET['section3_Departure_Location'][1] ?>"  id="from5" value="">
										  </div>
                                       </div>
									   
									   <div class="form-elements col-sm-12 multi2" <?php if(isset($_GET['citycount'])) {if($_GET['citycount']>=3) {  }else{ ?> style="display:none;"<?php } }else{ ?> style="display:none;"<?php } ?>>
                                          <label><?php echo $this->lang->line('to'); ?></label>
                                          <div  class="form-item"><i class="awe-icon awe-icon-marker-1"></i> 
										  <input type="text" name="section3_Arrival_Location[]"  value="<?php if(isset($_GET['section3_Arrival_Location'][1]))  echo $_GET['section3_Arrival_Location'][1] ?>" id="to5" value="">
										  </div>
                                       </div>									   
									   
									   
									   <div class="form-elements col-sm-12 multi2" <?php if(isset($_GET['citycount'])) {if($_GET['citycount']>=3) {  }else{ ?> style="display:none;"<?php } }else{ ?> style="display:none;"<?php } ?>>
                                          <label><?php echo $this->lang->line('date'); ?></label>
                                          <div  class="form-item" ><i class="awe-icon awe-icon-calendar"></i> 
										  <input class="form-control to_date2" type="text" value="<?php if(isset($_GET['section3_Departure_Date'][1]))   echo $_GET['section3_Departure_Date'][1] ?>"  id="depdate5" readonly="readonly" name="section3_Departure_Date[]" onfocus="return setDepartureLocation(5)" />
										  <a onclick="cremove(2)" style="font-size: 12px;line-height: 72px;color:red;" id="cremove2">x</a>
										  </div>
                                       </div>
                                       
									</div>
                                    <div class="row">       
                                       
									   
										
									   <div class=" col-sm-12">                                          
                                          <a onclick="dotoggle(3)" id="more3"  style="color:#1A9CEC; font-weight:bold" class="forgot-password"><?php echo $this->lang->line('more_option'); ?></a>
									   </div>
										
									   <div class=" col-sm-12">                                          
                                          <a  onclick="addmoredestination()" id="cityadd" style="color:#1A9CEC; font-weight:bold;line-height: 35px;" class="forgot-password"><?php echo $this->lang->line('multi_destination'); ?></a>
                                       </div>
									   
									   
                                    </div>
                                   
                                  <div class="form-actions" style="width: 100%;">
								  <input type="submit" onclick="return frmsubmit(3)" id="submit3" value="<?php echo $this->lang->line('search_flights'); ?>">
								  </div>  
                                
                             
										<span id="morecity">
                                         <input type="hidden" name="citycount" id="citycount" value="<?php if(isset($_GET['citycount'])) echo $_GET['citycount']; else echo "1"; ?>" />                                                          
                                        </span>
                               </form>
                              </div>
							  
                              
                           </div>
                        </div>
                     </div>
                  </section>
                    
					
 </div>
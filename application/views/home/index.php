<style>
    a.urg_msg{
    text-align: center;
    display: table;
    margin: 10px auto;
    font-size: 12px;
    top: 5px;
    position: relative;
    
}

.blink {
      animation: blinker 1s linear infinite;
      color: #fff;
      background-color:#ff0000;
      font-size: 30px;
      font-weight: bold;
      font-family: sans-serif;
      }
      @keyframes blinker {  
      50% { opacity: 0; }
      }
@media (max-width: 460px) {   
.banner-area {
    width: 100%!important;
    height: 200px!important;
    background-size: contain!important;
    background-repeat: no-repeat;
}
}
@media (max-width: 360px) {   
.banner-area {
    width: 100%!important;
    height: 175px!important;
}
}
</style>
<?php if(!empty($banner_data)) ?>

          
			<!-- start banner Area -->
			<!--<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="<?//=base_url(); ?>assets/dcentevent/img/raksha_bandh_de_2021.jpg">
			    <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="<?//=base_url(); ?>assets/dcentevent/img/DE_REGULAR.jpg"> red_deb_26j22_01-->
			        <!--<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="<?//=base_url(); ?>assets/dcentevent/img/DE_REGULAR.jpg">-->
			    <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="<?php echo $banner_data['bannner_image']; ?>">
				<div class="overlay-bg overlay"></div>
				<div class="container">
					<div class="row fullscreen  d-flex align-items-center left-content-end">
						<div class="banner-content col-lg-6 col-md-12">
						
						</div>												
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

<!--<a class="urg_msg blink btn " href="<?php echo base_url(); ?>assets/dcentevent/img/Notice_dcent-event_001.jpg">Urgent Notice for staff</a>
            <marquee width="60%" direction="left" height="100px" style="width: 100%;
    padding: 6px;
    height: 35px;
    background-color: #e1e;
    color: #ff0;
    font-size: 16px;">
IN VIEW OF COVID 19 ALL PHYSICAL PARTICIPATION HAS BEEN CLOSED UPTO 31th MAY, 2020. STAY AT HOME, STAY SAFE. WORK FROM HOME.
</marquee>-->

			<!-- start service Area-->
			<!--<section class="service-area pt-100 pb-150" id="service">-->
			<section class="service-area pt-100 pb-150 holi_img">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 style="color:black;" class="mb-10">Services We Provide!</h1>
								<p style="color:black;">Dcent Entertainment & Event planners specializes in corporate functions, fairs, galas, festivals all types of special events. </p>
							</div>
						</div>
					</div>	
					<?php 
					if(!empty($service_settings));
					?>
					<div class="row">
                        <?php foreach($service_settings as $settings):?>
    						<div class="sigle-service col-lg-4 col-md-6">
    						<font size="100px;"><span class="<?php echo $settings['fab_icon']?>" id="fa_colour"></span></font>
    							<h4><?php echo $settings['event_name']?></h4>
    							<p>
                                <?php echo $settings['event_content']?>
    							</p>
    							<a href="<?=base_url('home/contact');?>" class="text-uppercase primary-btn2 primary-border circle"><?php echo $settings['ask_oppointment']?></a>
    						</div>
					    <?php endforeach;?>
				</div>	
			</section>
			<!-- end service Area-->


			<!-- Start About Area -->
			<section class="about-area">
				<div class="container-fluid">
					<div class="row justify-content-end align-items-center d-flex no-padding">
						<div class="col-lg-6 about-left mt-70">
							<h1>Make Your Event Memorable!</h1>
							<p>
								We work together by implementing both efforts and <br>
								expertise to maximize participation  and to enhance<br>
								the scope of events we manage. We add new <br>
								enthusiasm and energy in the events organized by us.
								 One would love to book us for their events. Contact<br>
								 us and get an appointment to make your event memorable.
							</p>
							<div class="buttons">
								
								<a href="<?=base_url('home/contact');?>" class="about-btn text-uppercase  primary-border circle" float:center;>Get a free quote</a>
							</div>
						</div>
						<div class="col-lg-6 about-right">
							<img class="img-fluid" src="" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End About Area -->

<?php if(!empty($event_settings))?>
			<!-- Start project Area -->
			<section class="what_we_do project-area section-gap" id="project">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">WHAT WE DO?</h1>
								<p>The Dcent Entertainment & Event Planners company works together by 
								implementing both efforts and expertise to maximize participation and
								to enhance the scope of events we manages. Dcent has developed a variety
								of services to meet with different areas of the event industry’s demand.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-works-carousel mt-40">
						    <?php foreach($event_settings as $settings):?>
							<div class="item">
								<img class="img-fluid" src="<?php echo $settings['event_image']?>" alt="">
								<div class="caption text-center mt-20">
									<h6 class="text-uppercase"><?php echo $settings['event_name']?></h6>
								</div>
							</div>
<!--						<div class="item">
								<img class="img-fluid" src="<?=base_url(); ?>assets/dcentevent/img/corporate-events.jpg" alt="">
								<div class="caption text-center mt-20">
									<h6 class="text-uppercase">Corporate Events</h6>

								</div>
							</div>
							<div class="item">
								<img class="img-fluid" src="<?=base_url(); ?>assets/dcentevent/img/live-entertainment.jpg" alt="">
								<div class="caption text-center mt-20">
									<h6 class="text-uppercase">Live Entertainment</h6>

								</div>
							</div>
							<div class="item">
								<img class="img-fluid" src="<?=base_url(); ?>assets/dcentevent/img/club-management.jpg" alt="">
								<div class="caption text-center mt-20">
									<h6 class="text-uppercase">Club Management</h6>
									
								</div>
							</div>
							<div class="item">
								<img class="img-fluid" src="<?=base_url(); ?>assets/dcentevent/img/wedding-planning.jpg" alt="">
								<div class="caption text-center mt-20">
									<h6 class="text-uppercase">Wedding Planning</h6>
									
								</div>
							</div>
							<div class="item">
								<img class="img-fluid" src="<?=base_url(); ?>assets/dcentevent/img/fashion-events.jpg" alt="">
								<div class="caption text-center mt-20">
									<h6 class="text-uppercase">Fashion Events </h6>
								
								</div>
							</div>
							<div class="item">
								<img class="img-fluid" src="<?=base_url(); ?>assets/dcentevent/img/nightlife-events.jpg" alt="">
								<div class="caption text-center mt-20">
									<h6 class="text-uppercase">Nightlife Events and Concerts</h6>
				
								</div>
							</div>
							<div class="item">
								<img class="img-fluid" src="<?=base_url(); ?>assets/dcentevent/img/meetings.jpg" alt="">
								<div class="caption text-center mt-20">
									<h6 class="text-uppercase">Meetings</h6>
						
								</div>
							</div>-->
							<?php endforeach;?>
						</div>
					</div>
				</div>	
			</section>
			<!-- End project Area -->
			

			<!-- Start testimonial Area -->
			<section class="testimonial-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row">
					    <?php if(!empty($testemonial_setting))?>
						<div class="active-testimonial">
						    <?php foreach($testemonial_setting as $settings):?>
							<div class="single-testimonial item d-flex flex-row">
								<div class="thumb">
								</div>
								<div class="desc">
									<p>
										<?php echo $settings['testemonial_content'];?>
									</p>
									<h4 mt-30><?php echo $settings['testemonial_name'];?></h4>
									
								</div>
							</div>
							<?php endforeach;?>
							<!--<div class="single-testimonial item d-flex flex-row">
								<div class="thumb">
									
								</div>
								<div class="desc">
									<p>
										Thanks again for such a spectacular Stowe Weekend of Hope. I can't even imagine what goes into planning such an event, but I know one thing - you make it look easy.
									</p>
									<h4 mt-30>Simrit Patel</h4>
									
								</div>
							</div>-->							
						</div>					
					</div>
				</div>	
			</section>
			<!-- End testimonial Area -->
			


 
			 <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Contact Us</h2>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>">Home</a></li>
            <li><a href="#" class="active">Contact Us</a></li>
        </ol>
    </section>
    <!-- End Banner area -->	

	<?php if($this->session->flashdata('validation_error')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('validation_error').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('contact_submit_success')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('contact_submit_success').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('contact_submit_failed')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('contact_submit_failed').'</p>'; ?>
	<?php endif; ?>

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Corporate Office</h2>
                
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#"><strong>location</strong></a>
                            <a href="#"><strong>phone</strong></a>
                            <a href="#"><strong>fax</strong></a>
                            <a href="#"><strong>email</strong></a>
                        </div>
                        <div class="address">
                            <a href="#">House No.2, Mihir Path, East Boring Canal Road, <br>Patna, Bihar (India)</a>
                            <a href="#">08010133921</a>
                            <a href="#">0612-3215586</a>
                            <a href="mailto:info@eecd.in">info@dcentevent.com</a>
                        </div>
                    </div>
					
					
                    <div class="location">
					<h3>Registered Office</h3><br>
                        <div class="location_laft">
                            <a class="f_location" href="#"><strong>location</strong></a>
                            <a href="#"><strong>phone</strong></a>
                            <a href="#"><strong>fax</strong></a>
                            <a href="#"><strong>email</strong></a>
                        </div>
                        <div class="address">
                            <a href="#">403, Gupta Tower, Radium Road, Kutchery Chowk, <br>Ranchi, Jharkhand (India)</a>
                            <a href="#">07759994411</a>
                            <a href="#">0651-2361622</a>
                            <a href="mailto:info@eecd.in">info@dcentevent.com</a>
                        </div>
                    </div>
					
					
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Send Us a Message</h2>
                    <form action="<?=base_url('home/contact/submit');?>" method="post" class="form-inline_1 contact_box">
					<div class="row">
						<div class="col-md-6"><label>First Name *:</label><input type="text" name="f_name" class="form-control input_box" placeholder="First Name *"></div>
						<div class="col-md-6"><label>Last Name *:</label><input type="text" name="l_name" class="form-control input_box" placeholder="Last Name *"></div>
					</div>	
					
					<div class="row">
						<div class="col-md-6"><label>Phone No *:</label><input type="text" name="ph_no" class="form-control input_box" placeholder="Phone No *"></div>
						<div class="col-md-6"><label>Email *:</label><input type="text" name="email" class="form-control input_box" placeholder="Email *"></div>
					</div>

					<div class="row">
						<div class="col-md-12"><label>Message *:</label><textarea name="message" class="form-control input_box" placeholder="Message"></textarea></div>
					</div>
					
					
					<div class="row">
						<div class="col-md-12"><button type="submit" class="btn btn-default">Send Message</button></div>
					</div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->
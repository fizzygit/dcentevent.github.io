			 <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Grievances</h2>
        <ol class="breadcrumb">
            <li><a href="<?=base_url();?>">Home</a></li>
            <li><a href="#" class="active">Grievances</a></li>
        </ol>
    </section>
    <!-- End Banner area -->	
    
	<?php if($this->session->flashdata('validation_error')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('validation_error').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('grievances_submit_success')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('grievances_submit_success').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('grievances_submit_failed')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('grievances_submit_failed').'</p>'; ?>
	<?php endif; ?>


     <!-- All Grievances Form Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>GRIEVANCES</h2>
                    <p>Only for Public Complaints relating to content on the site. Swing by for a cup of coffee, or leave us a message. We can be contacted at the address given below:</p>
                    
                    <div class="location">
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
                            <a href="#">info@dcentevent.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Fill the grievances form below:</h2>
                    <form action="<?=base_url('home/grievances/submit');?>" method="post" enctype="multipart/form-data" class="form-inline_1 contact_box">
					<div class="row">
						<div class="col-md-6"><label>First Name *:</label><input type="text" name="f_name" class="form-control input_box" placeholder="First Name *"></div>
						<div class="col-md-6"><label>Last Name *:</label><input type="text" name="l_name" class="form-control input_box" placeholder="Last Name *"></div>
					</div>	
					
					<div class="row">
						<div class="col-md-6"><label>Subject *:</label><input type="text" name="subject" class="form-control input_box" placeholder="Subject *"></div>
						<div class="col-md-6"><label>Email *:</label><input type="text" name="email" class="form-control input_box" placeholder="Email *"></div>
					</div>

					<div class="row">
						<div class="col-md-6"><label>Phone No *:</label><input type="text" name="phn_no" class="form-control input_box" placeholder="Phone No *"></div>
						<div class="col-md-6"><label>Place *:</label><input type="text" name="place" class="form-control input_box" placeholder="Place *"></div>
					</div>
					
					<div class="row">
						<div class="col-md-12"><label>Message *:</label><textarea name="message" class="form-control input_box" placeholder="Message"></textarea></div>
					</div>

					<div class="row">
						<div class="col-md-12"><button type="submit" class="btn btn-default">Submit</button></div>
					</div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End All Grievances Form Info -->
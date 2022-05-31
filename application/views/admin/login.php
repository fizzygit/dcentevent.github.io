<link rel="stylesheet" href="<?=base_url(); ?>assets/dcentevent/css/login.css">
	<div class="loginBox">
		<img src="http://infiniteiotdevices.com/images/png1.png" class="user">
		<h2>Log In Here</h2>
		<form action="<?php echo base_url('admin/mylogin/submit');?>" method="post">
			<p>Email</p>
			<input type="text" name="email" placeholder="Enter Email">
			<p>Password</p>
			<input type="password" name="password" placeholder="••••••••">
			<input type="submit"  value="LOGIN">
			<a href="#" class="a">Forgot Password?</a>
			<h5>Sign Up Using</h5>
			<ul>
				<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#" class="google"><i class="fa fa-google"></i></a></li>
			</ul>
		</form>
	</div>

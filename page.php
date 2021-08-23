<?php
get_header();

while(have_posts()){
	the_post();

	// handle sending the mail
	$sent_message = null;
	if(isset($_POST["email"])){
		$from = $_POST['email'];
		$content = $_POST['email-content'];
		$subject = $_POST['subject'];
		$to = "simonmoush@gmail.com";

		$headers = [
			"From: AlfredCIII.com Contact Form",
			"Reply-To: $from",
		];

		wp_mail($to, $subject, $content, $headers);

		$sent_message = "Your email has been sent. Thanks for getting in touch";
	}



	?>


	<div id="contact-page">

		<?php the_content(); ?>


		<div id="contact-form">
			<hr>
			<?php if(is_null($sent_message)): ?>
			<h2>Email me:</h2>
			<form method="post">
				<label for="email">Your Email Address:</label><br>
				<input type="email" id="email" name="email" required>

				<br><br>

				<label for="subject">Subject:</label><br>
				<input type="text" id="subject" name="subject" required>

				<br><br>
				
				<label for="email-content">Message:</label><br>
				<textarea id="email-content" name="email-content" rows="5" columns="50">Love your work Alfred! I want to give you money</textarea>

				<br><br>

				<button type="submit">Send</button>
			</form>
			<?php
			else:
				echo("<p id='email-confirmation'>");
				echo($sent_message);
				echo("</p>");
			endif;
			?>
				
		</div>

	</div>

	<?php
}

get_footer();

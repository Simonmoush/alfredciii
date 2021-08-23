window.addEventListener("DOMContentLoaded", ready);
function ready(){
	let posts = document.querySelectorAll(".post");
	posts.forEach(function(post, index){
		let container_height = Math.random()**2 * 30 + 5;
		post.style.height = container_height + "vh";

		let image = post.querySelector("img.homepage-img");

		if(window.innerWidth > 600){
			// desktop
			//image.style.height = (Math.random() * 50 + 30) + "vh";
			image.style.width = (Math.random() * 30 + 20) + "vw";
			image.style.height = "auto";
		}else{
			// mobile
			//image.style.maxWidth = "90vw";
			image.style.width = (Math.random() * 50 + 30) + "vw";
			image.style.height = "auto";
		}

		let rot = (Math.random() - 0.5) * 20;

		// add a shadow
						/* offset-x | offset-y | blur-radius | spread-radius | color */

		let box_shadow = "box-shadow:   -15px      -10px      5px           0px             rgba(0, 0, 0, 0.6)"

		image.style.boxShadow = box_shadow;


		//randomly rotate the images
		//image.style.transform = "rotate(" + rot + "deg)";

		image.addEventListener("load", function(event){
			let width = parseFloat(getComputedStyle(this).width);
			this.style.left = Math.random() * (window.innerWidth - width) + "px"
		});
	});
}

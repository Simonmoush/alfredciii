window.addEventListener("DOMContentLoaded", ready);
function ready(){
	let posts = document.querySelectorAll(".post");
	posts.forEach(function(post, index){
		let container_height = Math.random() * 30 + 30;
		post.style.height = container_height + "vh";

		let image = post.querySelector("img.homepage-img");
		let image_width = "40vw";

		if(window.innerWidth > 600){
			// desktop
			image_width = Math.random() * 40 + 20;
		}else{
			// mobile
			image_width = Math.random() * 50 + 30;
		}

		image.style.width = image_width + "vw";
		image.style.height = "auto";
		image.style.left = (Math.random() * (100 - image_width)) + "vw";
	});

	document.addEventListener("scroll", function(){
		const hero = document.querySelector("#hero");
		let scroll = window.scrollY;
		hero.style.backgroundPosition = "center " + -(scroll*.5);
	});

	document.querySelector("#scroll-arrow").addEventListener("click", function(){
		document.querySelector("#posts").scrollIntoView({behavior: "smooth"});
	});
}

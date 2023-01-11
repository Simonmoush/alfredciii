// just for mobile parallax effect
function mobile_parallax(){
	function map_range(x, from_start, from_end, to_start, to_end){
		let range1 = from_end - from_start;
		let range2 = to_end - to_start;
		let scale_factor = range2/range1;

		x = x-from_start;
		x = x*scale_factor;
		x = x+to_start;

		return x;
	}

	document.removeEventListener("scroll", do_parallax);
	document.addEventListener("scroll", do_parallax);

	function do_parallax(){
		if(!is_mobile()){ return; }

		let images = document.querySelectorAll("#character_select .view");
		images.forEach(function(img){
			//get image center
			let client_rect = img.getBoundingClientRect();

			let img_height = client_rect.bottom - client_rect.top;
			let img_center = client_rect.top + img_height/2;

			let from_start = window.innerHeight + img_height/2;
			let from_end = -img_height/2
			
			let opy = map_range(img_center, from_start, from_end, 0, 100);

			img.style.objectPosition = "50% " + opy + "%";

		});
	};
	do_parallax();
}

function is_mobile(){
	//let m = navigator.userAgent.toLowerCase().match(/mobile/i); 
	//return m !== null;
	return window.innerWidth < 786;
}

mobile_parallax();
// TODO this doesn't set the correct position on the page load...

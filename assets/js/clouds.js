/*
	moves the column up with the top attribute
	when the top attribute becomes greater than the height of the first image
		subtract the height of the first image from the top attribute
		move the first image to the end of the list
*/
function rise(){
	let columns = document.querySelectorAll(".fp-img-col");
	if(columns == null){
		window.requestAnimationFrame(rise);
		return;
		// we need to keep checking because the site is a single page app and the content may change.
	}

	columns.forEach(function(col, i){
		let col_style = window.getComputedStyle(col);
		let current_top = parseFloat(col_style.top.match(/-?\d+(\.\d+)?/));

		let up = i % 2 == 0;

		let dt = (i+5)/10;
		if(up){
			dt *= -1;
		}

		let new_top = current_top + dt;

		let first_image = col.firstElementChild;
		let first_image_style = window.getComputedStyle(first_image);
		let first_image_height = parseFloat(first_image_style.height.match(/-?\d+(\.\d+)?/));
		let margin = parseFloat(first_image_style.marginTop.match(/-?\d+(\.\d+)?/));

		if(Math.abs(new_top) > first_image_height + 2*margin){
			// move the node to the end
			col.appendChild(first_image);
			col.style.top = "0px";
		}else{
			col.style.top = new_top + "px";
		}
	});

	window.requestAnimationFrame(rise);
}

document.addEventListener("DOMContentLoaded", function(){rise();});

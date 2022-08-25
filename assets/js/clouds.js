/*
	moves the column up with the top attribute
	when the top attribute becomes greater than the height of the first image
		subtract the height of the first image from the top attribute
		move the first image to the end of the list
	
	Edit: extend this to also work for horizontal images

	TODO: whenever the page changes we need to call cycle
*/

function get_front(list){
	let parent_flex_direction = window.getComputedStyle(list.parentNode).flexDirection;
	let front = null;
	if(parent_flex_direction == "column"){
		front = window.getComputedStyle(list).left.match(/-?\d+(\.\d+)?/)[0];
	}else if(parent_flex_direction == "row"){
		front = window.getComputedStyle(list).top.match(/-?\d+(\.\d+)?/)[0];
	}
	return parseFloat(front);
}

function set_front(list, front){
	let parent_flex_direction = window.getComputedStyle(list.parentNode).flexDirection;
	if(parent_flex_direction == "column"){
		list.style.top = "0px";
		return list.style.left = front + "px";
	}else if(parent_flex_direction == "row"){
		list.style.left = "0px";
		return list.style.top = front + "px";
	}
}

function get_first_img_size(list){
	let parent_flex_direction = window.getComputedStyle(list.parentNode).flexDirection;

	let first_image = list.firstElementChild;
	let first_image_style = window.getComputedStyle(first_image);
	
	let size = null;
	if(parent_flex_direction == "column"){
		size = parseFloat(first_image_style.width.match(/-?\d+(\.\d+)?/));
	}else if(parent_flex_direction == "row"){
		size = parseFloat(first_image_style.height.match(/-?\d+(\.\d+)?/));
	}

	return size;
}

function cycle(){
	let lists = document.querySelectorAll(".fp-img-list");
	if(lists == null){
		window.requestAnimationFrame(cycle); // TODO: remove this and only check when the page changes
		return;
	}

	lists.forEach(function(list, i){

		// get current front offset
		let current_front = get_front(list);
		
		// get direction
		let forward = list.classList.contains("forward");

		// sets the speed of each column
		let dfront = (i+5)/10;

		// reverse the direction for forward lists
		if(forward){ dfront *= -1; }

		// calculate the new offset
		let new_front = current_front + dfront;

		// set the new offset and, if needed, move the front node to the end
		let size = get_first_img_size(list);

		if(Math.abs(new_front) > size){
			// move the front to the end
			list.appendChild(list.firstElementChild);
			// reset the offset
			set_front(list, 0);
		}else{
			// advance the offset
			set_front(list, new_front);
		}
	});

	window.requestAnimationFrame(cycle);
}

document.addEventListener("DOMContentLoaded", function(){cycle();});

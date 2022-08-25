window.addEventListener('popstate', (event) => {
	do_transition(event);
});

function do_transition(event){
	event.preventDefault();
	
	let url = "";

	if(event.type == "click"){
		url = event.target.href;
		let title = "Alfred Coleman III :: " + event.target.innerHTML;

		window.history.pushState({"title": title}, title, url);
		document.title = title;
	}else if(event.type == "popstate"){
		url = event.target.location.href;
		document.title = event.state.title;
	}else{
		console.log("unkown event type");
		return;
	}

	
	let xhr = new XMLHttpRequest();
	xhr.open("GET", url.concat("?single_page=true") , true);

	xhr.onreadystatechange = function () {
		if(xhr.readyState === XMLHttpRequest.DONE) {
			var status = xhr.status;
			if (status === 0 || (status >= 200 && status < 400)) {
				// change the page
				document.querySelector("#content").innerHTML = xhr.response;

				// rescan the new page for links that should be transitioning
				transitionify();
			} else {
				console.log("the page could not be loaded");
			}
		}
	};
	xhr.send();
}

function transitionify(){
	let links_to_transition = [];
	links_to_transition.push(document.querySelectorAll("a:not(.external)"));

	links_to_transition.forEach(function(links){
		links.forEach(function(link){
			link.removeEventListener("click", do_transition)
			link.addEventListener("click", do_transition);
		})
	});
}

// ON LOAD
document.addEventListener('DOMContentLoaded', transitionify);

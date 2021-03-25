var tweeps = document.getElementsByClassName('feedContent');

for (var i = 0; i < tweeps.length; i++) {
	tweeps[i].addEventListener('click', openTweep);
}

function openTweep() {
	var content = this.getElementsByClassName('tweepText');
	if(content[0].style.height) {
		content[0].setAttribute("style", "height: ''; overflow: ''");
		content[0].style.height = null;
		content[0].style.overflow = null;
	}
	else {
		content[0].style.height = "3em";
		content[0].style.overflow = "hidden";
	}	
}
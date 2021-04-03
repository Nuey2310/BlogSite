/*  Event listeners for the tweets so they expand on click and then contract again on the second click.
*/

var tweeps = document.getElementsByClassName('feedContent');

for (var i = 0; i < tweeps.length; i++) {
	tweeps[i].addEventListener('click', openTweep);
}

function openTweep() {
	var content = this.getElementsByClassName('tweepText');
	if(content[0].style.height) {
		//SetAtribute for some browsers
		//URL: https://www.w3schools.com/jsref/met_element_setattribute.asp
		content[0].setAttribute("style", "height: ''; overflow: ''");
		content[0].style.height = null;
		content[0].style.overflow = null;
	}
	else {
		content[0].style.height = "3em";
		content[0].style.overflow = "hidden";
	}	
}
/*
jQuery event.stopPropogation() method
URL: https://www.w3schools.com/jquery/event_stoppropagation.asp
Date Accessed: April 3, 2021
*/
function preventOpen(event) {
	if (event.stopPropagation){
		event.stopPropagation();
	}
}
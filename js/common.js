var quistion = document.getElementById('quistion');
var arrow = document.getElementById('arrow');
quistion.addEventListener('mouseover', function() {
	quistion.style.backgroundColor = "black";
	quistion.style.transition = "1s";
	arrow.style.backgroundColor = "#FFDD00";
	arrow.style.transition = "1s";
});
quistion.addEventListener('mouseout', function() {
	quistion.style.backgroundColor = "#FFDD00";
	quistion.style.transition = "1s";
	arrow.style.backgroundColor = "black";
	arrow.style.transition = "1s";
});
open_close.onclick = function(){
	section_hide.classList.toggle('active');
}
close_js.onclick = function(){
	section_hide.classList.remove('active');
}

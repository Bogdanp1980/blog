var admin__password = document.getElementsByTagName('admin__password');
var pass = document.getElementById("input");
admin__password.onclick = function(){
	console.log(2);
}
empty.onmouseover = function(){
	empty.classList.toggle('active');
	if(pass.classList.contains("typetext")){
		pass.type = "password";
	}else{
		pass.type = "text";
	}
	pass.classList.toggle("typetext");
}
var button = document.getElementById('button');
var input = document.getElementById('input');
input.onkeypress = func;

function func(event) {
	var code = event.keyCode;
	var key = String.fromCharCode(event.keyCode);
	button.style.backgroundColor="#65C565";
  button.style.color="white";
}

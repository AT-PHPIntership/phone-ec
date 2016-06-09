
var chat = document.getElementById("chatwindow");
var msg = document.getElementById("messagebox");

var socket = new WebSocket("ws://192.168.10.10:3000");

var open = false;

function addMessage(msg) {
	
	chat.innerHTML += "<p>" + msg + "</p>";

}

msg.addEventListener("keypress", function(evt) {
	if (evt.charCode != 13 ) 
		return;

	evt.preventDefault();

	if (msg.value == "")
		return;

	socket.send(JSON.stringify({
		msg: msg.value
	}));

	addMessage(msg.value);


	msg.value = "";
});	

socket.onopen = function() {
	open = true;

	addMessage ("Connected");
};

socket.onmessage = function(evt) {
	var data = JSON.parse(evt.data);
	addMessage(data.msg);		
};

socket.onclose = function() {
	open = false;

	addMessage ("DisConnected");
};  

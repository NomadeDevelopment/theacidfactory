$(function(){

	
	score=-1;
		var clicker = document.getElementById('clicker');
		clicker.addEventListener('click', function(){
			var msg = {
				0: "stop",
				1: "clicking",
				2: "on",
				3: "me",
				4: "you",
				5: "motherfucker",
			};	
			score++;
			var i = score % 6;
			document.getElementById('clicker').innerHTML = msg[i];
			document.getElementById('t1').value = "score: " + score;
		});
})
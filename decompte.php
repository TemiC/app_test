<html>
	<head></head>
		<body>
				<button onclick="start()">Lancer le décompte</button>
				  <div id="bip" class="display"></div>

					<script>
						var counter = 5;
						var intervalId = null;
						
						function action(){
						  clearInterval(intervalId);
						  document.getElementById("bip").innerHTML = "TERMINE!";	
						}
						function bip(){
						  document.getElementById("bip").innerHTML = counter + " secondes restantes";
						  counter--;
						}
						function start(){
						  intervalId = setInterval(bip, 1000);
						  setTimeout(action, counter * 1000);
						}	
				</script>
				
	</body>

</html>

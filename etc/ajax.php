<input type="text" id="name">
<button onclick='checkName()'>Check saang section</button>
<h2 id="result"></h2>





<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
</script>

<script type="text/javascript">
	function checkName(i){
		let name = $('$name').val();
		$.ajax({
			"url":"checkSection.php",
			"data":{"name": name},
			"type": "POST",
			"success": function(dataFromUrl){
				$('#result').html(dataFromUrl);
			}

		});
	}
</script>
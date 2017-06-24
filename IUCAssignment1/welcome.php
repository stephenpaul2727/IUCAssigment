<!DOCTYPE html>
<html>
<head>
	<title>Degree Form</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		setTimeout(hideDiv, 5000);

		function hideDiv() {
		  $(".header").fadeOut().empty();
		}
	</script>
	<style>
		.body {
			background-color: #e2c4bc;
		}
		.header {
			height:auto;
			top:0;
			background-color:#efefef;
			text-align: center;
		}
		.container {
			margin-top: 1%;
		}
	</style>
</head>
<body>
	<div class="header">
		<p><b><?php include("index.php"); ?></b></p>
	</div>
	<div class="container">
		<div class="jumbotron">
			<h1> Add a new Degree. </h1>
		</div>
		<form role="form" data-toggle="validator" method ="post" action="index.php">
			<div class="form-group">
    			<label for="bp">bp</label>
    			<input type="text" class="form-control" data-minlength="0" id="bp" pattern="^[a-z\s]+$" aria-describedby="bp" name="bp">
    			<small id="Help1" class="form-text text-muted">Not required. Max Length is 299. Alpha-numeric Characters only.</small>
  			</div>
  			<div class="form-group">
    			<label for="dp">dp</label>
    			<input type="text" class="form-control" data-minlength="0" id="dp" pattern="^[a-z\s]+$" aria-describedby="dp" name="dp">
    			<small id="Help2" class="form-text text-muted">Not required. Max Length is 299. Aplha-numeric characters only.</small>
  			</div>
  			<div class="form-group">
    			<label for="id">id</label>
    			<input type="text" class="form-control" data-minlength="2" id="id" pattern="^[a-z A-Z 0-9\s]+$" name="id" data-error="special characters are not allowed and length should be between 10 and 100." aria-describedby="id" required>
    			<div class="help-block with-errors"></div>
    			<small id="Help3" class="form-text text-muted">min-length: 10, max-legnth: 299, Alpha-numeric characters only.</small>
  			</div>
  			<div class="form-group">
    			<label for="letter">letter</label>
    			<input type="text" class="form-control" data-minlength="1" pattern="^[A-Z\s]{1}$" id="letter" aria-describedby="letter" name="letter" data-error="One UpperCase Alphabet is expected" required>
    			<div class="help-block with-errors"></div>
    			<small id="Help4" class="form-text text-muted">Length should be 1 and it should be an uppercase alphabet.</small>
  			</div>
  			<div class="form-group">
    			<label for="link">link</label>
    			<input type="url" class="form-control" data-minlength="2" id="link" aria-describedby="link" name="link" data-error="Link is invalid" required>
    			<div class="help-block with-errors"></div>
    			<small id="Help5" class="form-text text-muted">Link should satisfy general link conditions.</small>
  			</div>
  			<div class="form-group">
    			<label for="mp">mp</label>
    			<input type="text" class="form-control" data-minlength="0" id="mp" aria-describedby="mp" name="mp" pattern="^[a-z A-Z\s]*$" data-error="length should be between 0 and 299.">
    			<div class="help-block with-errors"></div>
    			<small id="Help6" class="form-text text-muted">Not required. Alpha-numeric characters only.</small>
  			</div>
  			<div class="form-group">
    			<label for="name">name</label>
    			<input type="text" class="form-control" data-minlength="2" id="name" aria-describedby="name" name="name" pattern="^[a-z\s]+$" data-error="length should be between 2 and 299." required>
    			<div class="help-block with-errors"></div>
    			<small id="Help7" class="form-text text-muted">Length should be between 2 and 299. characters only.</small>

  			</div>
  			<div class="form-group">
    			<label for="school">school</label>
    			<input type="text" class="form-control" data-minlength="0" id="school" pattern="^[a-z\s]*$" name="school" aria-describedby="school" data-error="length should be between 0 and 299">
    			<div class="help-block with-errors"></div>
    			<small id="Help8" class="form-text text-muted">Not required. But should be characters only</small>
  			</div>
  		 	<button type="submit" class="btn btn-primary">Submit</button>
  		</form>
	</div>
</body>
</html>

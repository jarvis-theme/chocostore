<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		{{ Theme::partial('seostuff') }}	
		{{ Theme::partial('defaultcss') }}	
		{{ Theme::asset()->styles() }}	
	</head>
	<body>
		<div class="main-wrapper">
			{{ Theme::partial('header') }}	  
			<section class="wrapper">
				<div id="container">
		  			{{ Theme::place('content') }}	
	  			</div>
  			</section>
		</div>
		{{ Theme::partial('footer') }}	
		<!-- JavaScripts -->
		{{ Theme::partial('defaultjs') }}	
	</body>
</html>
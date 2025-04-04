<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forget Password</title>
	<!-- Optional: Add Google Fonts link for a better font -->
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">
	<style>
		body {
			font-family: 'Jost', sans-serif;
			background-color: #f4f4f4;
			padding: 20px;
			margin: 0;
		}

		.container {
			background-color: #ffffff;
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		h1 {
			color: #333;
		}

		p {
			color: #555;
		}

		a {
			color: #2D3748;
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>

	<div class="container">
		<!-- Add logo here -->
		<img src="https://res.cloudinary.com/doeoa6jzb/image/upload/v1728430577/logo_otetxx.png" alt="Amras logo">
		<h1>Forget Password Email</h1>

		<p>Kindly click the link below to reset your password:</p>
		<a href="{{ route('reset.password.get', $token) }}">Reset Password</a>
	</div>

</body>

</html>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard - Ultima POS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
	<nav class="navbar navbar-dark bg-primary px-3">
		<span class="navbar-brand fw-bold">Ultima POS - Admin</span>
		<a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-sm btn-outline-light">Keluar</a>
	</nav>

	<div class="container py-4">
		<div class="card shadow-sm border-0 p-4">
			<h4 class="fw-bold mb-1">Selamat datang, <?php echo htmlspecialchars($user_name); ?></h4>
			<p class="text-muted mb-0">
				<?php echo htmlspecialchars($role_name); ?> - <?php echo htmlspecialchars($warehouse); ?>
			</p>
		</div>
	</div>
</body>
</html>

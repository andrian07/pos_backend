<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Ultima POS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body { background: linear-gradient(135deg, #17C7F2, #0066FF); min-height: 100vh; display: flex; align-items: center; }
		.login-card { max-width: 400px; margin: auto; border-radius: 16px; border: none; box-shadow: 0 20px 40px rgba(0,0,0,.2); }
	</style>
</head>
<body>
	<div class="container">
		<div class="card login-card p-4">
			<h4 class="mb-1 fw-bold">Ultima POS</h4>
			<p class="text-muted mb-4">Masuk ke panel admin</p>

			<?php $error = $this->session->flashdata('login_error'); ?>
			<?php if ($error): ?>
				<div class="alert alert-danger py-2"><?php echo htmlspecialchars($error); ?></div>
			<?php endif; ?>

			<?php echo form_open('auth/processlogin'); ?>
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" name="username" class="form-control" required autofocus>
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary w-100">Masuk</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</body>
</html>

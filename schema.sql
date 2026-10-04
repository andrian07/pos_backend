-- pos database schema + seed data
-- Run with: mysql -uroot pos < schema.sql

CREATE TABLE IF NOT EXISTS ms_role (
	role_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	role_name VARCHAR(50) NOT NULL,
	is_active CHAR(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS ms_warehouse (
	warehouse_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	warehouse_name VARCHAR(100) NOT NULL,
	is_active CHAR(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS ms_user (
	user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_name VARCHAR(50) NOT NULL UNIQUE,
	user_password VARCHAR(255) NOT NULL,
	user_role INT UNSIGNED NOT NULL,
	user_branch INT UNSIGNED NOT NULL,
	is_active CHAR(1) NOT NULL DEFAULT 'Y',
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT fk_ms_user_role FOREIGN KEY (user_role) REFERENCES ms_role(role_id),
	CONSTRAINT fk_ms_user_warehouse FOREIGN KEY (user_branch) REFERENCES ms_warehouse(warehouse_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO ms_role (role_name, is_active) VALUES ('Kasir', 'Y');
INSERT INTO ms_warehouse (warehouse_name, is_active) VALUES ('Outlet Utama', 'Y');

-- Dev seed user: username "andrian", password "andrian123" (bcrypt-hashed).
-- Change or remove this before going to production.
INSERT INTO ms_user (user_name, user_password, user_role, user_branch, is_active)
VALUES ('andrian', '$2y$10$xH0DaCsw03t96cQWinbzCONUicY/BBIZOJSDqMHy/SSoIx9Gz8Tja', 1, 1, 'Y');

CREATE TABLE admin_settings (id BIGINT AUTO_INCREMENT, transportload_expiration_in_days DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user (id BIGINT AUTO_INCREMENT, sf_guard_user_id INT, company VARCHAR(255), district_id BIGINT, address VARCHAR(255), email_address VARCHAR(255), tel VARCHAR(255), cell VARCHAR(255), comment VARCHAR(255), sms_number BIGINT, user_type VARCHAR(255), number_of_trucks BIGINT, business VARCHAR(255), INDEX sf_guard_user_id_idx (sf_guard_user_id), INDEX district_id_idx (district_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE customer_preferred_transporter (customer_id BIGINT, transporter_id BIGINT, PRIMARY KEY(customer_id, transporter_id)) ENGINE = INNODB;
CREATE TABLE district (id BIGINT AUTO_INCREMENT, name VARCHAR(50), province_id BIGINT NOT NULL, INDEX province_id_idx (province_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE package (id BIGINT AUTO_INCREMENT, name VARCHAR(50), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE province (id BIGINT AUTO_INCREMENT, name VARCHAR(50), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE transport_load (id BIGINT AUTO_INCREMENT, customer_id BIGINT NOT NULL, transporter_id BIGINT NOT NULL, from_district BIGINT NOT NULL, to_district BIGINT NOT NULL, load_description VARCHAR(50), package_id BIGINT NOT NULL, weight INT DEFAULT 0 NOT NULL, arrive_before DATETIME NOT NULL, arrive_after DATETIME, expired_at DATETIME, bid VARCHAR(9) DEFAULT 'Open', comment VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX from_district_idx (from_district), INDEX to_district_idx (to_district), INDEX customer_id_idx (customer_id), INDEX transporter_id_idx (transporter_id), INDEX package_id_idx (package_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user (id BIGINT AUTO_INCREMENT, sf_guard_user_id INT, company VARCHAR(255), district_id BIGINT, address VARCHAR(255), email_address VARCHAR(255), tel VARCHAR(255), cell VARCHAR(255), comment VARCHAR(255), sms_number BIGINT, user_type VARCHAR(255), number_of_trucks BIGINT, business VARCHAR(255), INDEX user_user_type_idx (user_type), INDEX sf_guard_user_id_idx (sf_guard_user_id), INDEX district_id_idx (district_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id INT AUTO_INCREMENT, user_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id INT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id INT, group_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE user ADD CONSTRAINT user_sf_guard_user_id_sf_guard_user_id FOREIGN KEY (sf_guard_user_id) REFERENCES sf_guard_user(id);
ALTER TABLE user ADD CONSTRAINT user_district_id_district_id FOREIGN KEY (district_id) REFERENCES district(id);
ALTER TABLE customer_preferred_transporter ADD CONSTRAINT customer_preferred_transporter_transporter_id_user_id FOREIGN KEY (transporter_id) REFERENCES user(id) ON DELETE CASCADE;
ALTER TABLE customer_preferred_transporter ADD CONSTRAINT customer_preferred_transporter_customer_id_user_id FOREIGN KEY (customer_id) REFERENCES user(id) ON DELETE CASCADE;
ALTER TABLE district ADD CONSTRAINT district_province_id_province_id FOREIGN KEY (province_id) REFERENCES province(id);
ALTER TABLE transport_load ADD CONSTRAINT transport_load_transporter_id_user_id FOREIGN KEY (transporter_id) REFERENCES user(id);
ALTER TABLE transport_load ADD CONSTRAINT transport_load_to_district_district_id FOREIGN KEY (to_district) REFERENCES district(id);
ALTER TABLE transport_load ADD CONSTRAINT transport_load_package_id_package_id FOREIGN KEY (package_id) REFERENCES package(id);
ALTER TABLE transport_load ADD CONSTRAINT transport_load_from_district_district_id FOREIGN KEY (from_district) REFERENCES district(id);
ALTER TABLE transport_load ADD CONSTRAINT transport_load_customer_id_user_id FOREIGN KEY (customer_id) REFERENCES user(id);
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;

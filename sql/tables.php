
05-09-22
ALTER TABLE `tb_customer` ADD `referral_check` INT NOT NULL DEFAULT '0' AFTER `reference_by`;

08-09-222
ALTER TABLE `tb_user_role` ADD `module_name` VARCHAR(100) NOT NULL AFTER `role_name`;

09-09-22
RENAME TABLE `refralmanage`.`tb_user_role` TO `refralmanage`.`tb_user_permission`;
CREATE TABLE `refralmanage`.`tb_user_role` (`role_id` INT NOT NULL AUTO_INCREMENT , `role_name` VARCHAR(100) NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`role_id`)) ENGINE = InnoDB;
ALTER TABLE `tb_user` DROP FOREIGN KEY `tb_user_ibfk_1`; ALTER TABLE `tb_user` ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`ur_id`) REFERENCES `tb_user_role`(`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tb_user_permission` CHANGE `ur_id` `up_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tb_user_permission` ADD FOREIGN KEY (`role_id`) REFERENCES `tb_user_role`(`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

12-09-22
ALTER TABLE `tb_customer` CHANGE `reference_by` `cus_ref_id` INT NULL DEFAULT NULL;
CREATE TABLE `refralmanage`.`tb_commission` (`com_id` INT NOT NULL  AUTO_INCREMENT, `cus_id` INT NOT NULL , `cus_ref_id` INT NOT NULL , `com_amount` DOUBLE(10,2) NOT NULL , `user_id` INT NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL, add PRIMARY KEY (`com_id`) ) ENGINE = InnoDB;

14-09-22
ALTER TABLE `tb_commission` CHANGE `cus_ref_id` `cus_ref_id` INT(11) NULL DEFAULT NULL;
ALTER TABLE `tb_customer` CHANGE `customer_password` `customer_password` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `tb_customer_bank_accounts` ADD `paypal_id` VARCHAR(150) NULL DEFAULT NULL AFTER `branch_name`, ADD `stripe_id` VARCHAR(150) NULL DEFAULT NULL AFTER `paypal_id`;

23-09-22
CREATE TABLE `refralmanage`.`tb_email_template` (`et_id` INT NOT NULL AUTO_INCREMENT , `email_for` VARCHAR(255) NOT NULL , `email_subject` TEXT NOT NULL , `email` LONGTEXT NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`et_id`)) ENGINE = InnoDB;

29-09-22
ALTER TABLE `tb_customer` ADD `ur_id` INT NOT NULL AFTER `cus_id`;

03-10-22
ALTER TABLE `tb_customer` ADD `convert_cus` INT NULL DEFAULT NULL AFTER `user_id`;

06-10-22
CREATE TABLE `refralmanage`.`tb_plan` (`plan_id` INT NOT NULL AUTO_INCREMENT , `ref_con_fee` DOUBLE(10,2) NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`plan_id`)) ENGINE = InnoDB;
CREATE TABLE `refralmanage`.`tb_plan_det` (`plan_det_id` INT NOT NULL AUTO_INCREMENT , `plan_id` INT NOT NULL , `ref_days_fromTo` VARCHAR(100) NOT NULL , `ref_fee_per_wise` DOUBLE(10,2) NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`plan_det_id`)) ENGINE = InnoDB;

08-10-22
ALTER TABLE `tb_customer` ADD `refer_date` DATETIME NULL DEFAULT NULL AFTER `referral_check`;

10-10-2022
ALTER TABLE `tb_customer` ADD `convert_cus_date` DATETIME NULL DEFAULT NULL AFTER `convert_cus`;

11-10-22
ALTER TABLE `tb_customer` ADD `plan_id` INT NULL DEFAULT NULL AFTER `ur_id`;
ALTER TABLE `tb_plan_det` ADD `ref_days_to` INT NOT NULL DEFAULT '0' AFTER `ref_days_fromTo`;
ALTER TABLE `tb_plan_det` CHANGE `ref_days_from` `ref_days_from` INT NOT NULL DEFAULT '0';
CREATE TABLE `refralmanage`.`tb_customer_ref_con` (`crc_id` INT NOT NULL AUTO_INCREMENT , `cus_id` INT NOT NULL , `plan_id` INT NOT NULL , `cus_ref_total_amt` DOUBLE NOT NULL , `cus_con_total_amt` DOUBLE NOT NULL , `total` DOUBLE NOT NULL COMMENT 'customer referral count + customer convert count' , `cus_ref_id` TEXT NULL DEFAULT NULL , `cus_con_id` TEXT NULL DEFAULT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`crc_id`)) ENGINE = InnoDB;
ALTER TABLE `tb_customer_ref_con` ADD `total_customer_ref` INT NULL DEFAULT NULL AFTER `total`, ADD `total_customer_con` INT NULL DEFAULT NULL AFTER `total_customer_ref`;

12-10-22
ALTER TABLE `tb_customer_ref_con` ADD `entry_date` DATE NULL DEFAULT NULL AFTER `cus_con_id`;

13-10-22
ALTER TABLE `tb_customer_ref_con` CHANGE `cus_ref_total_amt` `cus_ref_total_amt` DOUBLE(10,2) NOT NULL, CHANGE `cus_con_total_amt` `cus_con_total_amt` DOUBLE(10,2) NOT NULL, CHANGE `total` `total` DOUBLE(10,2) NOT NULL COMMENT 'customer referral count + customer convert count';

05-11-22
ALTER TABLE `tb_user` ADD `user_type` ENUM('admin','referral') NOT NULL AFTER `password`;


30-11-22
ALTER TABLE `tb_customer` ADD `user_type` ENUM('admin','customer') NOT NULL AFTER `user_id`;

12-12-2022
ALTER TABLE `tb_customer` CHANGE `user_type` `user_type` ENUM('admin','referral') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL;
ALTER TABLE `tb_customer` ADD `is_referral_counted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `convert_cus_date`, ADD `is_bought_counted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `is_referral_counted`;

13-12-2022
ALTER TABLE `tb_customer` CHANGE `customer_address` `customer_address` TEXT NULL;
ALTER TABLE `tb_customer` ADD `ur_id` INT NOT NULL AFTER `cus_id`;
UPDATE `tb_customer` SET `ur_id`=2;


19-12-2022
CREATE TABLE `referral_db`.`tbl_register` ( `reg_id` INT(11) NOT NULL AUTO_INCREMENT , `user_name` VARCHAR(100) NOT NULL , `user_phone_no` VARCHAR(20) NOT NULL , `user_email` VARCHAR(255) NOT NULL , PRIMARY KEY (`reg_id`)) ENGINE = InnoDB;

ALTER TABLE `tbl_register` ADD `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `user_email`, ADD `updated` TIMESTAMP NULL DEFAULT NULL AFTER `created`;

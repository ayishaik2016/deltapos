UPDATE `currencies` SET `is_company_currency` = '0' WHERE `currencies`.`id` = 1;
UPDATE `currencies` SET `is_company_currency` = '1' WHERE `currencies`.`id` = 2;


INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('sale.invoice.item.update', 'web', '2025-08-17 14:24:37', '2025-08-17 14:24:37', '26', '1', 'Allow user to update the selected item');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('sale.invoice.total.update', 'web', '2025-08-17 14:24:37', '2025-08-17 14:24:37', '26', '1', 'Allow user to update the selected item total');
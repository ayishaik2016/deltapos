UPDATE `currencies` SET `is_company_currency` = '0' WHERE `currencies`.`id` = 1;
UPDATE `currencies` SET `is_company_currency` = '1' WHERE `currencies`.`id` = 2;

INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('sale.invoice.item.update', 'web', '2025-08-17 14:24:37', '2025-08-17 14:24:37', '26', '1', 'Allow user to update the selected item');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('sale.invoice.total.update', 'web', '2025-08-17 14:24:37', '2025-08-17 14:24:37', '26', '1', 'Allow user to update the selected item total');

//18-08-2025
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('sale.invoice.additional.fields', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', '26', '1', 'Allow user to view additional fields
');
INSERT INTO `permission_groups` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'Vehicle Type', '1', '2025-08-18 19:18:44', '2025-08-18 19:18:44');
INSERT INTO `permission_groups` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'Vehicle', '1', '2025-08-18 19:18:44', '2025-08-18 19:18:44');

INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('vehicle.type.create', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Vehicle Type"), '1', 'Create');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('vehicle.type.edit', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Vehicle Type"), '1', 'Edit');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('vehicle.type.view', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Vehicle Type"), '1', 'View');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('vehicle.type.delete', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Vehicle Type"), '1', 'Delete');

INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('vehicle.create', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Vehicle"), '1', 'Create');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('vehicle.edit', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Vehicle"), '1', 'Edit');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('vehicle.view', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Vehicle"), '1', 'View');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('vehicle.delete', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Vehicle"), '1', 'Delete');

INSERT INTO `permission_groups` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'Item Dispatch Form', '1', '2025-08-22 19:18:44', '2025-08-22 19:18:44');

INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('item.dispatch.create', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Item Dispatch Form"), '1', 'Create');
INSERT INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`, `status`, `display_name`) VALUES ('item.dispatch.view', 'web', '2025-08-18 08:24:37', '2025-08-18 08:24:37', (SELECT id FROM permission_groups WHERE name = "Item Dispatch Form"), '1', 'View');
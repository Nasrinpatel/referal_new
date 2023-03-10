ALTER TABLE `inquiry_team_user` ADD FOREIGN KEY (`im_id`) REFERENCES `inquiry_master`(`im_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `inquiry_team_artist` ADD FOREIGN KEY (`im_id`) REFERENCES `inquiry_master`(`im_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `inquiry_master` ADD FOREIGN KEY (`client_id`) REFERENCES `client_master`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `inquiry_master` ADD FOREIGN KEY (`agency_id`) REFERENCES `agency_master`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `inquiry_master` ADD FOREIGN KEY (`inquiry_status`) REFERENCES `stage_master`(`sm_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `inquiry_followup_master` ADD FOREIGN KEY (`im_id`) REFERENCES `inquiry_master`(`im_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `inquiry_reminder_master` ADD FOREIGN KEY (`im_id`) REFERENCES `inquiry_master`(`im_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `inquiry_artist_master` ADD FOREIGN KEY (`im_id`) REFERENCES `inquiry_master`(`im_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `inquiry_event_master` ADD FOREIGN KEY (`im_id`) REFERENCES `inquiry_master`(`im_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

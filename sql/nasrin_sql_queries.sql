CREATE TABLE `social_media_master` (
  `social_media_id` int(11) NOT NULL,
  `social_id` int(11) NOT NULL,
  `link` text NOT NULL,
  `artist_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `social_media_master`
  ADD PRIMARY KEY (`social_media_id`);

ALTER TABLE `social_media_master`
  MODIFY `social_media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `answer_master`
  DROP `notes`,
  DROP `image`;

CREATE TABLE `answer_note_master` (
  `an_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `image` text NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `answer_note_master`
  ADD PRIMARY KEY (`an_id`);

ALTER TABLE `answer_note_master`
  MODIFY `an_id` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `inquiry_artist_master` ADD `is_artist_confirmed` BOOLEAN NOT NULL DEFAULT FALSE AFTER `max_budget`;

ALTER TABLE `inquiry_artist_master` CHANGE `artist_name` `artist_name` INT(20) NOT NULL;



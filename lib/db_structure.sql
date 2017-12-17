SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `musical_form_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `composer` (
  `id` int(11) NOT NULL,
  `initials` varchar(20) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_year` smallint(6) NOT NULL,
  `birth_month` tinyint(4) DEFAULT NULL,
  `birth_day` tinyint(4) DEFAULT NULL,
  `death_year` smallint(6) DEFAULT NULL,
  `death_month` tinyint(4) DEFAULT NULL,
  `death_day` tinyint(4) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `work_index_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `composition` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `composer_id` int(11) NOT NULL,
  `full_title` varchar(200) DEFAULT NULL,
  `tonality_code` varchar(7) DEFAULT NULL,
  `opus` varchar(10) DEFAULT NULL,
  `instrumentation_code` varchar(5) NOT NULL DEFAULT 'ORG2P',
  `composition_year` smallint(6) NOT NULL,
  `transcriber_id` int(11) DEFAULT NULL,
  `initial_instrumentation_code` varchar(5) DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `collection_position` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `theme` varchar(50) DEFAULT NULL,
  `additional_info` varchar(400) DEFAULT NULL,
  `musical_form_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '3',
  `to_be_recorded` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
CREATE TABLE `composition_by_album` (
`title` varchar(50)
,`composer` varchar(72)
,`album` varchar(50)
,`album-position` varchar(11)
,`collection` varchar(64)
,`key` varchar(18)
,`duration` int(11)
,`status` varchar(50)
);
CREATE TABLE `composition_by_composer` (
);

CREATE TABLE `concert` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `includes` (
  `instrumentation_code` varchar(5) NOT NULL,
  `instrument_code` varchar(5) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `instrument` (
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `playing_range` varchar(10) DEFAULT NULL,
  `additional_info` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `instrumentation` (
  `code` varchar(5) NOT NULL,
  `description` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `conducted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `musical_form` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `performed_at` (
  `concert_id` int(11) NOT NULL,
  `composition_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `published_in` (
  `composition_id` int(11) NOT NULL,
  `score_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `recorded_on` (
  `album_id` int(11) NOT NULL,
  `composition_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `book_title` varchar(50) DEFAULT NULL,
  `description` varchar(400) NOT NULL,
  `editor` varchar(50) DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `publishing_year` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `tonality` (
  `code` varchar(7) NOT NULL,
  `root` varchar(7) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `key_signature` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
DROP TABLE IF EXISTS `composition_by_album`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `composition_by_album`  AS  (select `composition`.`title` AS `title`,concat(`author`.`last_name`,', ',`author`.`initials`) AS `composer`,coalesce(`album`.`title`,'') AS `album`,coalesce(`recorded_on`.`position`,'') AS `album-position`,(case when isnull(`composition`.`collection_id`) then '' else concat(`collection`.`title`,' (',`composition`.`collection_position`,')') end) AS `collection`,concat(`tonality`.`root`,' ',`tonality`.`mode`) AS `key`,`composition`.`duration` AS `duration`,`status`.`description` AS `status` from ((((((`composition` left join `recorded_on` on((`recorded_on`.`composition_id` = `composition`.`id`))) left join `album` on((`recorded_on`.`album_id` = `album`.`id`))) left join `composer` `author` on((`composition`.`composer_id` = `author`.`id`))) left join `status` on((`composition`.`status_id` = `status`.`id`))) left join `tonality` on((`composition`.`tonality_code` = `tonality`.`code`))) left join `collection` on((`composition`.`collection_id` = `collection`.`id`))) where (`composition`.`to_be_recorded` = 1)) union (select `composition`.`title` AS `title`,concat(`author`.`last_name`,', ',`author`.`initials`) AS `composer`,coalesce(`album`.`title`,'') AS `album`,coalesce(`recorded_on`.`position`,'') AS `album-position`,(case when isnull(`composition`.`collection_id`) then '' else concat(`collection`.`title`,' (',`composition`.`collection_position`,')') end) AS `collection`,concat(`tonality`.`root`,' ',`tonality`.`mode`) AS `key`,`composition`.`duration` AS `duration`,`status`.`description` AS `status` from ((((((`recorded_on` left join `composition` on((`recorded_on`.`composition_id` = `composition`.`id`))) left join `album` on((`recorded_on`.`album_id` = `album`.`id`))) left join `composer` `author` on((`composition`.`composer_id` = `author`.`id`))) left join `status` on((`composition`.`status_id` = `status`.`id`))) left join `tonality` on((`composition`.`tonality_code` = `tonality`.`code`))) left join `collection` on((`composition`.`collection_id` = `collection`.`id`)))) order by `album`,`album-position` ;
DROP TABLE IF EXISTS `composition_by_composer`;


ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Collection-Musical_Form` (`musical_form_id`);

ALTER TABLE `composer`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `composition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Composition-Composer` (`composer_id`),
  ADD KEY `Composition-Instrumentation` (`instrumentation_code`),
  ADD KEY `Composition-Transcriber` (`transcriber_id`),
  ADD KEY `Composition-Initial_Instrumentation` (`initial_instrumentation_code`),
  ADD KEY `Composition-Collection` (`collection_id`),
  ADD KEY `Composition-Musical_Form` (`musical_form_id`),
  ADD KEY `Composition-Status` (`status_id`),
  ADD KEY `Composition-Tonality` (`tonality_code`);

ALTER TABLE `concert`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `includes`
  ADD PRIMARY KEY (`instrumentation_code`,`instrument_code`),
  ADD KEY `Instrumentation-Instrument` (`instrument_code`);

ALTER TABLE `instrument`
  ADD PRIMARY KEY (`code`);

ALTER TABLE `instrumentation`
  ADD PRIMARY KEY (`code`);

ALTER TABLE `musical_form`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `performed_at`
  ADD PRIMARY KEY (`concert_id`,`composition_id`),
  ADD KEY `Concert-Composition` (`composition_id`);

ALTER TABLE `published_in`
  ADD PRIMARY KEY (`composition_id`,`score_id`),
  ADD KEY `Composition-Score` (`score_id`);

ALTER TABLE `recorded_on`
  ADD PRIMARY KEY (`album_id`,`composition_id`),
  ADD KEY `Album-Composition` (`composition_id`);

ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tonality`
  ADD PRIMARY KEY (`code`);


ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
ALTER TABLE `composer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
ALTER TABLE `composition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;
ALTER TABLE `concert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `musical_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `collection`
  ADD CONSTRAINT `Collection-Musical_Form` FOREIGN KEY (`musical_form_id`) REFERENCES `musical_form` (`id`);

ALTER TABLE `composition`
  ADD CONSTRAINT `Composition-Collection` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`id`),
  ADD CONSTRAINT `Composition-Composer` FOREIGN KEY (`composer_id`) REFERENCES `composer` (`id`),
  ADD CONSTRAINT `Composition-Initial_Instrumentation` FOREIGN KEY (`initial_instrumentation_code`) REFERENCES `instrumentation` (`code`),
  ADD CONSTRAINT `Composition-Instrumentation` FOREIGN KEY (`instrumentation_code`) REFERENCES `instrumentation` (`code`),
  ADD CONSTRAINT `Composition-Musical_Form` FOREIGN KEY (`musical_form_id`) REFERENCES `musical_form` (`id`),
  ADD CONSTRAINT `Composition-Status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `Composition-Tonality` FOREIGN KEY (`tonality_code`) REFERENCES `tonality` (`code`),
  ADD CONSTRAINT `Composition-Transcriber` FOREIGN KEY (`transcriber_id`) REFERENCES `composer` (`id`);

ALTER TABLE `includes`
  ADD CONSTRAINT `Instrument-Instrumentation` FOREIGN KEY (`instrumentation_code`) REFERENCES `instrumentation` (`code`),
  ADD CONSTRAINT `Instrumentation-Instrument` FOREIGN KEY (`instrument_code`) REFERENCES `instrument` (`code`);

ALTER TABLE `performed_at`
  ADD CONSTRAINT `Composition-Concert` FOREIGN KEY (`concert_id`) REFERENCES `concert` (`id`),
  ADD CONSTRAINT `Concert-Composition` FOREIGN KEY (`composition_id`) REFERENCES `composition` (`id`);

ALTER TABLE `published_in`
  ADD CONSTRAINT `Composition-Score` FOREIGN KEY (`score_id`) REFERENCES `score` (`id`),
  ADD CONSTRAINT `Score-Composition` FOREIGN KEY (`composition_id`) REFERENCES `composition` (`id`);

ALTER TABLE `recorded_on`
  ADD CONSTRAINT `Album-Composition` FOREIGN KEY (`composition_id`) REFERENCES `composition` (`id`),
  ADD CONSTRAINT `Composition-Album` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

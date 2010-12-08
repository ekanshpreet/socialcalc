-- 
-- SocialCalc Database Creation Script
--

--
-- Table structure for table sc_events
--

CREATE TABLE sc_events (
  event_id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(63) NOT NULL,
  target_class varchar(11) NOT NULL,
  target_section varchar(2) NOT NULL,
  date date NOT NULL,
  time time NOT NULL,
  duration int(11) NOT NULL,
  description varchar(255) DEFAULT NULL,
  created_by int(11) NOT NULL,
  PRIMARY KEY (event_id),
  KEY event_id (event_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
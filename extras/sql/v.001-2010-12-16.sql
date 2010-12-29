-- 
-- SocialCalc Database Creation Script
--

--
-- Table structure for table sc_chat
--

CREATE TABLE sc_chat (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  from_user VARCHAR(255) NOT NULL DEFAULT '',
  to_user VARCHAR(255) NOT NULL DEFAULT '',
  message TEXT NOT NULL,
  sent DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  recd INTEGER UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  INDEX to_user (to_user),
  INDEX from_user (from_user)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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



--
-- Table structure for table sc_users
--

CREATE TABLE sc_users (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_name varchar(255) NOT NULL,
  full_name varchar(255) NOT NULL,
  email varchar(63) NOT NULL,
  password varchar(255) NOT NULL,
  avatar varchar(255) NOT NULL,
  joined timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  last_seen timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  type int(1) NOT NULL,
  is_admin int(1) NOT NULL DEFAULT 0,
  is_available_to_chat int(1) NOT NULL DEFAULT 1,
  password_token varchar(63) DEFAULT NULL,
  PRIMARY KEY (user_name),
  KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
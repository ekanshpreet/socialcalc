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
-- Table structure for table sc_notifications
--

CREATE TABLE sc_notifications (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  title varchar(255) NOT NULL, 
  message TEXT NOT NULL, 
  author varchar(255) NOT NULL, 
  issue_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table sc_students
--

CREATE TABLE sc_students (
  student_id int(11) NOT NULL,
  roll_number varchar(63) NOT NULL,
  class varchar(11) NOT NULL,
  section varchar(2) NOT NULL,
  subject varchar(63) DEFAULT NULL,
  PRIMARY KEY (roll_number,class,section,subject),
  FOREIGN KEY (student_id) REFERENCES sc_users(id),
  KEY student_id (student_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table sc_student_sheets
--

CREATE TABLE sc_student_sheets (
  sheet_id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  in_response_to int(11) DEFAULT NULL,
  student_id int(11) NOT NULL,
  link varchar(255) NOT NULL,
  subject varchar(63) DEFAULT NULL,
  type varchar(63) DEFAULT NULL,
  created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  last_modified timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  published int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (sheet_id),
  FOREIGN KEY (student_id) REFERENCES sc_students(student_id),
  FOREIGN KEY (in_response_to) REFERENCES sc_teacher_sheets(sheet_id),
  KEY student_id (student_id),
  KEY subject (subject)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table sc_teachers
--

CREATE TABLE sc_teachers (
  teacher_id int(11) NOT NULL,
  employee_number varchar(63) NOT NULL,
  class varchar(11) NOT NULL,
  section varchar(2) NOT NULL,
  subject varchar(63) DEFAULT NULL,
  PRIMARY KEY (employee_number,class,section,subject),
  FOREIGN KEY (teacher_id) REFERENCES sc_users(id),
  KEY teacher_id (teacher_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table sc_teacher_sheets
--

CREATE TABLE sc_teacher_sheets (
  sheet_id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  teacher_id int(11) NOT NULL,
  link varchar(255) DEFAULT NULL,
  class varchar(11) DEFAULT NULL,
  section varchar(2) DEFAULT NULL,
  subject varchar(63) DEFAULT NULL,
  type varchar(63) DEFAULT NULL,
  date_of_submission timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  last_modified timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  published int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (sheet_id),
  FOREIGN KEY (teacher_id) REFERENCES sc_teachers(teacher_id),
  KEY teacher_id (teacher_id),
  KEY class_and_section (class, section),
  KEY class_section_subject (class, section, subject)
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
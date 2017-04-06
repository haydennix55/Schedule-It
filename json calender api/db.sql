

create table if not exists `store` (
  `id` int(1) not null auto_increment,
  `name` varchar(40) not null,
  `qty` int(1) not null,
  `price` float not null,
  primary key (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;

insert into `store` (`id`, `name`, `qty`, `price`) values
  (1, 'apple', 10, 1),
  (2, 'pear', 5, 2),
  (3, 'banana', 10, 1.5),
  (6, 'lemon', 100, 0.1),
  (5, 'orange', 50, 0.2);


create table if not exists `course` (
  `id` int(1) not null auto_increment,
  `name` varchar(4) not null,
  `department_id` int(1) not null,
  primary key (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=8;

insert into `course` (`id`, `name`, `department_id`) values
  (1, '111', 1),
  (2, '112', 1),
  (3, '250', 1),
  (4, '231', 1),
  (5, '111', 2),
  (6, '250', 3),
  (7, '111', 4);


create table if not exists `department` (
  `id` int(1) not null auto_increment,
  `name` varchar(3) not null,
  primary key (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

insert into `department` (`id`, `name`) values
  (1, 'CSC'), (2, 'MTH'), (3, 'EGR'), (4, 'CHM');
Enrollment

create table if not exists `enrollment` (
  `id` int(1) not null auto_increment,
  `count` int(1) not null,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

insert into `enrollment` (`id`, `count`) values
  (1, 40),
  (2, 15),
  (3, 10),
  (4, 12),
  (5, 60),
  (6, 14),
  (7, 200);

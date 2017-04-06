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

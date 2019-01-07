CREATE TABLE IF NOT EXISTS `tasks` (
    `taskid` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(64) NOT NULL DEFAULT '',
    `password` varchar(64) NOT NULL DEFAULT '',
    `description` varchar(1024) NOT NULL DEFAULT '',
    `createtime` datetime NOT NULL,
    PRIMARY KEY (`taskid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE DATABASE kigaDB;
USE kigaDB;
create table users (
    id int(11) NOT NULL,
    username varchar(50),
    password varchar(50),
    role varchar(1),
    groups varchar(10)
);

create table messages (
  id int(11) NOT NULL,
  details text NOT NULL,
  date_posted varchar(30),
  time_posted time,
  date_edited varchar(30),
  time_edited time,
  public varchar(5),
  groupPlaceing varchar(10)
);

insert into users (id, username, password, role, groups) values('0', 'Christine', 'wert', '+', '-');
insert into users (id, username, password, role, groups) values('1', 'Klaus', 'wert', '-', 'Blue');
insert into users (id, username, password, role, groups) values('2', 'Peter', 'wert', '-', 'Red');
insert into messages (id, details, date_posted, time_posted, public, groupPlaceing) values('0', 'Hello Public', 'June 09, 2019', '19:08:52', 'yes', '-');
insert into messages (id, details, date_posted, time_posted, public, groupPlaceing) values('1', 'Hello Blue', 'June 09, 2019', '19:08:52', 'no', 'Blue');
insert into messages (id, details, date_posted, time_posted, public, groupPlaceing) values('2', 'Hello Red', 'June 09, 2019', '19:08:52', 'no', 'Red');

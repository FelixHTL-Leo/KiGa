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
  public varchar(5)
);

insert into users (id, username, password, role, groups) values('0', 'ddd', 'ddd', '+', '-');
insert into messages (id, details, date_posted, time_posted, public) values('0', 'Hello', 'June 09, 2019', '19:08:52', 'yes');

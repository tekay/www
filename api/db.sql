create table grp(
    id int primary key,
    name varchar(100) not null
)engine=innodb default charset utf8;
create table user(
    id int primary key,
    gid int not null,
    login varchar(255) not null,
    password varchar(255) not null,
    name varchar(255) not null,
    email varchar(255),
    active tinyint(1) not null default 0,
    foreign key (gid) references grp(id) on update cascade on delete restrict
)engine=innodb default charset utf8;
create table category(
    id int primary key,
    pid int not null,
    name varchar(255) not null,
    foreign key (pid) references category(id) on update cascade on delete restrict
)engine=innodb default charset utf8;
create table content(
    id int primary key,
    cid int not null,
    uid int not null,
	gid int not null,
	ctype varchar(255) not null default 'content',   
    title varchar(255) not null,
	subtitle varchar(255),
    content text not null,
	created varchar(12) not null,
    active tinyint(1) not null default 0,
    foreign key (cid) references category(id) on update cascade on delete restrict,
    foreign key (uid) references user(id) on update cascade on delete restrict,
    foreign key (gid) references grp(id) on update cascade on delete restrict
)engine=innodb default charset utf8;
create table nav(
    id int primary key,
    pid int not null,
    orderno int not null,
    name varchar(255) not null,
    path varchar(255) not null,
    foreign key (pid) references nav(id) on update cascade on delete restrict
)engine=innodb default charset utf8;

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
create table contenttype(
	id int primary key,
	name varchar(255) not null
)engine=innodb default charset utf8;
create table content(
	id int primary key,
	uid int not null,
	gid int not null,
	ctid int not null,
	title varchar(255) not null,
	subtitle varchar(255),
	content text not null,
	created varchar(12) not null,
	active tinyint(1) not null default 0,
	foreign key (uid) references user(id) on update cascade on delete restrict,
	foreign key (gid) references grp(id) on update cascade on delete restrict,
	foreign key (ctid) references contenttype(id) on update cascade on delete restrict
)engine=innodb default charset utf8;
create table tag(
	id int primary key auto_increment,
	name varchar(255) not null
)engine=innodb default charset utf8;
create table tag_assign(
	cid int not null,
	tid int not null,
	foreign key (cid) references content(id) on update cascade on delete restrict,
	foreign key (tid) references tag(id) on update cascade on delete restrict
)engine=innodb default charset utf8;
create table nav(
	id int primary key,
	pid int not null,
	orderno int not null,
	name varchar(255) not null,
	path varchar(255) not null,
	foreign key (pid) references nav(id) on update cascade on delete restrict
)engine=innodb default charset utf8;

insert into grp values (1,'guest'),(2,'user'),(3,'mod'),(4,'head'),(5,'admin');
insert into contenttype values (1,'article'),(2,'link');

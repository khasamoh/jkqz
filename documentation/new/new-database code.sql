create table tbl_privellege(
	privellege_id int auto_increment primary key,
	privellege_name varchar(30) UNIQUE,
	privellege_option varchar(30) UNIQUE,
	privellege_added_date varchar(30) UNIQUE,
	privellege_added_by int,
	privellege_modified_date varchar(30) UNIQUE,
	privellege_modified_by int,
	privellege_deleted_date varchar(30) UNIQUE,
	privellege_deleted_by int,
	privellege_status varchar(10)
);

create table tbl_compertition(
	compertition_id int auto_increment primary key,
	compertition_name varchar (50),
	compertition_date varchar (30),
	compertition_address varchar (50),
	compertition_added_by int,
	compertition_added_date varchar (30) UNIQUE,
	compertition_modify_by int,
	compertition_modify_date varchar (30) UNIQUE,
	compertition_status varchar (30)
);

create table tbl_user(
	user_id int auto_increment primary key,
	user_fname varchar (30),
	user_mname varchar (30),
	user_lname varchar (30),
	user_gender varchar (30),
	user_phone varchar (30),
	user_address varchar (30),
	user_nationality varchar (30),
	user_email varchar (40),
	username varchar (40),
	user_password varchar (50),
	user_added_by varchar (30),
	user_added_date varchar (20) UNIQUE,
	user_modified_by varchar (30),
	user_modified_date varchar (20) UNIQUE,
	user_deleted_by varchar (30),
	user_deleted_date varchar (20) UNIQUE,
	user_status varchar (30),
	user_temp_privellege varchar (30),
	privellege_id int,
	compertition_id int,
	constraint fk1 foreign key (privellege_id) references tbl_privellege(privellege_id),
	constraint fk2 foreign key (compertition_id) references tbl_compertition(compertition_id)
);

create table tbl_log(
	log_id int auto_increment primary key,
	login varchar (30),
	logout varchar (30),
	user_id int,
	constraint fk3 foreign key (user_id) references tbl_user (user_id)
);

create table tbl_setting(
	setting_id int auto_increment primary key,
	setting_name varchar (30),
	setting_value1 varchar (30),
	setting_value2 varchar (30),
	setting_value3 varchar (30),
	setting_value4 varchar (30),
	setting_value5 varchar (30),
	setting_value6 varchar (30),
	setting_value7 varchar (30),
	setting_added_by int,
	setting_added_date varchar (30) UNIQUE,
	setting_modify_by int,
	setting_modify_date varchar (30) UNIQUE,
	setting_deleted_by int,
	setting_deleted_date varchar (30) UNIQUE,
	setting_status varchar (30),
	compertition_id int,
	constraint fk4 foreign key (compertition_id) references tbl_compertition(compertition_id)
);

create table tbl_participant(
	participant_id int auto_increment primary key,
	participant_fname varchar (30),
	participant_mname varchar (30),
	participant_lname varchar (30),
	participant_gender varchar (30),
	participant_dob varchar (30),
	participant_image varchar (255),
	participant_address varchar (30),
	participant_juzuu int,
	participant_type varchar(10),
	participant_school varchar (30),
	participant_education_level varchar (30),
	participant_madrasa varchar (30),
	participant_country varchar (30),
	participant_added_by varchar (30),
	participant_added_date varchar (20) UNIQUE,
	participant_modified_by varchar (30),
	participant_modified_date varchar (20) UNIQUE,
	participant_deleted_by varchar (30),
	participant_deleted_date varchar (20) UNIQUE,
	participant_status varchar (30),
	compertition_id int,
	constraint fk5 foreign key (compertition_id) references tbl_compertition(compertition_id)
);

create table tbl_envelope(
	envelope_id int auto_increment primary key,
    envelope_juzuu int,
    envelope_number int,
    envelope_type varchar(20),
    envelope_added_by varchar (30),
    envelope_added_date varchar (20) UNIQUE,
	envelope_modified_by varchar (30),
	envelope_modified_date varchar (20) UNIQUE,
	envelope_deleted_by varchar (30),
	envelope_deleted_date varchar (20) UNIQUE,
	compertition_id int,
	envelope_status varchar(30)
);

create table tbl_question(
	question_id int auto_increment primary key,
	question_path varchar(300),
	question_added_by varchar (30),
    question_added_date varchar (20) UNIQUE,
	question_modified_by varchar (30),
	question_modified_date varchar (20) UNIQUE,
	question_deleted_by varchar (30),
	question_deleted_date varchar (20) UNIQUE,
	question_status varchar(30),
	envelope_id int,
    constraint fk6 foreign key (envelope_id) references tbl_envelope (envelope_id)
);

create table tbl_participant_envelope(
	participant_envelope_id int auto_increment primary key,
	participant_id int,
	envelope_id int,
	constraint fk7 foreign key (participant_id) references tbl_participant(participant_id),
	constraint fk8 foreign key (envelope_id) references tbl_envelope(envelope_id)
);

create table tbl_setting_question(
	setting_question_id int auto_increment primary key,
	setting_id int,
	question_id int,
	value int,
	user_id int,
	constraint fk9 foreign key (setting_id) references tbl_setting(setting_id),
	constraint fk10 foreign key (question_id) references tbl_question(question_id)
);
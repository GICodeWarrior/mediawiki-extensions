-- Schema for Wikimania extension
-- TODO/FIXME: Get rid of the icky icky enums and sets.

-- Primary registration table
CREATE TABLE /*_*/registration (
	-- Unique row id, for sorting and such
	reg_id unsigned int not null primary key auto_increment,

	-- A unique registration identifier, probably something md5()'d
	reg_code varchar(255) not null,

	-- Timestamp registration was submitted
	reg_timestamp varbinary(16),

	-- Current status of the registration, see WikimaniaRegistration::getPossibleStatuses()
	reg_status varchar(12) not null,

	reg_fname varchar(255) not null,
	reg_lname varchar(255) not null,
	reg_sex varchar(1) not null,
	reg_country varchar(4) not null,
	reg_wiki_id varchar(255) not null,
	reg_wiki_language varchar(12) not null,
	reg_wiki_project varchar(12) not null,
	reg_email varchar(255) not null,
	reg_showname set('1','2','3') not null,
	reg_custom_showname varchar(255),
	reg_shirt_size enum('XXS','XS','S','M','L','XL','XXL','XXXL') not null,
	reg_shirt_color enum('W','B') not null,
	reg_food_preference enum('','1','2','3') not null,
	reg_food_other varchar(255),
	reg_visa_assistance tinyint(1) not null,
	reg_nationality varchar(4),
	reg_passport varchar(30),
	reg_passport_valid varbinary(16),
	reg_passport_issued varchar(255),
	reg_birthday varbinary(16),
	reg_countryofbirth varchar(4),
	reg_homeaddress blob,
	reg_visa_description blob,
	reg_discount_code varchar(16),
	reg_attendance_cost decimal(10,2) not null,
	reg_accommodation_cost decimal(10,2) not null,
	reg_vat_cost decimal(10,2) not null,
	reg_cost_total decimal(10,2) not null,
	reg_currency varchar(4) not null,
	reg_paypal tinyint(1) not null,
	reg_cost_paid decimal(10,2) not null
) /**$wgDBTableOptions*/;
CREATE UNIQUE INDEX /*i*/reg_code ON /*_*/registrations (reg_code);

-- Table to handle date(s) people register for
CREATE TABLE /*_*/registration_dates (
	rd_id unsigned int not null primary key auto_increment,
	rd_reg_id unsigned int not null,
	rd_date varbinary(16) not null
) /**$wgDBTableOptions*/;

-- Table to handle hotel reservations
CREATE TABLE /*_*/registration_hotels (
	rh_id unsigned int not null primary key auto_increment,
	rh_reg_id unsigned int not null,
	rh_hotel varchar(255) not null,
	rh_date varbinary(16) not null,
	rh_occupancy int(1) not null,
	rh_partner varchar(255),
	rh_notes blob
) /**$wgDBTableOptions*/;

-- Table to handle languages a registrant can communicate in
CREATE TABLE /*_*/registration_languages (
	rl_reg_id unsigned int not null,
	rl_lang varchar(4),
	rl_level enum('1','2','3','4'),

	PRIMARY KEY(rl_reg_id, rl_lang)
)/**$wgDBTableOptions*/;

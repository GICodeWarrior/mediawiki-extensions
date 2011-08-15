
CREATE TABLE halfak.hugglings (
	rev_id           INT UNSIGNED,
	rev_timestamp    VARBINARY(14),
	huggler_id       INT UNSIGNED,
	huggler_name     VARBINARY(255),
	recipient_name   VARBINARY(255),
	personal         ENUM("True", "False"),
	teaching         ENUM("True", "False"),
	image            ENUM("True", "False")
);

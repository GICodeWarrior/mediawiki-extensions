--
-- Schema for OptIn
--

CREATE TABLE IF NOT EXISTS /*_*/optin_survey (
	-- User ID
	ois_user int NOT NULL,
	
	-- Timestamp
	ois_timestamp binary(14) NOT NULL,
	
	-- Question ID (key in $wgOptInSurvey)
	ois_question int unsigned NOT NULL,
	
	-- Answer ID (key in $wgOptInSurvey[ois_question]['answers'])
	ois_answer int unsigned NULL,
	
	-- Optional text associated with the answer
	ois_answer_data text NULL
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/ois_user_timestamp_question ON /*_*/optin_survey (ois_user, ois_timestamp, ois_question); 

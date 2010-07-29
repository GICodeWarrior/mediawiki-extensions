package commonist.data

/** Data edited in a CommonUI */
case class CommonData(
		wiki:WikiData,
		user:String,
		password:String,
		description:String,
		date:String,
		source:String,
		author:String,
		license:LicenseData,
		categories:String)
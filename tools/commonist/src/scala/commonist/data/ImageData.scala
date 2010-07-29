package commonist.data

import java.io.File

/** Data edited in an ImageUI */
case class ImageData(
		file:File,
		upload:Boolean,
		name:String,
		description:String,
		date:String,
		permission:String,
		coordinates:String,
		categories:String)

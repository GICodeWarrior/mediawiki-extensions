package commonist.thumb

import java.awt.Dimension
import java.awt.Graphics
import java.awt.Image
import java.awt.geom.AffineTransform
import java.awt.image.AffineTransformOp
import java.awt.image.BufferedImage
import java.io.File
import java.io.IOException

import javax.imageio.ImageIO
import javax.imageio.ImageReadParam
import javax.imageio.ImageReader
import javax.imageio.stream.ImageInputStream
import javax.swing.Icon
import javax.swing.ImageIcon

import commonist.Constants
import commonist.util.Settings

import scutil.Log._

/** manages thumbnail images */
final class Thumbnails(cache:FileCache) {
	var	maxSize	= Constants.THUMBNAIL_DEFAULT_SIZE

	def loadSettings(settings:Settings) {
		maxSize	= settings.getInt("thumbnails.maxSize", maxSize)
	}
	
	def saveSettings(settings:Settings) {
		settings.setInt("thumbnails.maxSize", maxSize)
	}
	
	def getMaxSize:Int	= maxSize
	
	/** creates a thumbnail Icon from an image File or returns null */ 
	def thumbnail(file:File):Option[Icon] =
			try {
				cachedThumbnail(file) map { new ImageIcon(_) }
			}
			catch { case e:Exception =>
				INFO("cannot create thumbnail from " + file, e)
				None
			}
	
	/** make a thumbnail or return a cached version */
	private def cachedThumbnail(file:File):Option[Image] =
			// TODO give the cache a loader instead of talking to it here
			
			// try to get cached thumb
			cache.get(file).map { ImageIO.read(_) }.orElse {
				// read original and make thumb
				val thumb	= readSubsampled(file) map makeThumbnail
				
				thumb foreach { thumb =>
					// cache thumb
					val thumbFile2	= cache.put(file)
					val	success		= ImageIO.write(thumb, "jpg", thumbFile2)
					if (!success) {
						WARN("could not create thumbnail: " + thumbFile2)
						cache.remove(file)
					}
				}
				
				thumb
			}
	
	/** makes a thumbnail from an image */
	private def makeThumbnail(image:BufferedImage):BufferedImage = {
		val scale	= maxSize.toDouble / (image.getWidth max image.getHeight)
		if (scale >= 1.0)	return image
		
		// TODO check more image types
		
		// seen: TYPE_BYTE_GRAY and TYPE_BYTE_INDEXED,
		// TYPE_CUSTOM			needs conversion or throws an ImagingOpException at transformation time
		// TYPE_3BYTE_BGR		works without conversion
		// TYPE_BYTE_GRAY		needs conversion or creates distorted grey version
		// TYPE_INT_RGB			needs conversion or creates distorted grey version
		// TYPE_BYTE_INDEXED	works, but inverts color if converted to TYPE_3BYTE_BGR
		
		// normalize image type
		val imageType	= image.getType
		val image2 = 
				if (imageType != BufferedImage.TYPE_3BYTE_BGR 
				&& imageType != BufferedImage.TYPE_BYTE_INDEXED) {
		//		if (imageType == BufferedImage.TYPE_CUSTOM  
		//		|| imageType == BufferedImage.TYPE_BYTE_GRAY
		//		|| imageType == BufferedImage.TYPE_INT_RGB) {
					val normalized	= new BufferedImage(image.getWidth, image.getHeight, BufferedImage.TYPE_3BYTE_BGR)
					val g			= normalized.getGraphics
					g.drawImage(image, 0, 0, null)
					g.dispose()
					normalized
				}
				else {
					image
				}
		
		val size	= new Dimension((image2.getWidth * scale).toInt, (image2.getHeight * scale).toInt)
		val	thumb	= new BufferedImage(size.width, size.height, image2.getType)
		val op		= new AffineTransformOp(
			new AffineTransform(scale, 0, 0, scale, 0, 0),	// AffineTransform.getScaleInstance(sx, sy)
			AffineTransformOp.TYPE_BILINEAR					// TYPE_NEAREST_NEIGHBOR, TYPE_BILINEAR, TYPE_BICUBIC
		)
		
		op.filter(image2, thumb)
		thumb
	}
	
	/** scales down when the image is too big */
	private def readSubsampled(input:File):Option[BufferedImage] = {
		// ImageIO.read(file)
		
		val stream = ImageIO.createImageInputStream(input)
		if (stream == null)	throw new IOException("cannot create ImageInputStream for file: " + input)
		
		val it	= ImageIO.getImageReaders(stream)
		if (!it.hasNext) {
			WARN("could not read original: " + input)
			return None	// throw new IOException("cannot create ImageReader for file: " + input)
		}
		
		val reader = it.next()
		reader.setInput(stream, true, true)
		
		val param	= reader.getDefaultReadParam
		
		val imageIndex	= 0

		val sizeX		= reader.getWidth(imageIndex)
		val sizeY		= reader.getHeight(imageIndex)
		val size		= sizeX min sizeY
		val scale		= size / maxSize
		val sampling	= smallerPowerOf2(scale * 100 / Constants.THUMBNAIL_SCALE_HEADROOM)
//		System.err.println("#### scale=" + scale + "\t=> sampling=" + sampling)
		
		// TODO could scale at load time!
		if (sampling > 1)	param.setSourceSubsampling(sampling, sampling, 0, 0)
		val image	= reader.read(imageIndex, param)
		
		// TODO try/catch
		reader.dispose()
		stream.close()
		
		Some(image)
	}

	/** returns the biggers power of 2 smaller than or equal to x */
	private def smallerPowerOf2(x:Int):Int = {
		var exp	= 1
		var xxx	= x
		while (xxx > 0) {
			exp	= exp << 1
			xxx	= xxx >> 1
		}
		exp >> 1
	}
}

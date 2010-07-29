package commonist.ui

import java.awt.Color
import java.awt.Dimension
import java.awt.GridBagLayout
import java.awt.GridBagConstraints
import java.awt.Image
import java.awt.event.ActionEvent
import java.awt.event.ActionListener
import java.awt.event.MouseAdapter
import java.awt.event.MouseEvent
import java.io.File

import javax.swing.BorderFactory
import javax.swing.Icon
import javax.swing.JCheckBox
import javax.swing.JLabel
import javax.swing.JPanel
import javax.swing.JScrollPane
import javax.swing.JTextArea
import javax.swing.JTextField
import javax.swing.SwingConstants
import javax.swing.ScrollPaneConstants

import scutil.ext.GridBagConstraintsExt._
import scutil.ext.OptionExt._
import scutil.ext.DateExt._

import commonist.Constants
import commonist.data.ImageData
import commonist.api.Filename
import commonist.util.UIUtil2
import commonist.util.Messages
import commonist.util.TextUtil2
import commonist.util.EXIF

trait ImageUICallback {
	def updateSelectStatus()
}
	
/** a data editor with a thumbnail preview for an image File */
final class ImageUI(file:File, icon:Option[Icon], thumbnailMaxSize:Int, programHeading:String, programIcon:Image, callback:ImageUICallback) extends JPanel {
	
	private val thumbDimension = new Dimension(thumbnailMaxSize, thumbnailMaxSize)
	
	private var uploadSuccessful:Option[Boolean]	= None
	
	//------------------------------------------------------------------------------
	
	private val stateView	= new JLabel(null, null, SwingConstants.CENTER)
	stateView.setHorizontalTextPosition(SwingConstants.CENTER)
	updateStateView()
	
	private val imageView	= new JLabel(null, null, SwingConstants.CENTER)
	imageView.setBackground(Color.decode("#eeeeee"))
//		imageView.setBorder(
//			BorderFactory.createBevelBorder(BevelBorder.RAISED)
//		)
	imageView.setOpaque(true)
	/*### fehlt
	imageView.setToolTipText(
		file.Name + " (" + TextUtil.human(file.length()) + " bytes)"
	)
	*/
	imageView.setHorizontalTextPosition(SwingConstants.CENTER)
	imageView.setVerticalTextPosition(SwingConstants.CENTER)
	imageView.setPreferredSize(thumbDimension)
	imageView.setMinimumSize(thumbDimension)
	imageView.setMaximumSize(thumbDimension)

	private val uploadLabel			= new JLabel(Messages.text("image.upload"))
	private val nameLabel			= new JLabel(Messages.text("image.name"))
	private val descriptionLabel	= new JLabel(Messages.text("image.description"))
	private val dateLabel			= new JLabel(Messages.text("image.date"))
	private val permissionLabel		= new JLabel(Messages.text("image.permission"))
	private val coordinatesLabel	= new JLabel(Messages.text("image.coordinates"))
	private val categoriesLabel		= new JLabel(Messages.text("image.categories"))
	
	private val uploadEditor		= new JCheckBox(null.asInstanceOf[Icon], false)
	private val nameEditor			= new JTextField(Constants.INPUT_FIELD_WIDTH)
	private val descriptionEditor	= new JTextArea(Constants.INPUT_FIELD_HEIGHT, Constants.INPUT_FIELD_WIDTH)
	private val dateEditor			= new JTextField(Constants.INPUT_FIELD_WIDTH)
	private val permissionEditor	= new JTextField(Constants.INPUT_FIELD_WIDTH)
	private val coordinatesEditor	= new JTextField(Constants.INPUT_FIELD_WIDTH)
	private val categoriesEditor	= new JTextField(Constants.INPUT_FIELD_WIDTH)
	
	UIUtil2.tabMovesFocus(descriptionEditor)
	descriptionEditor.setLineWrap(true)
	descriptionEditor.setWrapStyleWord(true)
	coordinatesEditor.setToolTipText(Messages.text("image.coordinates.tooltip"))
	categoriesEditor.setToolTipText(Messages.text("image.categories.tooltip"))
	
	UIUtil2.scrollVisibleOnFocus(uploadEditor, this)
	UIUtil2.scrollVisibleOnFocus(nameEditor, this)
	UIUtil2.scrollVisibleOnFocus(descriptionEditor, this)
	UIUtil2.scrollVisibleOnFocus(dateEditor, this)
	UIUtil2.scrollVisibleOnFocus(permissionEditor, this)
	UIUtil2.scrollVisibleOnFocus(coordinatesEditor, this)
	UIUtil2.scrollVisibleOnFocus(categoriesEditor, this)
	
	private val descriptionScroll	= new JScrollPane(
	descriptionEditor, 
			ScrollPaneConstants.VERTICAL_SCROLLBAR_AS_NEEDED, 
			ScrollPaneConstants.HORIZONTAL_SCROLLBAR_AS_NEEDED)

//		setBorder(
//			BorderFactory.createCompoundBorder(
//				//BorderFactory.createCompoundBorder(
//					BorderFactory.createRaisedBevelBorder(),
//				//	BorderFactory.createLoweredBevelBorder()
//				//),
//				BorderFactory.createEmptyBorder(2,0,2,0)
//			)
//		)
	setBorder(BorderFactory.createEmptyBorder(5,5,5,5))

	//------------------------------------------------------------------------------
	//## layout
	
	setLayout(new GridBagLayout())
	
	// labels and editors
	
	add(uploadLabel,		GBC.pos(0,0).size(1,1).weight(0,0).anchorEast().fillNone().insetsAll(0,4,0,4))
	add(uploadEditor,		GBC.pos(1,0).size(1,1).weight(1,0).anchorWest().fillHorizontal().insetsAll(0,0,0,0))

	add(nameLabel,			GBC.pos(0,1).size(1,1).weight(0,0).anchorEast().fillNone().insetsAll(0,4,0,4))
	add(nameEditor,			GBC.pos(1,1).size(1,1).weight(1,0).anchorWest().fillHorizontal().insetsAll(0,0,0,0))
	
	add(descriptionLabel, 	GBC.pos(0,2).size(1,1).weight(0,0).anchorNorthEast().fillNone().insetsAll(0,4,0,4))
	add(descriptionScroll,	GBC.pos(1,2).size(1,1).weight(1,1).anchorWest().fillBoth().insetsAll(0,0,0,0))
	
	add(dateLabel, 			GBC.pos(0,3).size(1,1).weight(0,0).anchorEast().fillNone().insetsAll(0,4,0,4))
	add(dateEditor,			GBC.pos(1,3).size(1,1).weight(1,0).anchorWest().fillHorizontal().insetsAll(0,0,0,0))
	
	add(permissionLabel, 	GBC.pos(0,4).size(1,1).weight(0,0).anchorEast().fillNone().insetsAll(0,4,0,4))
	add(permissionEditor,	GBC.pos(1,4).size(1,1).weight(1,0).anchorWest().fillHorizontal().insetsAll(0,0,0,0))
	
	add(coordinatesLabel, 	GBC.pos(0,5).size(1,1).weight(0,0).anchorEast().fillNone().insetsAll(0,4,0,4))
	add(coordinatesEditor,	GBC.pos(1,5).size(1,1).weight(1,0).anchorWest().fillHorizontal().insetsAll(0,0,0,0))
	
	add(categoriesLabel,	GBC.pos(0,6).size(1,1).weight(0,0).anchorEast().fillNone().insetsAll(0,4,0,4))
	add(categoriesEditor,	GBC.pos(1,6).size(1,1).weight(1,0).anchorWest().fillHorizontal().insetsAll(0,0,0,0))
	
	// state and image
	
	add(stateView,			GBC.pos(2,0).size(1,1).weight(0,0).anchorCenter().fillNone().insetsAll(0,4,0,4))
	add(imageView,			GBC.pos(2,1).size(1,6).weight(0,0).anchorSouthWest().fillNone().insetsAll(0,4,0,4))
	
	//------------------------------------------------------------------------------
	//## wiring
	
	// update select status on upload checkbox changes
	uploadEditor.addActionListener(new ActionListener {
		def actionPerformed(ev:ActionEvent) {
			callback.updateSelectStatus()
		}
	})
	
	// open full size view on click
	imageView.addMouseListener(new MouseAdapter {
		override def mouseClicked(ev:MouseEvent) {
			// LMB only
			if (ev.getButton != 1)	return
			//if (imageView.Icon != null)
			displayFullImage()
		}
	})
	
	//------------------------------------------------------------------------------
	//## init
	
	imageView.setToolTipText(Messages.message("image.tooltip", file.getName, TextUtil2.human(file.length)))
	imageView.setIcon(icon getOrElse null)
	imageView.setText(icon.fold(_ => "")(Messages.text("image.nothumb")))
	
	// TODO move unparsers and parsers together
	
	val	exif		= EXIF extract file
	val exifDate	= exif.date map { _ format "yyyy-MM-dd" } getOrElse ""
	val exifGPS		= exif.gps map { it => it.latitude.toString + "," + it.longitude.toString } getOrElse ""
	val fixedName	= Filename fix file.getName
	
	uploadEditor.setSelected(false)
	nameEditor.setText(fixedName)
	descriptionEditor.setText("")
	dateEditor.setText(exifDate)
	permissionEditor.setText("")
	coordinatesEditor.setText(exifGPS)
	categoriesEditor.setText("")
	
	// TODO could be a trait
	override def getMaximumSize():Dimension = new Dimension(
			super.getMaximumSize.width,
			super.getPreferredSize.height)

	/** returns true when this file should be uploaded */
	def isUploadSelected():Boolean = uploadEditor.isSelected
	
	/** sets whether this file should be uploaded */
	def setUploadSelected(selected:Boolean) { uploadEditor.setSelected(selected) }
	
	def getUploadSuccessful:Option[Boolean] = uploadSuccessful
	
	def setUploadSuccessful(uploadSuccessful:Option[Boolean]) {
		this.uploadSuccessful = uploadSuccessful
		updateStateView()
	}
	
	private def updateStateView() {
		val	label	= uploadSuccessful match {
			case Some(true)		=> Messages.text("image.status.success")
			case Some(false)	=> Messages.text("image.status.failure")
			case None			=> Messages.text("image.status.none")
		}
		stateView setText label
	}
	
	/** gets all data edit in this UI */
	def getData:ImageData = new ImageData(
			file,
			uploadEditor.isSelected,
			nameEditor.getText,
			descriptionEditor.getText,
			dateEditor.getText,
			permissionEditor.getText,
			coordinatesEditor.getText,
			categoriesEditor.getText)       
			
	/*
	def setData(imageData:ImageData) {
		//this.file	= imageData.file
		uploadEditor		setSelected imageData.upload
		nameEditor			setText		imageData.name
		descriptionEditor	setText		imageData.description
		dateEditor			setText		imageData.date
		permissionEditor	setText		imageData.permission
		coordinatesEditor	setText		imageData.cordinates
		categoriesEditor	setText		imageData.categories
	}
	*/
	
	private def displayFullImage() {
		FullImageWindow.display(file, programHeading, programIcon)
	}
}

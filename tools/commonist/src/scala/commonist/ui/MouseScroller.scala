package commonist.ui

import java.awt.Container
import java.awt.Dimension
import java.awt.Point
import java.awt.event.MouseEvent

import javax.swing.JComponent
import javax.swing.JViewport
import javax.swing.event.MouseInputAdapter

import commonist.util.UIUtil2

/** 
 * moves a JComponent withing a JViewport with the mouse 
 * usage: add an instance as MouseListener and MouseMotionListener to the target componente
 */
class MouseScroller(picture:JComponent) extends MouseInputAdapter {
	private var x	= 0
	private var y	= 0
	
	//def mouseClicked(ev:MouseEvent) {}
	
	override def mousePressed(ev:MouseEvent) {
		x	= ev.getX
		y	= ev.getY
	}
	
	//def mouseReleased(ev:MouseEvent) {}
	//def mouseEntered(ev:MouseEvent) {}
	//def mouseExited(ev:MouseEvent) {}
	
	override def mouseDragged(ev:MouseEvent) {
		val parent	= this.picture.getParent
		if (!(parent.isInstanceOf[JViewport]))	return
		val viewPort	= parent.asInstanceOf[JViewport]
		
		val full	= this.picture.getSize()
		val extent	= viewPort.getExtentSize
		val pos		= viewPort.getViewPosition
		
		pos.translate(
				x - ev.getX, 
				y - ev.getY)
		
		val posLimits	= new Dimension(
				full.width  - extent.width,
				full.height - extent.height)
		val posLimited	= UIUtil2.limitToBounds(pos, posLimits)

		viewPort.setViewPosition(posLimited)
	}
	
	//def mouseMoved(ev:MouseEvent) {}
}
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.RenderingHints;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.SwingUtilities;

public class ImagePanel extends JPanel {
   /**
	 * 
	 */
	private static final long serialVersionUID = 1L;
private static final String IMG_FILE_PATH = "cartes/Blank.jpg";
   private BufferedImage img;

   public ImagePanel() {
	   
	   try {                
	          BufferedImage trueImage = ImageIO.read(new File(IMG_FILE_PATH));
	          BufferedImage resizedImg = new BufferedImage(100, 200, BufferedImage.TRANSLUCENT);
	          Graphics2D g2 = resizedImg.createGraphics();
	          g2.setRenderingHint(RenderingHints.KEY_INTERPOLATION, RenderingHints.VALUE_INTERPOLATION_BILINEAR);
	 	      g2.drawImage(trueImage, 0, 0, 100, 200, null);
	          g2.dispose();
	        		   
	         this.img = resizedImg;
	       } catch (IOException ex) {
	            // handle exception...
	       }
   }
   

   public void changerImage (String chemin) {
	   try {                
	          BufferedImage trueImage = ImageIO.read(new File(chemin));
	          BufferedImage resizedImg = new BufferedImage(100, 200, BufferedImage.TRANSLUCENT);
	          Graphics2D g2 = resizedImg.createGraphics();
	          g2.setRenderingHint(RenderingHints.KEY_INTERPOLATION, RenderingHints.VALUE_INTERPOLATION_BILINEAR);
	 	      g2.drawImage(trueImage, 0, 0, 100, 200, null);
	          g2.dispose();
	        		   
	        	      this.img = resizedImg;
	       } catch (IOException ex) {
	            // handle exception...
	       }
	   repaint();
   }
   
   public void enleverImage () {
	   try {                
	          BufferedImage trueImage = ImageIO.read(new File(IMG_FILE_PATH));
	          BufferedImage resizedImg = new BufferedImage(100, 200, BufferedImage.TRANSLUCENT);
	          Graphics2D g2 = resizedImg.createGraphics();
	          g2.setRenderingHint(RenderingHints.KEY_INTERPOLATION, RenderingHints.VALUE_INTERPOLATION_BILINEAR);
	 	      g2.drawImage(trueImage, 0, 0, 100, 200, null);
	          g2.dispose();
	        		   
	        	      this.img = resizedImg;
	       } catch (IOException ex) {
	            // handle exception...
	       }
	   
   }
   
   @Override
   protected void paintComponent(Graphics g) {
      super.paintComponent(g);
      if (img != null) {
         g.drawImage(img, 0, 0, this);
      }
   }

   @Override
   public Dimension getPreferredSize() {
      if (img != null) {
         return new Dimension(img.getWidth(), img.getHeight());
      }
      return super.getPreferredSize();
   }

}
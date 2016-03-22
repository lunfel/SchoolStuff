package view;

import java.io.File;

import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.sound.sampled.*;


/**
 * Classe pour jouer des sons
 * 
 * @author fc891239
 */
public class Son {

    Clip son;
    
    int volume = 50;

    public Son() {
        // Source : http://www.java2s.com/Code/Java/Development-Class/AnexampleofloadingandplayingasoundusingaClip.htm
        try {
            // specify the sound to play
            // (assuming the sound can be played by the audio system)
            File soundFile = new File("hit-pipe.wav");
            AudioInputStream sound = AudioSystem.getAudioInputStream(soundFile);
            // load the sound into memory (a Clip)
            DataLine.Info info = new DataLine.Info(Clip.class, sound.getFormat());
            son = (Clip) AudioSystem.getLine(info);                     
            son.open(sound);
            setVolume(volume);
        } catch (UnsupportedAudioFileException ex) {
            Logger.getLogger(Son.class.getName()).log(Level.SEVERE, null, ex);
        } catch (IOException ex) {
            Logger.getLogger(Son.class.getName()).log(Level.SEVERE, null, ex);
        } catch (LineUnavailableException ex) {
            Logger.getLogger(Son.class.getName()).log(Level.SEVERE, null, ex);
        }

        // due to bug in Java Sound, explicitly exit the VM when
        // the sound has stopped.
        son.addLineListener(new LineListener() {
            public void update(LineEvent event) {
                if (event.getType() == LineEvent.Type.STOP) {
                    //event.getLine().close();
                    son.setFramePosition(0);
                }
            }
        });
    }

    public void jouer(int volume) {
        if(this.volume != volume)
            setVolume(volume);
                        
        son.start();
    }

    private void setVolume(int volume) {
        this.volume = volume;
        float gain = (float)volume/100;
        float dB = (float) (Math.log(gain) / Math.log(10.0) * 20.0);
        FloatControl fc = (FloatControl)son.getControl(FloatControl.Type.MASTER_GAIN);
        fc.setValue(dB);
    }
}

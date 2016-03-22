package model;

import java.lang.Thread;

/**
 * Singleton qui fait fonctionner un minuteur
 * 
 * @author fc891239
 */
public class Minuteur {

    private static Minuteur minuteur;
    private MetronomeModel modele;
    private Tick tock;
    private boolean isRunning = false;
    private long milliStart;
    private long milliEllapsed;

    public static Minuteur getInstance() {
        if (Minuteur.minuteur == null) {
            Minuteur.minuteur = new Minuteur();
        }
        return Minuteur.minuteur;
    }

    private Minuteur() {
    }

    /*
     * Méthode qui démarre le minuteur
     */
    public void demarrer() {
        if (!isRunning) {
            tock = new Tick();
            tock.start();
            modele.incrementeCurrentMesure();
        }
    }

    /*
     * méthode qui arrête le minuteur
     */
    public void arreter() {
        tock.arreter();
    }

    /*
     * méthode qui donne à qui le minuteurdonne son information
     */
    public void setModel(MetronomeModel modele) {
        this.modele = modele;
    }

    /*
     * classe qui calcule calcule les tics du minuteur dans un thread
     */
    private class Tick extends Thread {

        Tick() {
            super();
            modele.incrementeCurrentMesure();
        }
        
        /*
         * méthode qui commence le thread et le calcul des tics 
         */
        @Override
        public void start() {
            isRunning = true;
            super.start();
        }
        
        /*
         * méthode qui arrête le calcul des tics
         */
        public void arreter() {
            isRunning = false;
        }
        
        /*
         * méthode qui calcule les tics tant que le minuteur est en marche
         */
        @Override
        public void run() {
            if (modele == null) {
                throw new NullPointerException("Le modèle doit être attaché au minuteur avant le démarrage du Thread");
            }

            while (isRunning) {
                milliEllapsed = System.currentTimeMillis() - milliStart;

                if (milliEllapsed >= (long) (60000 / modele.getTempo())) {
                    //System.out.println(milliEllapsed % (long)(60000/modele.getTempo()));
                    System.out.println("tick" + modele.getCurrentMesure());
                    milliStart = System.currentTimeMillis();
                    modele.incrementeCurrentMesure();
                }
                try {
                    Thread.sleep(5);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }

        }
    }
}

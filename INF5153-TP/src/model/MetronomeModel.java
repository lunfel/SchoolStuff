package model;

import java.util.ArrayList;
import view.iObserver;
import persistance.DataAccess;
import persistance.MetronomeData;

/**
 * Clase du modèle du métronome
 * 
 * @author fc891239
 */
public class MetronomeModel implements iSubject{
    boolean isTick = false;
    private int tempo = 120;
    private int mesure = 4;
    private int volume = 50;
    private int currentMesure = 0;
    private String langage = "Francais";
    private ArrayList<iObserver> observateurs = new ArrayList();
    
    public MetronomeModel() {
    }

    public int getMesure() {
        return mesure;
    }

    /*
     * Méthode qui change la mesure du modèle puis avertit ces observateurs
     * la mesure doit être entre 1 et 8
     */
    public void setMesure(int mesure) {
        if (mesure > 0 && mesure < 9){
            this.mesure = mesure;
            notifier();
        }
    }

    public int getTempo() {
        return tempo;
    }
    
    /*
     * Méthode qui change le tempo du modèle puis avertit ces observateurs
     */
    public void setTempo(int tempo) {
        this.tempo = tempo;
        notifier();
    }

    public int getVolume() {
        return volume;
    }

    /*
     * Méthode qui change le volume du modèle puis avertit ces observateurs
     */
    public void setVolume(int volume) {
        this.volume = volume;
        notifier();
    }
    
    public String getLangage(){
        return langage;
    }
    
    /*
     * Méthode qui change le langage du modèle puis avertit ces observateurs
     */
    public void setLangage(String langage){
        this.langage = langage;
        notifier();
    }
    
    /*
     * définition de la notification des observateurs de MetronomeModel
     */
    @Override
    public void notifier() {
        //System.out.println("On notifie les observateurs :" + currentMesure);
        for(iObserver elem:observateurs){
            elem.mettreAJour();
        }
    }

    /*
     * définition de l'Attachement de l'observateur
     */
    @Override
    public boolean attacher(iObserver observateur) {
        System.out.println("Attache de l'observateur à l'observé");
        return this.observateurs.add(observateur);
    }

    /*
     * définition du détachement de l'observateur
     */
    @Override
    public boolean detacher(iObserver observateur) {
        System.out.println("On détache l'observateur donné");
        return this.observateurs.remove(observateur);
    }
    
    /*
     * méthode qui démarre le minuteur
     */
    public void startMinuteur(){
        Minuteur.getInstance().demarrer();
    }
    
    /*
     * méthode qui arrête le minuteur
     */
    public void stopMinuteur(){
        Minuteur.getInstance().arreter();
    }
    
    /*
     * méthode qui incrémente pour chaque temps puis retourne à zéro lorsqu'elle
     * atteint la mesure
     */
    void incrementeCurrentMesure(){
        currentMesure++;
        isTick = true;        
        currentMesure %= mesure;
        
        notifier();
    }
    
    public int getCurrentMesure() {
        return currentMesure;
    }
    
    /*
     * méthode qui détermine si le temps est de le premier temps de la mesure
     */
    public boolean isPremierTemps(){
        return currentMesure == 0;
    }
    
    /*
     * méthode qui détermine si le minuteur a annoncé un tick
     */
    public boolean isTick(){
        if (isTick){
            isTick = false;
            return true;
        } else {
            return isTick;
        }
    }

    public void enregistrer() {
        DataAccess dao = new DataAccess();
        MetronomeData data = new MetronomeData();
        data.tempo = this.tempo;
        data.mesure = this.mesure;
        data.volume = this.volume;
        data.langage = this.langage;
        dao.enregistrer(data);
    }

    public void charger() {
        DataAccess dao = new DataAccess(); 
        MetronomeData data = dao.charger();
        if(data != null){
            this.tempo = data.tempo;
            this.mesure = data.mesure;
            this.volume = data.volume;
            this.langage = data.langage;
            notifier();
        }
    }
    
    
}

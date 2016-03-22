package controller;

import model.MetronomeModel;

/**
 * classe du contrôleur du métronome 
 * 
 * @author fc891239
 */
public class MetronomeController {
    
    MetronomeModel modele;
    
    public MetronomeController(MetronomeModel modele) {
        this.modele = modele;
    }
    
    /*
     * méthode qui contrôe un changement de tempo
     */
    public void onTempoChange(int tempo){
        modele.setTempo(tempo);
    }
    
    /*
     * méthode qui contrôe un changement de mesure
     */
    public void onMesureChange(int mesure){
        modele.setMesure(mesure);
    }
    
    public void onVolumeChange(int volume) {
        modele.setVolume(volume);
    }
    
    /*
     * méthode qui contrôe un départ du métronome
     */
    public void onStart(){
        modele.startMinuteur();
    }
    
    /*
     * méthode qui contrôe un arrêt du métronome
     */
    public void onStop(){
        modele.stopMinuteur();
    }

    public void enregistrer() {
        modele.enregistrer();
    }
    
    /*
     * méthode change pour la localization francaise
     */
    public void onFrancais(){
        modele.setLangage("Francais");
    }
    
    /*
     * méthode change pour la localization Anglaise
     */
    public void onAnglais(){
        modele.setLangage("Anglais");
    }
}

package model;

import view.iObserver;

/**
 * interface qui définit un sujet d'observation
 * 
 * @author fc891239
 */
public interface iSubject {
    
    /*
     * méthode pour avertir les observateurs
     */
    void notifier();
    /*
     * méthode pour attacher un observateur au sujet
     */
    boolean attacher(iObserver observateur);
    /*
     * méthode pour détacher un sujet de l'observateur
     */
    boolean detacher(iObserver observateur);
    
}

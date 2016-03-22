package main;

import controller.MetronomeController;
import model.MetronomeModel;
import model.Minuteur;
import view.MetronomeView;

/**
 * Classe qui exécute le programe 
 * 
 * @author Mathieu
 */
public class Main {
    /**
     * @param args aucun argument
     */
    public static void main(String args[]) {
        
        MetronomeModel mdl = new MetronomeModel();
        MetronomeController ctrl = new MetronomeController(mdl);
        MetronomeView vue = new MetronomeView(ctrl,mdl);
        
        // On met la vue comme observateur du modèle
        mdl.attacher(vue);
        
        Minuteur.getInstance().setModel(mdl);
        
        mdl.charger();
        vue.startThread();
    }
}

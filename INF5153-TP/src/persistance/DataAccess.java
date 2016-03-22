package persistance;

import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author François
 */
public class DataAccess {
    /**
     * Charge en mémoire l'état du métronome à sa dernière utilisation
     * depuis une source de données spécifiée
     * @return true si on en mesure de charger les données. false si aucune
     * données à charger ne sont disponibles
     */
    public MetronomeData charger() {
        // TODO: Itération #3
        
        Object obj = null;
        try {
            ObjectInputStream ojb_in = new ObjectInputStream(new FileInputStream("metronome.data"));
            obj = ojb_in.readObject();
        } catch (IOException ex) {
            System.out.println("Aucun fichier de paramètre trouvé. Paramètres par défaut");
            Logger.getLogger(DataAccess.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DataAccess.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
        
        
        if(obj instanceof MetronomeData){
            return (MetronomeData) obj;
        } else {
            return null;
        }
    }
    
    /**
     * Permet de faire persister l'état du métronome dans une source de données
     * @return true si les données se sont fait persistées. false si une
     * erreur survient
     */
    public boolean enregistrer(MetronomeData data) {
        try {
            // TODO: Itération #3
            ObjectOutputStream obj_out = new ObjectOutputStream(new FileOutputStream("metronome.data"));
            obj_out.writeObject(data);
            return true;
        } catch (FileNotFoundException ex) {
            Logger.getLogger(DataAccess.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        } catch (IOException ex) {
            Logger.getLogger(DataAccess.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }
}

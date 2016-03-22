package view;

import java.util.HashMap;

/**
 *
 * @author François
 */
public class Localization {

    private static Localization uniqueInstance = null;
    private HashMap<String, String> dictionnaire;
    private HashMap dictionnaireFrancais;
    private HashMap dictionnaireAnglais;

    /*
     * Le constructeur privé
     */
    private Localization() {
        setLangueFrancaise();
    }

    /*
     * Méthode qui retourne l'unique instance de Localization
     */
    public static Localization getLocalization() {
        if (uniqueInstance == null) {
            uniqueInstance = new Localization();
        }
        return uniqueInstance;
    }

    public String getWord(String key) {
        return dictionnaire.get(key);
    }

    /*
     * Méthode ....
     */
    public void setLangueFrancaise() {
        if (dictionnaireFrancais == null) {
            initierDictionnaireFrancais();
        }
        dictionnaire = dictionnaireFrancais;
    }

    /*
     * Méthode ....
     */
    public void setLangueAnglaise() {
        if (dictionnaireAnglais == null) {
            initierDictionnaireAnglais();
        }
        dictionnaire = dictionnaireAnglais;
    }

    /*
     * Méthode qui associe les clés/valeurs du dictionnaire francais
     */
    private void initierDictionnaireFrancais() {
        dictionnaireFrancais = new HashMap<String, String>();
        dictionnaireFrancais.put("Langage", "Langage");
        dictionnaireFrancais.put("Français", "Français");
        dictionnaireFrancais.put("Anglais", "Anglais");
        dictionnaireFrancais.put("Tempo", "Tempo");
        dictionnaireFrancais.put("Mesure", "Mesure");
        dictionnaireFrancais.put("Démarrer", "Démarrer");
        dictionnaireFrancais.put("Arrêter", "Arrêter");
        dictionnaireFrancais.put("Plus", "Plus");
        dictionnaireFrancais.put("Moins", "Moins");
        dictionnaireFrancais.put("Volume", "Volume");
    }

    /*
     * Méthode qui associe les clés/valeurs du dictionnaire Anglais
     */
    private void initierDictionnaireAnglais() {
        dictionnaireAnglais = new HashMap<String, String>();
        dictionnaireAnglais.put("Langage", "Language");
        dictionnaireAnglais.put("Français", "French");
        dictionnaireAnglais.put("Anglais", "English");
        dictionnaireAnglais.put("Tempo", "Tempo");
        dictionnaireAnglais.put("Mesure", "Measure");
        dictionnaireAnglais.put("Démarrer", "Start");
        dictionnaireAnglais.put("Arrêter", "Stop");
        dictionnaireAnglais.put("Plus", "Up");
        dictionnaireAnglais.put("Moins", "Down");
        dictionnaireAnglais.put("Volume", "Volume");
    }
}

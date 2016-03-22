
/**
 * I N F 1 1 2 0
 *
 * Ce programme permet de miser sur des paris aux cartes.
 *
 */

public class DynamixSim1 {

	public static final double PRIX_PIGE = 2.5;// 'Amélioration apportée: Ajout d'une variable fixe pour le prix des cartes

    /**
     * Affiche la carte selon sa couleur et sa valeur
     * @param carte doit etre entre 0 et 51 inclusivement
     */
    public static String afficherCarte (int carte) { // 'Amélioration apportée: Retour d'un string pour affichage, permettant des tests plus facile.
        // Declaration des variables locales
    	String affichageCarte= "";
        int valeur = PaquetDeCartes.valeur(carte);
        int couleur = PaquetDeCartes.couleur(carte);
        affichageCarte = "----------\n";
        // Affichage de la valeur de la carte
        switch (valeur) {
            case 1:
            	affichageCarte +="|as    ";
                break;
            case 11:
            	affichageCarte +="|valet ";
                break;
            case 12:
            	affichageCarte +="|dame  ";
                break;
            case 13:
            	affichageCarte +="|roi   ";
                break;
            default:
            	affichageCarte +="|"+valeur+"    ";
                if (valeur !=10){
                	affichageCarte +=" ";
                }
                break;
        } // switch (valeur)
        //Affichage de la couleur de la carte
        switch (couleur) {
            case 0:
            	affichageCarte +="♥ |\n";
                break;
            case 1:
            	affichageCarte +="♦ |\n";
                break;
            case 2:
            	affichageCarte +="♣ |\n";
                break;
            case 3:
            	affichageCarte +="♠ |\n";
                break;
        } // switch (couleur)
        affichageCarte +="----------";
        return affichageCarte;
    } // afficherCarte

    /**
     * Determine si les deux cartes ont la meme valeur (ex.: deux rois, deux 9)
     * @param carte1 et carte2 doivent etre entre 0 et 51 inclusivement
     */
    public static boolean memeValeur (int carte1,int carte2) {
        // Declaration des variables locales
        int valeur1 = PaquetDeCartes.valeur(carte1);
        int valeur2 = PaquetDeCartes.valeur(carte2);

        // Verification des valeurs des cartes
        return(valeur1 == valeur2);
    } // memeValeur

    /**
     * Determine si les deux cartes ont la meme couleur.
     * Les 4 couleurs possibles sont : coeur, carreau, trefle et pique.
     * @param carte1 et carte2 doivent etre entre 0 et 51 inclusivement
     * @return true si les deux cartes ont la meme couleur, false sinon
     */
    public static boolean memeCouleur (int carte1,int carte2) {
        // Declaration des variables locales
        int couleur1 = PaquetDeCartes.couleur(carte1);
        int couleur2 = PaquetDeCartes.couleur(carte2);

        // Verification des couleurs des cartes
        return (couleur1 == couleur2);
    } // memeCouleur

    /**
     * Determine si une carte est une figure : As, roi, dame, valet.
     * @param carte doit etre entre 0 et 51 inclusivement
     * @return true si la carte est une figure, false sinon
     */
    public static boolean estUneFigure (int carte) {
        // Declaration des variables locales
        int valeur = (carte % 13);

        // Verification de la valeur des cartes
        return ((valeur == 0)||(valeur > 9 && valeur < 13));
    } // estUneFigure

     /**
     * Permet a l'utilisateur d'initialiser le jeu de carte.
     * Un meme entier germe generera les memes cartes.
     */
    public static void initialiserLeJeu () {
        int germe = 0;
        boolean valide = false;
        System.out.println ( "Entrez un nombre entier pour initialiser le jeu : " );
        while(!valide){
	        try{
	        	germe = Clavier.lireInt ();
	        	valide = true;
	        }catch (NumberFormatException e) {
	            System.out.println("*** Vous devez entrer un nombre ! ");
	            System.out.println ( "Entrez un nombre entier pour initialiser le jeu : " );
	    	}
        }
        PaquetDeCartes.initialiserJeuDeCarte ( germe );
        PaquetDeCartes.brasser();
    } // initialiserLeJeu

     /**
     * Demande a l'utilisateur le montant d'argent qu'il a en sa possession.
     * Le programme le redemande tant que ce n'est pas superieur ou egal a 4.
     * @return un entier dont la valeur correspond au montant (en $).
     */
    public static int entreeArgent () {
        // Declaration de la variable locale
        int argent = 0;
        boolean valide = false;
        // Message d'invite
        System.out.println ("Entrez le montant dont vous disposez : ");
        while(!valide){ // Boucle de validation
	        try{
	        	argent = Clavier.lireInt();
	        	valide = true;
	        }catch (NumberFormatException e) {
	            System.out.println("*** Vous devez entrer un nombre ! ");
	    	}
	        if(argent < PRIX_PIGE*2){
	            System.out.println("*** Le montant doit être supérieur ou égal à " + PRIX_PIGE*2 + "$:");
	            valide = false;
	        }  
        }
        return argent;
    } // entreeArgent

     /**
     * Demande a l'utilisateur s'il desire jouer une partie.
     * @return true si l'utilisateur veut jouer, false sinon
     */
    public static boolean jouerPartie () {
        // Declaration des variables locales
        String invite = "Voulez-vous jouer une partie ? ";
        String reponse;
        boolean jouerUnePartie = false;

        // Message d'invite
        System.out.println (invite);
        reponse = Clavier.lireString();

        //Boucle de validation
        while (!reponse.equalsIgnoreCase("oui") && !reponse.equalsIgnoreCase("non")) {
            System.out.println ("*** Vous devez répondre par oui ou non :");
            reponse = Clavier.lireString();
        }

        if (reponse.equalsIgnoreCase("oui")) {
            jouerUnePartie = true;
        }
        return jouerUnePartie;
    } // jouerPartie


    /**
     * Affiche a l'ecran la somme des cartes
     */
    public static void sommeCartes (int carte1, int carte2, int carte3) {

    	String somme = "Voici les cartes : ";
    	int valeurTotale = 0;
    	int temp = -1;

    	temp = PaquetDeCartes.valeur(carte1);
    	somme += temp + " + ";
    	valeurTotale+=temp;

    	temp = PaquetDeCartes.valeur(carte2);
    	somme += temp;
    	valeurTotale+=temp;

    	if (carte3 > 0) {
    		temp = PaquetDeCartes.valeur(carte3);
        	somme += " + " +temp;
        	valeurTotale+=temp;
    	}

    	somme += " = " + valeurTotale;

    	System.out.println (somme);



    } // jouerPartie


     /**
     * Demande a l'utilisateur combien de cartes il desire piger.
     * Si il a moins de 6$, l'ordinateur pige 2 cartes pour lui.
     * @param argent doit etre un entier
     * @return 2 ou 3 cartes
     */
    public static int nombreDeCartes (double argent) {
        // Declaration de la variable locale
        int nombreDeCartes = 0;
        boolean valide = false;
        // Decision du nombre de cartes selon le montant d'argent
        if (argent < PRIX_PIGE * 3) {
            System.out.println ("Je vais piger deux cartes.");
            nombreDeCartes = 2;
        } else {
            System.out.println ("Combien de cartes voulez-vous piger (2 ou 3) ?");
            // Boucle de validation
            while(!valide){
            	try{
	            nombreDeCartes = Clavier.lireInt();
	            valide = true;
            	}
            	catch(NumberFormatException e){
		        	System.out.println ("*** Vous devez entrer un nombre !");
		        }
		        if (nombreDeCartes != 2 && nombreDeCartes != 3) {
	                System.out.println ("*** Le nombre de cartes doit être 2 ou 3.");
	                valide = false;
	            }
            }
        }
        return nombreDeCartes;
    } // nombreDeCartes

     /**
     * Affiche les differents choix de paris et demande a l'utilisateur
     * sur lequel il desire miser.
     * @return 1, 2, 3, 4 ou 5, dependamment de ce que l'utilisateur a choisi.
     */
    public static int numeroDePari () {
        // Declaration de la variable locale
    	int numeroDePari = 0;
        boolean valide = false;
        // Affichage des choix de paris
        System.out.println ("Quel pari voulez-vous faire ?");
        System.out.println (" 1 : Au moins une figure.");
        System.out.println (" 2 : Toutes plus petites que 5.");
        System.out.println (" 3 : Somme paire.");
        System.out.println (" 4 : Même couleur.");
        System.out.println (" 5 : Toutes égales à 5 fois le nombre de cartes.");
        System.out.println (" 6 : Même valeur.");
        // Decision de l'utilisateur
        System.out.println ("Votre choix =>");
        // Boucle de validation
        while(!valide){
	        try{
        	numeroDePari = Clavier.lireInt();
        	valide = true;
	        }catch(NumberFormatException e){
	        	 System.out.println ("*** Vous devez entrer un nombre !");
	        }
	        if(numeroDePari < 1 || numeroDePari > 6) {
	            System.out.println ("*** Vous devez choisir un numéro entre 1 et 6 :");
	            valide = false;
	        }
	    }
        return numeroDePari;
    } // numeroDePari

     /**
     * Verifie si, selon le numero de pari et les cartes pigees,
     * l'utilisateur gagne son pari.
     * @param choixPari doit etre un numero entre 1 et 5
     * @param carte1 et carte2 doivent etre entre 0 et 51
     * @param carte3 doit etre entre egal a 51 ou moins
     * @return true si l'utilisateur gagne son pari, false sinon
     */
    public static boolean gagnePari (int choixPari, int carte1, int carte2, int carte3) {
        // Declaration des variables locales
        boolean pariCarte1 = false;
        boolean pariCarte2 = false;
        boolean pariCarte3 = false;
        boolean gagnePari = false;
        boolean troisCartes = false;
        int valeurCarte1 = PaquetDeCartes.valeur(carte1);
        int valeurCarte2 = PaquetDeCartes.valeur(carte2);
        int valeurCarte3 = 0;

        // Verifie si l'utilisateur a pige 3 cartes
        if (carte3 > -1) {
            troisCartes = true;
            valeurCarte3 = PaquetDeCartes.valeur(carte3);
        }

        // Verification selon le numero de pari
        switch (choixPari) {
            case 1: // Pari 1

                // Verifie si les cartes sont des figures
                pariCarte1 = estUneFigure(carte1);
                pariCarte2 = estUneFigure(carte2);
                if (troisCartes) { // L'utilisateur a trois cartes
                    pariCarte3 = estUneFigure(carte3);
                }

                // Verifie si au moins une carte respecte la condition
                if (pariCarte1 == true || pariCarte2 == true || pariCarte3 == true) {
                    gagnePari = true;
                }
                break;
            case 2: // Pari 2

                // Verifie si chaque carte est inferieure � 5
                if (valeurCarte1 < 5) {
                    pariCarte1 = true;
                }
                if (valeurCarte2 < 5) {
                    pariCarte2 = true;
                }
                if (troisCartes) {
                    if (valeurCarte3 < 5) {
                        pariCarte3 = true;
                    }
                }

                // Verification de la condition
                if (troisCartes) { // L'utilisateur a trois cartes
                    // Verifie si les trois cartes respectent la condition
                    if (pariCarte1 == true && pariCarte2 == true && pariCarte3 == true) {
                        gagnePari = true;
                    }
                } else { // L'utilisateur a deux cartes
                    // Verifie si les deux cartes pigees respectent la condition
                    if (pariCarte1 == true && pariCarte2 == true) {
                        gagnePari = true;
                    }
                }
                break;
            case 3: // Pari 3
                if (troisCartes) { // L'utilisateur a trois cartes
                    // Verification de l'addition des valeurs
                    if ((valeurCarte1 + valeurCarte2 + valeurCarte3) % 2 == 0) {
                        gagnePari = true;
                    }
                } else { // L'utilisateur a deux cartes
                    // Verification de l'addition des valeurs
                    if ((valeurCarte1 + valeurCarte2) % 2 == 0) {
                        gagnePari = true;
                    }
                }
                break;
            case 4: // Pari 4
                if (troisCartes) { // L'utilisateur a trois cartes
                    // Verification des conditions
                    if (memeCouleur(carte1,carte2) && memeCouleur(carte1,carte2)) {
                        gagnePari = true;
                    }
                } else { // L'utilisateur a deux cartes
                    // Verification de la condition
                    if (memeCouleur(carte1,carte2)) {
                        gagnePari = true;
                    }
                }
                break;

            case 5: // Pari 5

                // Verifie si les cartes sont des figures
                pariCarte1 = estUneFigure(carte1);
                pariCarte2 = estUneFigure(carte2);
                if (troisCartes) { // L'utilisateur a trois cartes
                    pariCarte3 = estUneFigure(carte3);

                		if (pariCarte1 == true && pariCarte2 == true && pariCarte3 == true) {
                    		gagnePari = true;
                		}
                }else if (pariCarte1 == true && pariCarte2 == true) {
                    gagnePari = true;
                }
                break;
            case 6: // Pari 6
                if (troisCartes) { // L'utilisateur a trois cartes
                    // Verification des conditions
                    if (memeValeur(carte1,carte2) && memeValeur(carte2,carte3)) {
                        gagnePari = true;
                    }
                } else { // L'utilisateur a deux cartes
                    // Verification de la condition
                    if (memeValeur(carte1,carte2)) {
                        gagnePari = true;
                    }
                }
                break;
        } // switch (choixPari)
        return gagnePari;
    } // gagnePari

     /**
     * Donne le montant d'argent gagne par l'utilisateur selon son pari.
     * @param nombreDeCartes doit etre 2 ou 3
     * @param numeroDePari doit etre entre 1 et 5
     * @return gain le montant gagne par l'utilisateur
     */
    public static int argentGagne (int nombreDeCartes, int numeroDePari) {
        // Declaration de la variable locale
        int gain = 0;

        // Decision du gain en argent selon le num�ro du pari
        switch (numeroDePari) {
            case 1: // Pari 1
                gain = 17 - (2 * nombreDeCartes);
                break;
            case 2: // Pari 2
                gain = 4 * nombreDeCartes;
                break;
            case 3: // Pari 3
                gain = (2 * nombreDeCartes) + 2;
                break;
            case 4: // Pari 4
                gain = (3 * (int)(Math.pow(nombreDeCartes - 1,2))) + 2;
                break;
            case 5: // Pari 5
                gain = (5 * nombreDeCartes) ;
                break;
            case 6: // Pari 6
                gain = (2 * (int)(Math.pow(nombreDeCartes - 1,3))) + 2;
                break;
        } // switch (numeroDePari)
        return gain;
    } // argentGagne



    public static void main (String[] params) {
        // Declaration des variables
        double argent = 0;
        int nombreDeCartes = 0;

        boolean jouerPartie;
        int carte1 = 0;
        int carte2 = 0;
        int carte3 = 0;
        int numeroDePari = 0;
        boolean gagnePari;
        String gagne = "Bravo ! Vous avez gagné :";
        String perdu = "Désole ! Vous avez perdu !";

        initialiserLeJeu(); // Initialisation de l'ordre des cartes

        // Saisie des variables necessaires a l'execution du jeu
        argent = entreeArgent(); // Entree du montant d'argent de l'utilisateur
        jouerPartie = jouerPartie(); // Est-ce que l'utilisateur veut jouer?

        // Boucle principale
        while (jouerPartie == true && argent >= 4) {
        	PaquetDeCartes.afficherCartes();
            // Saisie des variables necessaires pour un pari
            carte3 = -1; // Puisqu'on ne connait pas le nombre de cartes
            nombreDeCartes = nombreDeCartes(argent); // Nombre de cartes jou�es
            argent = argent - (PRIX_PIGE * nombreDeCartes); // Achat des cartes a PRIX_PIGE par carte
            numeroDePari = numeroDePari(); // Pari en jeu

            // Affectation et affichage des cartes
            carte1 = PaquetDeCartes.piger();
            carte2 = PaquetDeCartes.piger();
            System.out.println ("Voici les cartes pigées:");
            System.out.println(afficherCarte(carte1));
            PaquetDeCartes.afficherCarte(carte1, 1);
            System.out.println(afficherCarte(carte2));
            PaquetDeCartes.afficherCarte(carte2, 2);
            if (nombreDeCartes == 3) {
                carte3 = PaquetDeCartes.piger();
                System.out.println(afficherCarte(carte3));
                PaquetDeCartes.afficherCarte(carte3, 3);
            }

            sommeCartes(carte1,carte2,carte3);
            // Verification si l'utilisateur gagne et ajout du gain
            gagnePari = gagnePari(numeroDePari,carte1,carte2,carte3);
            if (gagnePari) { // L'utilisateur a gagne son pari
                argent = argent + argentGagne(nombreDeCartes,numeroDePari);
                System.out.print (gagne);
                System.out.print (argentGagne(nombreDeCartes,numeroDePari));
                System.out.println (" $");
            } else { // L'utilisateur a perdu son pari
                System.out.println (perdu);
            }

            // Fin du pari
            System.out.println ("Vous disposez maintenant de " + argent + " $");

            // Verification si l'utilisateur peut/veut continuer a jouer
            if (argent < PRIX_PIGE*2) {
                System.out.println ("Vous n'avez plus assez d'argent, vous ne pouvez pas continuer.");
            } else {
                jouerPartie = jouerPartie();
            }
        } // while (Boucle principale)

        // Messages de fin de programme
        System.out.println ("Merci d'avoir joué avec moi !");
        System.out.println ("Vous quittez avec " + argent + " $ en poche.");
        System.exit(0);
    } // main

} // Tp2
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package persistance;

import java.io.Serializable;

/**
 *
 * @author Mathieu
 */
public class MetronomeData implements Serializable{
    public int tempo = 120;
    public int mesure = 4;
    public int volume = 50;
    public String langage = "Francais";
}

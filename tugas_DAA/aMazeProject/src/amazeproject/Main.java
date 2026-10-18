package amazeproject;

import gui.aMazeGUI;

public class Main 
{    
    public Main() {
    //Membuat contoh/instance Main baru
    }
    public static void main(String[] args)
    //Digunakan untuk argumen baris peintah
    {
        java.awt.EventQueue.invokeLater(new Runnable() 
        {
            public void run() 
            {
                new aMazeGUI().setVisible(true);
            }
        });
    }    
}

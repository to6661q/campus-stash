package subMenu;

import java.awt.Image;
import java.awt.Toolkit;
import java.io.IOException;
import javax.swing.JMenuBar;
import javax.swing.SwingUtilities;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;

public class splazh {
    public static void main(String[]args)throws  IOException,UnsupportedLookAndFeelException, IllegalAccessException, ClassNotFoundException, InstantiationException{
        Splash sp = new Splash();
        sp.setVisible(true);
        sp.setLocationRelativeTo (null);
        LoginAdmin mulai = new LoginAdmin();
        mulai.setSize (430, 812);
        mulai.setLocationRelativeTo (null);
        try{
            UIManager.setLookAndFeel("com.jtattoo.plaf.bernstein.BernsteinLookAndFeel");
            com.jtattoo.plaf.bernstein.BernsteinLookAndFeel.setTheme("Default","Java Swing","");

            SwingUtilities.updateComponentTreeUI(new JMenuBar());
            for(int i = 0; i <1001; i++){
                Thread.sleep(30);
                sp.lodingnum.setText(Integer.toString(i));
                sp.lodingbar.setValue(i);
                if(i==100){
                sp.setVisible(false);
                mulai.setVisible(true);
                }
            }
        }catch(Exception e){
        
        }finally{
            new JMenuBar().setVisible(true);
        }
    }    
}

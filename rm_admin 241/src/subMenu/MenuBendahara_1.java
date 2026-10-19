package rm_admin;

import subMenu.LoginBendahara;
import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.io.IOException;
import java.util.Arrays;
import java.util.List;

public class MenuBendahara_1 extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_keuangan = new JButton();
    JButton btn_out = new JButton();
    
    
    JButton btn_kembali = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Utama.png");
    Object window = this;
    
    public MenuBendahara_1(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_MenuUtama.setFont(new Font("Tahoma", Font.BOLD,16));
        lbl_MenuUtama.setText("BENDAHARA");
        lbl_MenuUtama.setForeground(Color.black);
        lbl_MenuUtama.setBounds(36, 63, 150, 29);
        this.getContentPane().add(lbl_MenuUtama);
        
        //Button Menu 1
        btn_keuangan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keuangan.setText("Keuangan");
        btn_keuangan.setBounds(59, 189, 312, 64);
        this.getContentPane().add(btn_keuangan);
        btn_keuangan.addActionListener(this);
        
         //Button Kembali
        btn_kembali.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali.setText("<");
        btn_kembali.setBounds(12, 684, 63, 20);
        this.getContentPane().add(btn_kembali);
        btn_kembali.addActionListener(this);
        
        //Button Log Out to login admin
        btn_out.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_out.setText("LO");
        btn_out.setBounds(365, 64, 30, 30);
        this.getContentPane().add(btn_out);
        btn_out.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1);        
    
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
       if(ae.getSource().equals(btn_keuangan)){
        setVisible(false);
        FrameKeuangan fh = new FrameKeuangan();
        fh.setSize(430, 812);
        fh.setLocationRelativeTo(null);
        fh.setResizable(false);
        fh.setVisible(true);   
        }   
 
   
    else if(ae.getSource().equals(btn_kembali)){
        setVisible(false);
        MenuBendahara_1 fh = new MenuBendahara_1();
        fh.setSize(430, 812);
        fh.setLocationRelativeTo(null);
        fh.setResizable(false);
        fh.setVisible(true);   
          }
        else if(ae.getSource().equals(btn_out)){
        setVisible(false);
        LoginBendahara pw = new LoginBendahara();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
          }         
    }
    
    public static void main(String[] args) {
        MenuBendahara_1 edfh = new MenuBendahara_1();
        edfh.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        edfh.setSize (430, 812);
        edfh.setLocationRelativeTo (null);
        edfh.setVisible(true);
    }
}

package rumahmakan2;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.util.Arrays;
import java.util.List;

public class MenuUtama extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_makanan = new JButton();
    JButton btn_minuman = new JButton();
    JButton btn_cemilan = new JButton();
    
    JButton btn_keluar = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Utama.png");
    Object window = this;
    
    public MenuUtama(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_MenuUtama.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_MenuUtama.setText("MENU UTAMA");
        lbl_MenuUtama.setForeground(Color.black);
        lbl_MenuUtama.setBounds(100, 20, 300, 60);
        //this.getContentPane().add(lbl_MenuUtama);
        
        //Button Makanan
        btn_makanan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_makanan.setText("Makanan");
        btn_makanan.setBounds(59, 390, 312, 64);
        this.getContentPane().add(btn_makanan);
        btn_makanan.addActionListener(this);
        
        //Button Minuman
        btn_minuman.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_minuman.setText("Minuman");
        btn_minuman.setBounds(59, 469, 312, 64);
        this.getContentPane().add(btn_minuman);
        btn_minuman.addActionListener(this);
        
        //Button Cemilan
        btn_cemilan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_cemilan.setText("Cemilan");
        btn_cemilan.setBounds(59, 546, 312, 64);
        this.getContentPane().add(btn_cemilan);
        btn_cemilan.addActionListener(this);
        
        btn_keluar .setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar .setText("LO");
        btn_keluar .setBounds(376, 67, 18, 22);
        this.getContentPane().add(btn_keluar );
        btn_keluar.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1);        
    
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
       if(ae.getSource().equals(btn_makanan)){
        setVisible(false);
            MenuMakanan fh = new MenuMakanan();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_minuman)){
        setVisible(false);
            MenuMinuman fh = new MenuMinuman();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_cemilan)){
        setVisible(false);
            MenuCemilan fh = new MenuCemilan();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_keluar)){
        setVisible(false);
            Login fh = new Login();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    }
}

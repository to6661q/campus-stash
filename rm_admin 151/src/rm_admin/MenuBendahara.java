package rm_admin;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.io.IOException;
import java.util.Arrays;
import java.util.List;

public class MenuBendahara extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_Keuangan = new JButton();
    JButton btn_bendahara = new JButton();
    JButton btn_hrd = new JButton();
    JButton btn_owner = new JButton();
    JButton btn_pelanggan = new JButton();
    
    JButton btn_keluar = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Utama.png");
    Object window = this;
    
    public MenuBendahara(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_MenuUtama.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_MenuUtama.setText("MENU LOGIN");
        lbl_MenuUtama.setForeground(Color.black);
        lbl_MenuUtama.setBounds(100, 20, 300, 60);
        //this.getContentPane().add(lbl_MenuUtama);
        
        //Button Makanan
        btn_Keuangan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_Keuangan.setText("Pegawai");
        btn_Keuangan.setBounds(59, 251, 312, 64);
        this.getContentPane().add(btn_Keuangan);
        btn_Keuangan.addActionListener(this);
        
//        //Button Minuman
//        btn_bendahara.setFont(new Font("Tahoma", Font.BOLD,12));
//        btn_bendahara.setText("Bendahara");
//        btn_bendahara.setBounds(59, 330, 312, 64);
//        this.getContentPane().add(btn_bendahara);
//        btn_bendahara.addActionListener(this);
//        
//        //Button Cemilan
//        btn_hrd.setFont(new Font("Tahoma", Font.BOLD,12));
//        btn_hrd.setText("HRD");
//        btn_hrd.setBounds(59, 407, 312, 64);
//        this.getContentPane().add(btn_hrd);
//        btn_hrd.addActionListener(this);
//        
//         //Button Cemilan
//        btn_owner.setFont(new Font("Tahoma", Font.BOLD,12));
//        btn_owner.setText("Owner");
//        btn_owner.setBounds(59, 481, 312, 64);
//        this.getContentPane().add(btn_owner);
//        btn_owner.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1);        
    
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
//       if(ae.getSource().equals(btn_bendahara)){
//        setVisible(false);
//            LoginBendahara fh = new LoginBendahara();            
//            fh.setSize(430, 812);
//            fh.setLocationRelativeTo(null);
//            fh.setResizable(false);
//            fh.setVisible(true);
//        }   
//    else if(ae.getSource().equals(btn_owner)){
//        setVisible(false);
//            LoginOwner fh = new LoginOwner();            
//            fh.setSize(430, 812);
//            fh.setLocationRelativeTo(null);
//            fh.setResizable(false);
//            fh.setVisible(true);
//        }   
    if(ae.getSource().equals(btn_Keuangan)){
        setVisible(false);
            LoginPegawai fh = new LoginPegawai();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);    
        } 
//    else if(ae.getSource().equals(btn_hrd)){
//        setVisible(false);
//            LoginHRD fh = new LoginHRD();            
//            fh.setSize(430, 812);
//            fh.setLocationRelativeTo(null);
//            fh.setResizable(false);
//            fh.setVisible(true);
//        }   
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

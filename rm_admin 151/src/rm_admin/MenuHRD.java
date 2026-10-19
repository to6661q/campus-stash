package rm_admin;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.io.IOException;
import java.util.Arrays;
import java.util.List;

public class MenuHRD extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_pegawai = new JButton();
    JButton btn_tambahpegawai = new JButton();
    JButton btn_hapuspegawai = new JButton();
    JButton btn_owner = new JButton();
    JButton btn_pelanggan = new JButton();
    
    JButton btn_keluar = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Utama.png");
    Object window = this;
    
    public MenuHRD(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_MenuUtama.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_MenuUtama.setText("MENU LOGIN");
        lbl_MenuUtama.setForeground(Color.black);
        lbl_MenuUtama.setBounds(100, 20, 300, 60);
        //this.getContentPane().add(lbl_MenuUtama);
        
        //Button Makanan
        btn_pegawai.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pegawai.setText("Pegawai");
        btn_pegawai.setBounds(59, 251, 312, 64);
        this.getContentPane().add(btn_pegawai);
        btn_pegawai.addActionListener(this);
        
        //Button Minuman
        btn_tambahpegawai.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_tambahpegawai.setText("Bendahara");
        btn_tambahpegawai.setBounds(59, 330, 312, 64);
        this.getContentPane().add(btn_tambahpegawai);
        btn_tambahpegawai.addActionListener(this);
        
        //Button Cemilan
        btn_hapuspegawai.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_hapuspegawai.setText("HRD");
        btn_hapuspegawai.setBounds(59, 407, 312, 64);
        this.getContentPane().add(btn_hapuspegawai);
        btn_hapuspegawai.addActionListener(this);
        
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
       if(ae.getSource().equals(btn_tambahpegawai)){
        setVisible(false);
            LoginBendahara fh = new LoginBendahara();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
//    else if(ae.getSource().equals(btn_owner)){
//        setVisible(false);
//            LoginOwner fh = new LoginOwner();            
//            fh.setSize(430, 812);
//            fh.setLocationRelativeTo(null);
//            fh.setResizable(false);
//            fh.setVisible(true);
//        }   
    else if(ae.getSource().equals(btn_pegawai)){
        setVisible(false);
            LoginPegawai fh = new LoginPegawai();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);    
        } 
    else if(ae.getSource().equals(btn_hapuspegawai)){
        setVisible(false);
            LoginHRD fh = new LoginHRD();            
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

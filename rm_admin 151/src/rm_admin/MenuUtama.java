package rm_admin;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.util.Arrays;
import java.util.List;

public class MenuUtama extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_pegawai = new JButton();
    JButton btn_aset = new JButton();
    JButton btn_suppliar = new JButton();
    JButton btn_keuangan = new JButton();
    JButton btn_pelanggan = new JButton();
    
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
        btn_pegawai.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pegawai.setText("Pegawai");
        btn_pegawai.setBounds(59, 251, 312, 64);
        this.getContentPane().add(btn_pegawai);
        btn_pegawai.addActionListener(this);
        
        //Button Minuman
        btn_aset.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_aset.setText("Aset");
        btn_aset.setBounds(59, 330, 312, 64);
        this.getContentPane().add(btn_aset);
        btn_aset.addActionListener(this);
        
        //Button Cemilan
        btn_suppliar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_suppliar.setText("Suppliar");
        btn_suppliar.setBounds(59, 407, 312, 64);
        this.getContentPane().add(btn_suppliar);
        btn_suppliar.addActionListener(this);
        
         //Button Cemilan
        btn_keuangan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keuangan.setText("Keuangan");
        btn_keuangan.setBounds(59, 481, 312, 64);
        this.getContentPane().add(btn_keuangan);
        btn_keuangan.addActionListener(this);
        
         //Button Cemilan
        btn_pelanggan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pelanggan.setText("Pelanggan");
        btn_pelanggan.setBounds(59, 560, 312, 64);
        this.getContentPane().add(btn_pelanggan);
        btn_pelanggan.addActionListener(this);
        
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
       if(ae.getSource().equals(btn_aset)){
        setVisible(false);
            aset fh = new aset();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_keuangan)){
        setVisible(false);
            keuangan fh = new keuangan();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_pegawai)){
        setVisible(false);
            pegawai fh = new pegawai();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);        }   
    
    else if(ae.getSource().equals(btn_pelanggan)){
        setVisible(false);
            pelanggan fh = new pelanggan();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_suppliar)){
        setVisible(false);
            supliar fh = new supliar();            
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

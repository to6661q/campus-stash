package rm_admin;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.io.IOException;
import java.util.Arrays;
import java.util.List;

public class MenuOwner extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_pegawai = new JButton();
    JButton btn_keuangan = new JButton();
    JButton btn_aset = new JButton();
    JButton btn_supliar = new JButton();
    JButton btn_pelanggan = new JButton();
    JButton btn_barangsupliar = new JButton();
    JButton btn_pesanan = new JButton();
    JButton btn_datasience = new JButton();
    
    JButton btn_keluar = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Utama.png");
    Object window = this;
    
    public MenuOwner(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_MenuUtama.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_MenuUtama.setText("MENU OWNER");
        lbl_MenuUtama.setForeground(Color.black);
        lbl_MenuUtama.setBounds(100, 20, 300, 60);
        //this.getContentPane().add(lbl_MenuUtama);
        
        //Button Makanan
        btn_pegawai.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pegawai.setText("Data Pegawai");
        btn_pegawai.setBounds(59, 251, 312, 64);
        this.getContentPane().add(btn_pegawai);
        btn_pegawai.addActionListener(this);
        
        //Button Minuman
        btn_keuangan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keuangan.setText("Keuangan");
        btn_keuangan.setBounds(59, 330, 312, 64);
        this.getContentPane().add(btn_keuangan);
        btn_keuangan.addActionListener(this);
        
        //Button Cemilan
        btn_aset.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_aset.setText("Aset");
        btn_aset.setBounds(59, 407, 312, 64);
        this.getContentPane().add(btn_aset);
        btn_aset.addActionListener(this);
        
         //Button Cemilan
        btn_supliar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_supliar.setText("Suppliar");
        btn_supliar.setBounds(59, 481, 312, 64);
        this.getContentPane().add(btn_supliar);
        btn_supliar.addActionListener(this);
        
        //Button Makanan
        btn_pelanggan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pelanggan.setText("");
        btn_pelanggan.setBounds(59, 251, 312, 64);
        this.getContentPane().add(btn_pelanggan);
        btn_pelanggan.addActionListener(this);
        
        //Button Minuman
        btn_barangsupliar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_barangsupliar.setText("Barang supplier");
        btn_barangsupliar.setBounds(59, 330, 312, 64);
        this.getContentPane().add(btn_barangsupliar);
        btn_barangsupliar.addActionListener(this);
        
        //Button Cemilan
        btn_pesanan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pesanan.setText("Pesanan");
        btn_pesanan.setBounds(59, 407, 312, 64);
        this.getContentPane().add(btn_pesanan);
        btn_pesanan.addActionListener(this);
        
         //Button Cemilan
        btn_datasience.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_datasience.setText("Data science");
        btn_datasience.setBounds(59, 481, 312, 64);
        this.getContentPane().add(btn_datasience);
        btn_datasience.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1);        
    
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
       if(ae.getSource().equals(btn_keuangan)){
        setVisible(false);
            LoginBendahara fh = new LoginBendahara();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
        else if(ae.getSource().equals(btn_supliar)){
        setVisible(false);
            LoginOwner fh = new LoginOwner();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
        else if(ae.getSource().equals(btn_pegawai)){
        setVisible(false);
            LoginPegawai fh = new LoginPegawai();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);    
        } 
        else if(ae.getSource().equals(btn_aset)){
        setVisible(false);
            LoginHRD fh = new LoginHRD();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
        else if(ae.getSource().equals(btn_pelanggan)){
            setVisible(false);
            LoginOwner fh = new LoginOwner();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
        else if(ae.getSource().equals(btn_pesanan)){
            setVisible(false);
            LoginPegawai fh = new LoginPegawai();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);    
        } 
        else if(ae.getSource().equals(btn_barangsupliar)){
            setVisible(false);
            LoginHRD fh = new LoginHRD();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
        else if(ae.getSource().equals(btn_datasience)){
            setVisible(false);
            LoginOwner fh = new LoginOwner();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
        else if(ae.getSource().equals(btn_datasience)){
            setVisible(false);
            LoginOwner fh = new LoginOwner();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    }
}

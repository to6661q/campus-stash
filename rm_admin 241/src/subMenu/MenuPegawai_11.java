package subMenu;


import Admin.LoginPegawai;
import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.io.IOException;
import java.util.Arrays;
import java.util.List;


public class MenuOwner extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_data = new JButton();
    
    //DEKLARASII BUTTON
    JButton btn_aset = new JButton();
    JButton btn_keuangan = new JButton();
    JButton btn_pegawai = new JButton();
    JButton btn_supliar = new JButton();
    JButton btn_barang = new JButton(); 
    JButton btn_pelanggan= new JButton();
    JButton btn_pesanan = new JButton();
    JButton btn_kembali = new JButton();
    
    JButton btn_out = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Utama.png");
    Object window = this;
    
    public MenuOwner(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_MenuUtama.setFont(new Font("Tahoma", Font.BOLD,16));
        lbl_MenuUtama.setText("OWNER");
        lbl_MenuUtama.setForeground(Color.black);
        lbl_MenuUtama.setBounds(36, 63, 96, 29);
        this.getContentPane().add(lbl_MenuUtama);
        
        //Button Menu 1
        btn_pegawai.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pegawai.setText("Pegawai");
        btn_pegawai.setBounds(59, 139, 312, 64);
        this.getContentPane().add(btn_pegawai);
        btn_pegawai.addActionListener(this);
        
        //Button Menu 2
        btn_supliar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_supliar.setText("Supliar");
        btn_supliar.setBounds(59, 218, 312, 64);
        this.getContentPane().add(btn_supliar);
        btn_supliar.addActionListener(this);
        
        //Button Menu 3
        btn_barang.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_barang.setText("Barang Supliar");
        btn_barang.setBounds(59, 295, 312, 64);
        this.getContentPane().add(btn_barang);
        btn_barang.addActionListener(this);
        
        //Button Menu 4
        btn_pelanggan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pelanggan.setText("Pelanggan");
        btn_pelanggan.setBounds(59, 369, 312, 64);
        this.getContentPane().add(btn_pelanggan);
        btn_pelanggan.addActionListener(this);
        
        //Button Menu 5
        btn_pesanan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pesanan.setText("Pesanan");
        btn_pesanan.setBounds(59, 447, 312, 64);
        this.getContentPane().add(btn_pesanan);
        btn_pesanan.addActionListener(this);
        
        //Button Menu 6
        btn_aset.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_aset.setText("Aset");
        btn_aset.setBounds(59, 525, 312, 64);
        this.getContentPane().add(btn_aset);
        btn_aset.addActionListener(this);
        
        //Button Menu 7
        btn_keuangan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keuangan.setText("Keuangan");
        btn_keuangan.setBounds(59, 597, 312, 64);
        this.getContentPane().add(btn_keuangan);
        btn_keuangan.addActionListener(this);
        
        //Button Menu 8
        btn_data.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_data.setText("Data Science");
        btn_data.setBounds(59, 674, 312, 64);
        this.getContentPane().add(btn_data);
        btn_data.addActionListener(this);
        
         //Button Kembali
        btn_kembali.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali.setText("");
        btn_kembali.setBounds(12, 800, 63, 20);
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
       if(ae.getSource().equals(btn_pegawai)){
        setVisible(false);
        FramePegawai pw = new FramePegawai();
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
       }
 
    else if(ae.getSource().equals(btn_supliar)){
        setVisible(false);
        FrameSupliar pw = new FrameSupliar();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);

        } 
    else if(ae.getSource().equals(btn_barang)){
        setVisible(false);
        FrameBarangSuply pw = new FrameBarangSuply();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);    
        }   
    else if(ae.getSource().equals(btn_pelanggan)){
        setVisible(false);
        FramePelanggan pw = new FramePelanggan();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
          }
    else if(ae.getSource().equals(btn_pesanan)){
        setVisible(false);
        FramePesanan pw = new FramePesanan();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
       
          }   
    else if(ae.getSource().equals(btn_aset)){
        setVisible(false);
        FrameDaftarMakanan pw = new FrameDaftarMakanan();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
          }   
    
    else if(ae.getSource().equals(btn_pelanggan)){
        setVisible(false);
        FrameDaftarMakanan pw = new FrameDaftarMakanan();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
          }   
        
    else if(ae.getSource().equals(btn_data)){
        setVisible(false);
        FrameDaftarMakanan pw = new FrameDaftarMakanan();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
          }   
        
    else if(ae.getSource().equals(btn_out)){
        setVisible(false);
        LoginPegawai pw = new LoginPegawai();         
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
          }         
    }
    
    public static void main(String[] args) {
        MenuOwner edfh = new MenuOwner();
        edfh.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        edfh.setSize (430, 812);
        edfh.setLocationRelativeTo (null);
        edfh.setVisible(true);
    }
}

package subMenu;


import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.io.IOException;
import java.util.Arrays;
import java.util.List;


public class MenuPegawai_1 extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_pegawai = new JButton();
    
    //DEKLARASII BUTTON
    JButton btn_daftarMkn = new JButton();
    JButton btn_supliar = new JButton();
    JButton btn_barangSup = new JButton();
    JButton btn_pelanggan = new JButton();
    JButton btn_pesanan = new JButton();
    
    JButton btn_kembali = new JButton();
    JButton btn_out = new JButton();
JLabel label1 = new JLabel("", JLabel.CENTER);
    ImageIcon background = new ImageIcon("src/image/polos.jpg");
    Object window = this;
    
    public MenuPegawai_1(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_MenuUtama.setFont(new Font("Tahoma", Font.BOLD,16));
        lbl_MenuUtama.setText("PEGAWAI");
        lbl_MenuUtama.setForeground(Color.black);
        lbl_MenuUtama.setBounds(36, 63, 96, 29);
        this.getContentPane().add(lbl_MenuUtama);
        
        //Button Menu 1
        btn_pegawai.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pegawai.setText("Pegawai");
        btn_pegawai.setBounds(59, 189, 312, 64);
                btn_pegawai.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_pegawai.setBackground(Color.DARK_GRAY);
        btn_pegawai.setForeground(Color.white);
        btn_pegawai.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_pegawai.setBorder(null);
                btn_pegawai.setBackground(Color.ORANGE);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_pegawai.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_pegawai.setBackground(Color.DARK_GRAY);
            }
        });
        this.getContentPane().add(btn_pegawai);
        btn_pegawai.addActionListener(this);
        
        //Button Menu 2
        btn_supliar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_supliar.setText("Supliar");
        btn_supliar.setBounds(59, 268, 312, 64);
            btn_supliar.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_supliar.setBackground(Color.DARK_GRAY);
        btn_supliar.setForeground(Color.white);
        btn_supliar.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_supliar.setBorder(null);
                btn_supliar.setBackground(Color.ORANGE);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_supliar.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_supliar.setBackground(Color.DARK_GRAY);
            }
        });    
        this.getContentPane().add(btn_supliar);
        btn_supliar.addActionListener(this);
        
        //Button Menu 3
        btn_barangSup.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_barangSup.setText("Barang Supliar");
        btn_barangSup.setBounds(59, 345, 312, 64);
                btn_barangSup.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_barangSup.setBackground(Color.DARK_GRAY);
        btn_barangSup.setForeground(Color.white);
        btn_barangSup.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_barangSup.setBorder(null);
                btn_barangSup.setBackground(Color.ORANGE);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_barangSup.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_barangSup.setBackground(Color.DARK_GRAY);
            }
        });
        this.getContentPane().add(btn_barangSup);
        btn_barangSup.addActionListener(this);
        
        //Button Menu 4
        btn_pelanggan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pelanggan.setText("Pelanggan");
        btn_pelanggan.setBounds(59, 419, 312, 64);
                btn_pelanggan.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_pelanggan.setBackground(Color.DARK_GRAY);
        btn_pelanggan.setForeground(Color.white);
        btn_pelanggan.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_pelanggan.setBorder(null);
                btn_pelanggan.setBackground(Color.ORANGE);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_pelanggan.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_pelanggan.setBackground(Color.DARK_GRAY);
            }
        });
        this.getContentPane().add(btn_pelanggan);
        btn_pelanggan.addActionListener(this);
        
        //Button Menu 5
        btn_pesanan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pesanan.setText("Pesanan");
        btn_pesanan.setBounds(59, 497, 312, 64);
                btn_pesanan.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_pesanan.setBackground(Color.DARK_GRAY);
        btn_pesanan.setForeground(Color.white);
        btn_pesanan.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_pesanan.setBorder(null);
                btn_pesanan.setBackground(Color.ORANGE);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_pesanan.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_pesanan.setBackground(Color.DARK_GRAY);
            }
        });
        this.getContentPane().add(btn_pesanan);
        btn_pesanan.addActionListener(this);
        
        //Button Menu 6
        btn_daftarMkn.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_daftarMkn.setText("Daftar Makanan");
        btn_daftarMkn.setBounds(59, 575, 312, 64);
                btn_daftarMkn.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_daftarMkn.setBackground(Color.DARK_GRAY);
        btn_daftarMkn.setForeground(Color.white);
        btn_daftarMkn.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_daftarMkn.setBorder(null);
                btn_daftarMkn.setBackground(Color.ORANGE);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_daftarMkn.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_daftarMkn.setBackground(Color.DARK_GRAY);
            }
        });
        this.getContentPane().add(btn_daftarMkn);
        btn_daftarMkn.addActionListener(this);
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
    else if(ae.getSource().equals(btn_barangSup)){
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
    else if(ae.getSource().equals(btn_daftarMkn)){
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
        MenuPegawai_1 edfh = new MenuPegawai_1();
        edfh.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        edfh.setSize (430, 812);
        edfh.setLocationRelativeTo (null);
        edfh.setVisible(true);
    }
}

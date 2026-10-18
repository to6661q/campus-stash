package rumahmakan2;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.util.Arrays;
import java.util.List;
import javax.swing.border.CompoundBorder;
import javax.swing.border.EmptyBorder;
import javax.swing.border.Border;
import javax.swing.border.CompoundBorder;



public class MenuMakanan extends JFrame implements ActionListener{
    
    JLabel lbl_menumakanan = new JLabel();
    
    JButton btn_ayamgoreng = new JButton();
    ImageIcon background1 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_sayurasem = new JButton();
    ImageIcon background2 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_sayursingkong = new JButton();
    ImageIcon background3 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_ikangoreng = new JButton();
    ImageIcon background4 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_nasi = new JButton();
    ImageIcon background5 = new ImageIcon("src/asetImage/Group 25.jpg");
    
    JButton btn_keluar = new JButton();
    ImageIcon background6 = new ImageIcon("src/asetImage/Group 22.jpg");
    JButton btn_kembali = new JButton();
    ImageIcon background7 = new ImageIcon("src/asetImage/Group 24.png");
    JButton btn_lanjut = new JButton();
    ImageIcon background8 = new ImageIcon("src/asetImage/Group 23.png");
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Makanan.png");
    
    
    
    public MenuMakanan(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_menumakanan.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_menumakanan.setText("Menu Makanan");
        lbl_menumakanan.setForeground(Color.black);
        lbl_menumakanan.setBounds(30, 30, 400, 42);
        //this.getContentPane().add(lbl_menumakanan);
        
        
        //Button ayam goreng
        //btn_ayamgoreng.setIcon(background1);
        btn_ayamgoreng.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_ayamgoreng.setText("AG");
        btn_ayamgoreng.setBounds(310, 213, 59, 17);
        Border empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_ayamgoreng.setBorder(new CompoundBorder(null, empty));
        btn_ayamgoreng.setBackground(new Color(252, 197, 0));
        btn_ayamgoreng.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_ayamgoreng.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_ayamgoreng.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_ayamgoreng);
        btn_ayamgoreng.addActionListener(this);
        
        //Button ikan goreng
        //btn_ikangoreng.setIcon(background2);
        btn_ikangoreng.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_ikangoreng.setText("IG");
        btn_ikangoreng.setBounds(310, 311, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_ikangoreng.setBorder(new CompoundBorder(null, empty));
        btn_ikangoreng.setBackground(new Color(252, 197, 0));
        btn_ikangoreng.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_ikangoreng.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_ikangoreng.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_ikangoreng);
        btn_ikangoreng.addActionListener(this);
        
        //Button sayur singkong
        //btn_sayursingkong.setIcon(background3);
        btn_sayursingkong.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_sayursingkong.setText("SS");
        btn_sayursingkong.setBounds(310, 521, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_sayursingkong.setBorder(new CompoundBorder(null, empty));
        btn_sayursingkong.setBackground(new Color(252, 197, 0));
        btn_sayursingkong.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_sayursingkong.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_sayursingkong.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_sayursingkong);
        btn_sayursingkong.addActionListener(this);
        
        //Button sayur asem
        //btn_sayurasem.setIcon(background4);
        btn_sayurasem.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_sayurasem.setText("SA");
        btn_sayurasem.setBounds(310, 416, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_sayurasem.setBorder(new CompoundBorder(null, empty));
        btn_sayurasem.setBackground(new Color(252, 197, 0));
        btn_sayurasem.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_sayurasem.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_sayurasem.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_sayurasem);
        btn_sayurasem.addActionListener(this);
        
        //Button nasi
        //btn_nasi.setIcon(background5);
        btn_nasi.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_nasi.setText("N");
        btn_nasi.setBounds(310, 626, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_nasi.setBorder(new CompoundBorder(null, empty));
        btn_nasi.setBackground(new Color(252, 197, 0));
        btn_nasi.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_nasi.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_nasi.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_nasi);
        btn_nasi.addActionListener(this);
        
        //Button keluar
        btn_keluar.setIcon(background6);
        btn_keluar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar.setText("LO");
        btn_keluar.setBounds(376, 67, 18, 22);
        this.getContentPane().add(btn_keluar);
        btn_keluar.addActionListener(this);
        
        //Button kembali
        btn_kembali.setIcon(background7);
        btn_kembali.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali.setText("<");
        btn_kembali.setBounds(8, 69, 10, 17);
        this.getContentPane().add(btn_kembali );
        btn_kembali.addActionListener(this);
        
        //Button lanjut
        btn_lanjut.setIcon(background8);
        btn_lanjut.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_lanjut.setText(">");
        btn_lanjut.setBounds(220, 798, 58, 42);
        btn_lanjut.setOpaque(false);
        btn_lanjut.setContentAreaFilled(false);
        btn_lanjut.setBorderPainted(false);
        this.getContentPane().add(btn_lanjut);
       // btn_lanjut.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1);
    }
    
    public void actionPerformed(ActionEvent ae){
    if(ae.getSource().equals(btn_ayamgoreng)){
            
            //Buat kaya gini kesemua menu sesuai dengan makanannya EZ LAHHH... gimana? bisa lah
            
            //yang bawah ini untuk masuk ke tabel pesanan
            //untuk event ini bisa dipakai buat yang tadi tu nampilin di Detail Jumlah, gimana paham? yosh
            DetailJumlah.pilihan = "Ayam Goreng";
            DetailJumlah.idProduk1 = "3";
            
            // ini untuk harga makanannya, jangan sama yak wkwk
            // di tmpt makan kadang sama wkwk
            //ya terserah lah, nanti di gui ini
            DetailJumlah.hargaporsi = 10000;
            setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
            
        }
    
    
    else if(ae.getSource().equals(btn_ikangoreng )){
        setVisible(false);
        //nama makanan
            DetailJumlah.pilihan = "Ikan Goreng";
        //harga    
            DetailJumlah.hargaporsi = 10000;
            DetailJumlah.idProduk1 = "2";
        //view    
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    
    else if(ae.getSource().equals(btn_sayurasem)){
            DetailJumlah.pilihan = "Sayur Asem";
            DetailJumlah.hargaporsi = 5000;
            DetailJumlah.idProduk1 = "15";
            setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    
    else if(ae.getSource().equals(btn_sayursingkong)){
                //nama makanan
            DetailJumlah.pilihan = "Sayur Singkong";
        //harga    
            DetailJumlah.hargaporsi = 5000;
            setVisible(false);
            DetailJumlah.idProduk1 = "14";
        //view 
            setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    
    else if(ae.getSource().equals(btn_nasi)){
                //nama makanan
            DetailJumlah.pilihan = "Nasi";
        //harga    
            DetailJumlah.hargaporsi = 5000;
            DetailJumlah.idProduk1 = "8";
            setVisible(false);
        //view 
            setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
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
    
    else if(ae.getSource().equals(btn_kembali)){
        setVisible(false);
            MenuUtama fh = new MenuUtama();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_lanjut)){
        setVisible(false);
            Rincianlama fh = new Rincianlama();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    }
}

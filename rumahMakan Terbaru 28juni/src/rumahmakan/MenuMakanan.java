package rumahmakan;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.util.Arrays;
import java.util.List;

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
    ImageIcon background = new ImageIcon("src/asetImage/Group 28.png");
    
    
    
    public MenuMakanan(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_menumakanan.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_menumakanan.setText("Menu Makanan");
        lbl_menumakanan.setForeground(Color.black);
        lbl_menumakanan.setBounds(30, 30, 400, 42);
        this.getContentPane().add(lbl_menumakanan);
        
        
        //Button ayam goreng
        btn_ayamgoreng.setIcon(background1);
        btn_ayamgoreng.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_ayamgoreng.setText("AG");
        btn_ayamgoreng.setBounds(344, 100, 58, 42);
        this.getContentPane().add(btn_ayamgoreng);
        btn_ayamgoreng.addActionListener(this);
        
        //Button ikan goreng
        btn_ikangoreng.setIcon(background2);
        btn_ikangoreng.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_ikangoreng.setText("IG");
        btn_ikangoreng.setBounds(344, 162, 58, 42);
        this.getContentPane().add(btn_ikangoreng);
        btn_ikangoreng.addActionListener(this);
        
        //Button sayur singkong
        btn_sayursingkong.setIcon(background3);
        btn_sayursingkong.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_sayursingkong.setText("SS");
        btn_sayursingkong.setBounds(344, 285, 58, 42);
        this.getContentPane().add(btn_sayursingkong);
        btn_sayursingkong.addActionListener(this);
        
        //Button sayur asem
        btn_sayurasem.setIcon(background4);
        btn_sayurasem.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_sayurasem.setText("SA");
        btn_sayurasem.setBounds(344, 223, 58, 42);
        this.getContentPane().add(btn_sayurasem);
        btn_sayurasem.addActionListener(this);
        
        //Button nasi
        btn_nasi.setIcon(background5);
        btn_nasi.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_nasi.setText("N");
        btn_nasi.setBounds(344, 347, 58, 42);
        this.getContentPane().add(btn_nasi);
        btn_nasi.addActionListener(this);
        
        //Button keluar
        btn_keluar.setIcon(background6);
        btn_keluar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar.setText("LO");
        btn_keluar.setBounds(30, 400, 58, 42);
        this.getContentPane().add(btn_keluar);
        btn_keluar.addActionListener(this);
        
        //Button kembali
        btn_kembali.setIcon(background7);
        btn_kembali.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali.setText("<");
        btn_kembali.setBounds(152, 400, 58, 42);
        this.getContentPane().add(btn_kembali );
        btn_kembali.addActionListener(this);
        
        //Button lanjut
        btn_lanjut.setIcon(background8);
        btn_lanjut.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_lanjut.setText(">");
        btn_lanjut.setBounds(220, 400, 58, 42);
        this.getContentPane().add(btn_lanjut);
        btn_lanjut.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,500);
        this.getContentPane().add(label1);
    }
    
    public void actionPerformed(ActionEvent ae){
    if(ae.getSource().equals(btn_ayamgoreng)){
            
            //Buat kaya gini kesemua menu sesuai dengan makanannya EZ LAHHH... gimana? bisa lah
            
            //yang bawah ini untuk masuk ke tabel pesanan
            //untuk event ini bisa dipakai buat yang tadi tu nampilin di Detail Jumlah, gimana paham? yosh
            DetailJumlah.pilihan = "Ayam Goreng";
            
            // ini untuk harga makanannya, jangan sama yak wkwk
            // di tmpt makan kadang sama wkwk
            //ya terserah lah, nanti di gui ini
            DetailJumlah.hargaporsi = 15000;
            setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
            
        }   
    else if(ae.getSource().equals(btn_ikangoreng )){
        setVisible(false);
        //nama makanan
            DetailJumlah.pilihan = "Ikan Goreng";
        //harga    
            DetailJumlah.hargaporsi = 8000;
           
        //view    
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_sayurasem)){
            DetailJumlah.pilihan = "Sayur Asem";
            DetailJumlah.hargaporsi = 7000;
            setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_sayursingkong)){
                //nama makanan
            DetailJumlah.pilihan = "Sayur Singkong";
        //harga    
            DetailJumlah.hargaporsi = 8500;
            setVisible(false);
        //view 
            setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    else if(ae.getSource().equals(btn_nasi)){
                //nama makanan
            DetailJumlah.pilihan = "Nasi";
        //harga    
            DetailJumlah.hargaporsi = 3000;
            setVisible(false);
        //view 
            setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    
    else if(ae.getSource().equals(btn_keluar)){
        setVisible(false);
            Login fh = new Login();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    
    else if(ae.getSource().equals(btn_kembali)){
        setVisible(false);
            MenuUtama fh = new MenuUtama();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_lanjut)){
        setVisible(false);
            Rincianlama fh = new Rincianlama();            
            fh.setSize(430, 730);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    }
}

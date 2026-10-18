package rumahmakan2;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.util.Arrays;
import java.util.List;
import javax.swing.border.Border;
import javax.swing.border.CompoundBorder;
import javax.swing.border.EmptyBorder;

public class MenuCemilan extends JFrame implements ActionListener{
    
    JLabel lbl_menucemilan = new JLabel();
    
    JButton btn_keripiksingkong = new JButton();
    ImageIcon background1 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_otakotak = new JButton();
    ImageIcon background2 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_gorengan = new JButton();
    ImageIcon background3 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_keripikudang = new JButton();
    ImageIcon background4 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_tempetahu = new JButton();
    ImageIcon background5 = new ImageIcon("src/asetImage/Group 25.jpg");
    
    JButton btn_keluar = new JButton();
    ImageIcon background6 = new ImageIcon("src/asetImage/Group 22.jpg");
    JButton btn_kembali = new JButton();
    ImageIcon background7 = new ImageIcon("src/asetImage/Group 24.png");
    JButton btn_lanjut = new JButton();
    ImageIcon background8 = new ImageIcon("src/asetImage/Group 23.png"); 
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Camilan.png");
    
    
    public MenuCemilan(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_menucemilan.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_menucemilan.setText("Menu Cemilan");
        lbl_menucemilan.setForeground(Color.black);
        lbl_menucemilan.setBounds(30, 30, 400, 42);
        //this.getContentPane().add(lbl_menucemilan);
        
        
        //Button keripik singkong
       // btn_keripiksingkong.setIcon(background1);
        btn_keripiksingkong.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keripiksingkong.setText("KS");
        btn_keripiksingkong.setBounds(310, 213, 59, 17);
        Border empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_keripiksingkong.setBorder(new CompoundBorder(null, empty));
        btn_keripiksingkong.setBackground(new Color(252, 197, 0));
        btn_keripiksingkong.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_keripiksingkong.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_keripiksingkong.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_keripiksingkong);
        btn_keripiksingkong.addActionListener(this);
        
        //Button keripik udang
        //btn_keripikudang.setIcon(background2);
        btn_keripikudang.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keripikudang.setText("KU");
        btn_keripikudang.setBounds(310, 311, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_keripikudang.setBorder(new CompoundBorder(null, empty));
        btn_keripikudang.setBackground(new Color(252, 197, 0));
        btn_keripikudang.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_keripikudang.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_keripikudang.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_keripikudang);
        btn_keripikudang.addActionListener(this);
        
        //Button gorengan
        //btn_gorengan.setIcon(background3);
        btn_gorengan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_gorengan.setText("GR");
        btn_gorengan.setBounds(310, 512, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_gorengan.setBorder(new CompoundBorder(null, empty));
        btn_gorengan.setBackground(new Color(252, 197, 0));
        btn_gorengan.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_gorengan.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_gorengan.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_gorengan);
        btn_gorengan.addActionListener(this);
        
        //Button otak-otak
        //btn_otakotak.setIcon(background4);
        btn_otakotak.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_otakotak.setText("OO");
        btn_otakotak.setBounds(310, 416, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_otakotak.setBorder(new CompoundBorder(null, empty));
        btn_otakotak.setBackground(new Color(252, 197, 0));
        btn_otakotak.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_otakotak.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_otakotak.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_otakotak);
        btn_otakotak.addActionListener(this);
        
        //Button tempe tahu
        //btn_tempetahu.setIcon(background5);
        btn_tempetahu.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_tempetahu.setText("TT");
        btn_tempetahu.setBounds(310, 626, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_tempetahu.setBorder(new CompoundBorder(null, empty));
        btn_tempetahu.setBackground(new Color(252, 197, 0));
        btn_tempetahu.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_tempetahu.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_tempetahu.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_tempetahu);
        btn_tempetahu.addActionListener(this);
        
        //Button keluar
        btn_keluar.setIcon(background6);
        btn_keluar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar.setText("LO");
        btn_keluar.setBounds(376, 67, 18, 22);
        this.getContentPane().add(btn_keluar);
        btn_keluar.addActionListener(this);
        
        //Button kembali
        btn_kembali.setIcon(background7);
        btn_kembali .setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali .setText("<");
        btn_kembali .setBounds(8, 69, 10, 17);
        this.getContentPane().add(btn_kembali );
        btn_kembali .addActionListener(this);
        
        //Button lanjut
        btn_lanjut.setIcon(background8);
        btn_lanjut.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_lanjut.setText(">");
        btn_lanjut.setBounds(220, 798, 58, 42);
        this.getContentPane().add(btn_lanjut);
       // btn_lanjut.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1);        
    }
    
    public void actionPerformed(ActionEvent ae){
    if(ae.getSource().equals(btn_keripiksingkong)){
        DetailJumlah.pilihan = "Keripik Singkong";
        DetailJumlah.hargaporsi = 2000;
        DetailJumlah.idProduk1 = "7";
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_keripikudang )){
        DetailJumlah.pilihan = "Keripik Udang";
        DetailJumlah.hargaporsi = 2000;
        DetailJumlah.idProduk1 = "6";
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_otakotak)){
        DetailJumlah.pilihan = "Otak Otak";
        DetailJumlah.hargaporsi = 5000;
        DetailJumlah.idProduk1 = "10";
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_gorengan)){
        DetailJumlah.pilihan = "Gorengan";
        DetailJumlah.hargaporsi = 2000;
        DetailJumlah.idProduk1 = "9";
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    else if(ae.getSource().equals(btn_tempetahu)){
        DetailJumlah.pilihan = "Tahu Tempe";
        DetailJumlah.hargaporsi = 2000;
        DetailJumlah.idProduk1 = "11";
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

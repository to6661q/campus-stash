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

public class MenuMinuman extends JFrame implements ActionListener{
    
    JLabel lbl_menuminuman = new JLabel();
    
    JButton btn_tehmanispanas = new JButton();
    ImageIcon background1 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_esjeruk = new JButton();
    ImageIcon background2 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_airmineral = new JButton();
    ImageIcon background3 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_tehmanisdingin = new JButton();
    ImageIcon background4 = new ImageIcon("src/asetImage/Group 25.jpg");
    JButton btn_kopi = new JButton();
    ImageIcon background5 = new ImageIcon("src/asetImage/Group 25.jpg");
    
    JButton btn_keluar = new JButton();
    ImageIcon background6 = new ImageIcon("src/asetImage/Group 22.jpg");
    JButton btn_kembali = new JButton();
   ImageIcon background7 = new ImageIcon("src/asetImage/Group 24.png");
    JButton btn_lanjut = new JButton();
    ImageIcon background8 = new ImageIcon("src/asetImage/Group 23.png");
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Minuman.png");
    
    public MenuMinuman(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
             
        
        lbl_menuminuman.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_menuminuman.setText("Menu Minuman");
        lbl_menuminuman.setForeground(Color.black);
        lbl_menuminuman.setBounds(30, 30, 400, 42);
        //this.getContentPane().add(lbl_menuminuman);
        
        
        //Button teh manis panas
        //btn_tehmanispanas.setIcon(background1);
        btn_tehmanispanas.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_tehmanispanas.setText("tmd");
        btn_tehmanispanas.setBounds(310, 213, 59, 17);
        Border empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_tehmanispanas.setBorder(new CompoundBorder(null, empty));
        btn_tehmanispanas.setBackground(new Color(252, 197, 0));
        btn_tehmanispanas.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_tehmanispanas.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_tehmanispanas.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_tehmanispanas);
        btn_tehmanispanas.addActionListener(this);
        
        //Button teh manis dingin
        //btn_tehmanisdingin.setIcon(background2);
        btn_tehmanisdingin.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_tehmanisdingin.setText("tmp");
        btn_tehmanisdingin.setBounds(310, 311, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_tehmanisdingin.setBorder(new CompoundBorder(null, empty));
        btn_tehmanisdingin.setBackground(new Color(252, 197, 0));
        btn_tehmanisdingin.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_tehmanisdingin.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_tehmanisdingin.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_tehmanisdingin);
        btn_tehmanisdingin.addActionListener(this);
        
       
        //Button es jeruk
        //btn_esjeruk.setIcon(background4);
        btn_esjeruk.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_esjeruk.setText("ej");
        btn_esjeruk.setBounds(310, 416, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_esjeruk.setBorder(new CompoundBorder(null, empty));
        btn_esjeruk.setBackground(new Color(252, 197, 0));
        btn_esjeruk.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_esjeruk.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_esjeruk.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_esjeruk);
        btn_esjeruk.addActionListener(this);
        
        //Button air mineral
        //btn_airmineral.setIcon(background3);
        btn_airmineral.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_airmineral.setText("am");
        btn_airmineral.setBounds(310, 512, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_airmineral.setBorder(new CompoundBorder(null, empty));
        btn_airmineral.setBackground(new Color(252, 197, 0));
        btn_airmineral.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_airmineral.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_airmineral.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_airmineral);
        btn_airmineral.addActionListener(this);
        
        //Button kopi
        //btn_kopi.setIcon(background5);
        btn_kopi.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kopi.setText("kp");
        btn_kopi.setBounds(310, 626, 59, 17);
        empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_kopi.setBorder(new CompoundBorder(null, empty));
        btn_kopi.setBackground(new Color(252, 197, 0));
        btn_kopi.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_kopi.setBackground(new Color(255, 196, 0));
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_kopi.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_kopi);
        btn_kopi.addActionListener(this);
        
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
        //btn_lanjut.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1);
    }
    
    public void actionPerformed(ActionEvent ae){
    if(ae.getSource().equals(btn_tehmanispanas)){
        DetailJumlah.pilihan = "Es Teh Manis";
        DetailJumlah.hargaporsi = 5000;        
        DetailJumlah.idProduk1 = "4";
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_tehmanisdingin )){
        DetailJumlah.pilihan = "Teh Hangat";
        DetailJumlah.hargaporsi = 5000;
        DetailJumlah.idProduk1 = "12";
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_esjeruk)){
        DetailJumlah.pilihan = "Es Jeruk";
        DetailJumlah.hargaporsi = 5000;
        DetailJumlah.idProduk1 = "13";
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_airmineral)){
        DetailJumlah.pilihan = "Air Mineral";
        DetailJumlah.hargaporsi = 3000;
        DetailJumlah.idProduk1 = "1";
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    else if(ae.getSource().equals(btn_kopi)){
        DetailJumlah.pilihan = "Kopi";
        DetailJumlah.hargaporsi = 5000;
        DetailJumlah.idProduk1 = "5";
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

package rumahmakan;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.util.Arrays;
import java.util.List;

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
    ImageIcon background = new ImageIcon("src/asetImage/Group 30.png");
    
    public MenuMinuman(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
             
        
        lbl_menuminuman.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_menuminuman.setText("Menu Minuman");
        lbl_menuminuman.setForeground(Color.black);
        lbl_menuminuman.setBounds(30, 30, 400, 42);
        this.getContentPane().add(lbl_menuminuman);
        
        
        //Button teh manis panas
        btn_tehmanispanas.setIcon(background1);
        btn_tehmanispanas.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_tehmanispanas.setText("tmp");
        btn_tehmanispanas.setBounds(344, 100, 58, 42);
        this.getContentPane().add(btn_tehmanispanas);
        btn_tehmanispanas.addActionListener(this);
        
        //Button teh manis dingin
        btn_tehmanisdingin.setIcon(background2);
        btn_tehmanisdingin.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_tehmanisdingin.setText("tmd");
        btn_tehmanisdingin.setBounds(344, 162, 58, 42);
        this.getContentPane().add(btn_tehmanisdingin);
        btn_tehmanisdingin.addActionListener(this);
        
        //Button air mineral
        btn_airmineral.setIcon(background3);
        btn_airmineral.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_airmineral.setText("am");
        btn_airmineral.setBounds(344, 285, 58, 42);
        this.getContentPane().add(btn_airmineral);
        btn_airmineral.addActionListener(this);
        
        //Button es jeruk
        btn_esjeruk.setIcon(background4);
        btn_esjeruk.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_esjeruk.setText("ej");
        btn_esjeruk.setBounds(344, 223, 58, 42);
        this.getContentPane().add(btn_esjeruk);
        btn_esjeruk.addActionListener(this);
        
        //Button kopi
        btn_kopi.setIcon(background5);
        btn_kopi.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kopi.setText("kp");
        btn_kopi.setBounds(344, 347, 58, 42);
        this.getContentPane().add(btn_kopi);
        btn_kopi.addActionListener(this);
        
        //Button keluar
        btn_keluar.setIcon(background6);
        btn_keluar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar.setText("LO");
        btn_keluar.setBounds(30, 400, 58, 42);
        this.getContentPane().add(btn_keluar);
        btn_keluar.addActionListener(this);
        
        //Button kembali
        btn_kembali.setIcon(background7);
        btn_kembali .setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali .setText("<");
        btn_kembali .setBounds(152, 400, 58, 42);
        this.getContentPane().add(btn_kembali );
        btn_kembali .addActionListener(this);
        
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
    if(ae.getSource().equals(btn_tehmanispanas)){
        DetailJumlah.pilihan = "Teh Manis";
        DetailJumlah.hargaporsi = 3000;        
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_tehmanisdingin )){
        DetailJumlah.pilihan = "Es Teh Manis";
        DetailJumlah.hargaporsi = 5000;
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_esjeruk)){
        DetailJumlah.pilihan = "Es Jeruk";
        DetailJumlah.hargaporsi = 5000;
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_airmineral)){
        DetailJumlah.pilihan = "Air Mineral";
        DetailJumlah.hargaporsi = 3000;
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    else if(ae.getSource().equals(btn_kopi)){
        DetailJumlah.pilihan = "Kopi";
        DetailJumlah.hargaporsi = 5000;
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

package rumahmakan;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.util.Arrays;
import java.util.List;

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
    ImageIcon background = new ImageIcon("src/asetImage/Group 29.png");
    
    
    public MenuCemilan(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_menucemilan.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_menucemilan.setText("Menu Cemilan");
        lbl_menucemilan.setForeground(Color.black);
        lbl_menucemilan.setBounds(30, 30, 400, 42);
        this.getContentPane().add(lbl_menucemilan);
        
        
        //Button keripik singkong
        btn_keripiksingkong.setIcon(background1);
        btn_keripiksingkong.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keripiksingkong.setText("KS");
        btn_keripiksingkong.setBounds(344, 100, 58, 42);
        this.getContentPane().add(btn_keripiksingkong);
        btn_keripiksingkong.addActionListener(this);
        
        //Button keripik udang
        btn_keripikudang.setIcon(background2);
        btn_keripikudang.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keripikudang.setText("KU");
        btn_keripikudang.setBounds(344, 162, 58, 42);
        this.getContentPane().add(btn_keripikudang);
        btn_keripikudang.addActionListener(this);
        
        //Button gorengan
        btn_gorengan.setIcon(background3);
        btn_gorengan.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_gorengan.setText("GR");
        btn_gorengan.setBounds(344, 223, 58, 42);
        this.getContentPane().add(btn_gorengan);
        btn_gorengan.addActionListener(this);
        
        //Button otak-otak
        btn_otakotak.setIcon(background4);
        btn_otakotak.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_otakotak.setText("OO");
        btn_otakotak.setBounds(344, 285, 58, 42);
        this.getContentPane().add(btn_otakotak);
        btn_otakotak.addActionListener(this);
        
        //Button tempe tahu
        btn_tempetahu.setIcon(background5);
        btn_tempetahu.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_tempetahu.setText("TT");
        btn_tempetahu.setBounds(344, 347, 58, 42);
        this.getContentPane().add(btn_tempetahu);
        btn_tempetahu.addActionListener(this);
        
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
    if(ae.getSource().equals(btn_keripiksingkong)){
        DetailJumlah.pilihan = "Keripik Singkong";
        DetailJumlah.hargaporsi = 2000;
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_keripikudang )){
        DetailJumlah.pilihan = "Keripik Udang";
        DetailJumlah.hargaporsi = 2000;
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_otakotak)){
        DetailJumlah.pilihan = "Otak Otak";
        DetailJumlah.hargaporsi = 3000;
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_gorengan)){
        DetailJumlah.pilihan = "Gorengan";
        DetailJumlah.hargaporsi = 1000;
        setVisible(false);
            DetailJumlah fh = new DetailJumlah();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    else if(ae.getSource().equals(btn_tempetahu)){
        DetailJumlah.pilihan = "Tahu Tempe";
        DetailJumlah.hargaporsi = 2000;
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

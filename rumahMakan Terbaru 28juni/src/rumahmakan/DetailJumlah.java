package rumahmakan;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.util.Arrays;
import java.util.List;

public class DetailJumlah extends JFrame implements ActionListener{
    public static String pilihan;
    public static double hargaporsi;
    
    JLabel lbl_DetailJumlah = new JLabel();
    
    JLabel lbl_pesanan = new JLabel();
   
    
    JTextField txt_jmlpesanan = new JTextField();
    
    
    JButton btn_keluar = new JButton();
    ImageIcon background1 = new ImageIcon("src/asetImage/Group 22.jpg");
    JButton btn_kembali = new JButton();
    ImageIcon background2= new ImageIcon("src/asetImage/Group 24.png");
    JButton btn_lanjut = new JButton();
    ImageIcon background3= new ImageIcon("src/asetImage/Group 23.png");
    
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Group 27.png");
    
    
    public DetailJumlah(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_DetailJumlah.setFont(new Font("Tahoma", Font.BOLD,20));
        lbl_DetailJumlah.setText("Detail Jumlah Pesanan");
        lbl_DetailJumlah.setForeground(Color.black);
        lbl_DetailJumlah.setBounds(60, 20, 300, 60);
            this.getContentPane().add(lbl_DetailJumlah);
        
        //menampilkan nama makanan yang dipesan
        lbl_pesanan.setFont(new Font("Tahoma", Font.BOLD,20));    
        lbl_pesanan.setText(DetailJumlah.pilihan);  
        lbl_pesanan.setForeground(Color.black);
        lbl_pesanan.setBounds(new Rectangle(30,150,200,30));
        this.getContentPane().add(lbl_pesanan);   
        
        //JUMLAH MAKANAN YANG DI PESAN
        txt_jmlpesanan.setBounds(new Rectangle(270,150,100,30));
        this.getContentPane().add(txt_jmlpesanan);
        
        //Button keluar
        btn_keluar.setIcon(background1);
        btn_keluar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar.setText("lo");
        btn_keluar.setBounds(30, 400, 58, 42);
        this.getContentPane().add(btn_keluar);
        btn_keluar.addActionListener(this);
        
        //Button kembali
        btn_kembali.setIcon(background2);
        btn_kembali .setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali .setText("<");
        btn_kembali .setBounds(120, 350, 58, 42);
        this.getContentPane().add(btn_kembali );
        btn_kembali .addActionListener(this);
        
        //Button lanjut
        btn_lanjut.setIcon(background3);
        btn_lanjut.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_lanjut.setText(">");
        btn_lanjut.setBounds(210, 350, 58, 42);
        this.getContentPane().add(btn_lanjut);
        btn_lanjut.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,500);
        this.getContentPane().add(label1);
    }
    
    
    public void actionPerformed(ActionEvent ae){   
    
    if(ae.getSource().equals(btn_keluar)){
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
        Pesanan.tambahPesanan(pilihan, hargaporsi, Double.parseDouble(txt_jmlpesanan.getText()));
        setVisible(false);
            Rincianlama fh = new Rincianlama();            
            fh.setSize(450, 730);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    }
}


package rumahmakan2;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.event.*;
import java.util.Arrays;
import java.util.List;
import javax.swing.table.DefaultTableModel;

public class Pembayaran extends JFrame implements ActionListener{
   
    JLabel lbl_Pembayaran = new JLabel();
    
    JTextField txt_biayatotal = new JTextField();
        
        
    JButton btn_keluar = new JButton();
    JButton btn_kembali = new JButton();
    JButton btn_lanjut = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Splash screen – 2.png");
    
    public void hitungTotalHarga(){
        double total = 0;
        for(int i = 0; i < Akun.akunYangSedangLogin.arrayPesanan.size(); i++) {
            total += Akun.akunYangSedangLogin.arrayPesanan.get(i).totalharga;
        }
        txt_biayatotal.setText(Double.toString(total));
    }
    
    public Pembayaran(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_Pembayaran.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_Pembayaran.setText("Biaya Total");
        lbl_Pembayaran.setForeground(Color.black);
        lbl_Pembayaran.setBounds(120, 60, 200, 60);
        this.getContentPane().add(lbl_Pembayaran);
        
        //OUTPUT BIAYA
        txt_biayatotal.setBounds(new Rectangle(100,170,225,60));
        txt_biayatotal.setFont(new Font("Tahoma",Font.BOLD,20));
        txt_biayatotal.setText("81200");
        this.getContentPane().add(txt_biayatotal);
      
        
        //Button keluar
        btn_keluar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar.setText("LO");
        btn_keluar.setBounds(30, 350, 58, 42);
        this.getContentPane().add(btn_keluar);
        btn_keluar.addActionListener(this);
        
        //Button kembali
        btn_kembali .setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali .setText("<");
        btn_kembali .setBounds(120, 350, 58, 42);
        this.getContentPane().add(btn_kembali );
        btn_kembali.addActionListener(this);
        
        //Button lanjut
        btn_lanjut.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_lanjut.setText(">");
        btn_lanjut.setBounds(210, 350, 58, 42);
        this.getContentPane().add(btn_lanjut);
        btn_lanjut.addActionListener(this);
        
        hitungTotalHarga();
                        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1); 
    }
    
    
    
    public void actionPerformed(ActionEvent ae){   
    
    if(ae.getSource().equals(btn_keluar)){
        setVisible(false);
            Login fh = new Login();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    
    else if(ae.getSource().equals(btn_kembali)){
        setVisible(false);
            Rincianlama fh = new Rincianlama();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_lanjut)){
        setVisible(false);
            Login fh = new Login();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    }
}

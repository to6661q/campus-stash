package Admin;


import subMenu.LoginHRD;
import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.io.IOException;
import java.util.Arrays;
import java.util.List;


public class MenuHRD extends JFrame implements ActionListener{
    
    JLabel lbl_MenuUtama = new JLabel();
    
    JButton btn_pegawai = new JButton();
    
    //DEKLARASII BUTTON
    JButton btn_daftarMkn = new JButton();
    JButton btn_tambah = new JButton();
    JButton btn_barangSup = new JButton();
    JButton btn_pelanggan = new JButton();
    JButton btn_pesanan = new JButton();
    JButton btn_out = new JButton();
    
    JButton btn_kembali = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Utama.png");
    Object window = this;
    
    public MenuHRD(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_MenuUtama.setFont(new Font("Tahoma", Font.BOLD,16));
        lbl_MenuUtama.setText("HRD");
        lbl_MenuUtama.setForeground(Color.black);
        lbl_MenuUtama.setBounds(36, 63, 96, 29);
        this.getContentPane().add(lbl_MenuUtama);
        
        
        //Button Menu 1
        btn_pegawai.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_pegawai.setText("Pegawai");
        btn_pegawai.setBounds(59, 189, 312, 64);
        this.getContentPane().add(btn_pegawai);
        btn_pegawai.addActionListener(this);
        
        //Button Menu 2
        btn_tambah.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_tambah.setText("Tambah Pegawai");
        btn_tambah.setBounds(59, 268, 312, 64);
        this.getContentPane().add(btn_tambah);
        btn_tambah.addActionListener(this);
        
        //Button Log Out to login admin
        btn_out.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_out.setText("LO");
        btn_out.setBounds(365, 64, 30, 30);
        this.getContentPane().add(btn_out);
        btn_out.addActionListener(this);
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
       if(ae.getSource().equals(btn_pegawai)){
        setVisible(false);
        Frame pw = new FramePegawai();
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
       }
 
    else if(ae.getSource().equals(btn_tambah)){
        setVisible(false);
        FrameTambahPegawai pw = new FrameTambahPegawai();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);

        } 
    else if(ae.getSource().equals(btn_out)){
        setVisible(false);
        LoginHRD pw = new LoginHRD();            
        pw.setSize(430, 812);
        pw.setLocationRelativeTo(null);
        pw.setResizable(false);
        pw.setVisible(true);
          }         
    }
    
    public static void main(String[] args) {
        MenuHRD edfh = new MenuHRD();
        edfh.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        edfh.setSize (430, 812);
        edfh.setLocationRelativeTo (null);
        edfh.setVisible(true);
    }
}

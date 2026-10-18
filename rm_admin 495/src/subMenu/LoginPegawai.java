package subMenu;

import subMenu.LoginAdmin;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.JTextField;
import java.awt.Image;
import java.awt.Toolkit;
import java.io.IOException;
import java.rmi.server.ObjID;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import subMenu.MenuPegawai_1;

public class LoginPegawai extends JFrame implements ActionListener, FocusListener{
   
    
    
    //DEKLARASI        
    JLabel lbl_MASUKAN = new JLabel();
    
    //masukkan data login
    JLabel lbl_id_pegawainame = new JLabel();
    JTextField txt_id_pegawainame = new JTextField(); 
    JLabel lbl_password = new JLabel();
    JPasswordField txt_PASSWORD = new JPasswordField ();
    
    //check box untuk show password
    JCheckBox cb = new JCheckBox("Show Password");
    
    
    JButton btn_LOGIN = new JButton(); /*tombol enter atau OK*/
    JButton btn_RESET = new JButton(); /*tombol delete*/
    JButton btn_Back = new JButton();
    
    
    JLabel lbl_WALLPAPER = new JLabel();
    
    
    JLabel lbl_bg = new JLabel("", JLabel.CENTER);
    ImageIcon background = new ImageIcon("src/image/polos.jpg");
    
    

  //DEKLARASI OBJEK
    int login = 0;
    String pass;
    public static String namaAkun;
    Object window = this;
    String admin = "Pegawai";
    String admin1 = "Pegawai";
    
    public LoginPegawai (){
        
      //TITLE BAR
        this.getContentPane().setLayout(null);
        this.setTitle ("Login Pegawai");
        
        lbl_MASUKAN.setFont (new Font("Market Deco", Font.BOLD,30));
        lbl_MASUKAN.setText ("Sign In Pegawai");
        lbl_MASUKAN.setForeground(Color.black);
        lbl_MASUKAN.setBounds(70, 100, 300, 60);
        this.getContentPane().add(lbl_MASUKAN);
        
      //btn LOGIN
        btn_LOGIN.setText("E N T E R");
        btn_LOGIN.setFont(new Font("Tahoma",Font.BOLD,12));
        btn_LOGIN.setBounds(30, 530, 370, 42);
        btn_LOGIN.setBackground(Color.BLACK);
        btn_LOGIN.setForeground(Color.WHITE);
        this.getContentPane().add(btn_LOGIN);
        btn_LOGIN.addActionListener (this);
        
      //btn RESET
        btn_RESET.setText("R E S E T");
        btn_RESET.setFont(new Font("Tahoma",Font.BOLD,12));
        btn_RESET.setBounds(30, 580, 370, 42);
        btn_RESET.setBackground(Color.BLACK);
        btn_RESET.setForeground(Color.WHITE);
        this.getContentPane().add(btn_RESET);
        btn_RESET.addActionListener(this);
        
       //btn Back
        btn_Back.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_Back.setText("B A C K");
        btn_Back.setBounds(30, 630, 370, 42);
        btn_Back.setBackground(Color.BLACK);
        btn_Back.setForeground(Color.WHITE);
        this.getContentPane().add(btn_Back);
        btn_Back.addActionListener(this);
        
        //COLOR BACKGROUND

        lbl_id_pegawainame.setFont (new Font("Market Deco", Font.BOLD,20));
        lbl_id_pegawainame.setText ("ID Pegawai");
        lbl_id_pegawainame.setForeground(Color.black);
        lbl_id_pegawainame.setBounds(60, 210, 200, 60);
        this.getContentPane().add(lbl_id_pegawainame);

        //id_pegawainame
        txt_id_pegawainame.setFont (new Font("CONSOLAS", Font.BOLD,12));
        //txt_id_pegawainame.setForeground(Color.GRAY);
        txt_id_pegawainame.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        txt_id_pegawainame.setBounds(30,260,370,42);
        txt_id_pegawainame.setText("");
        this.getContentPane().add(txt_id_pegawainame);
        txt_id_pegawainame.addFocusListener(this);
        
        lbl_password.setFont (new Font("Market Deco", Font.BOLD,20));
        lbl_password.setText ("Password");
        lbl_password.setForeground(Color.black);
        lbl_password.setBounds(60, 300, 200, 60);
        this.getContentPane().add(lbl_password);
        
        cb.setBounds(103,420,340,30);
        cb.setBackground(new Color(255,248,220));
        cb.addActionListener(this);
        this.getContentPane().add(cb);
        
         //PASSWORD
        txt_PASSWORD.setFont (new Font("CONSOLAS", Font.BOLD,12));
        txt_PASSWORD.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        txt_PASSWORD.setBounds(30,350,370,42);
        txt_PASSWORD.setText("");
        this.getContentPane().add(txt_PASSWORD);
        txt_PASSWORD.addFocusListener(this);
        
        //background
        lbl_bg.setIcon(background);
        lbl_bg.setSize(430,812);
        this.getContentPane().add(lbl_bg);
    }
    
    //RESET
    public void reset(){              
        txt_PASSWORD.setText("Enter Your Password!");
        txt_id_pegawainame.setText("Enter Your ID!");
    }
    
    //CEK KOSONG PADA FIELDS  
    public String cek_kosong(){
        set_data();
        String hasil = "";
        if(txt_PASSWORD.getText().trim().equals("")){
            hasil = "Password masih kosong";
        }
        else{
            hasil = "valid";
        }
        return hasil;
    }
    
    //SET DATA      
    public void set_data(){
         pass = txt_PASSWORD.getText().toString().trim();
    }
    

    @Override
    public void actionPerformed(ActionEvent e) {
        
        //LOG IN
        if(e.getSource().equals(btn_LOGIN)){ 
               
            //
            String cek = cek_kosong();
            String pass = txt_PASSWORD.getText().trim();
                
                
            Boolean apakahBerhasil = false;
               
 
            if(admin.equals(txt_id_pegawainame.getText())) {
                if(admin1.equals(txt_PASSWORD.getText())) {
                            
                apakahBerhasil = true;
                            
                }
            }
 
            if(apakahBerhasil == true) {
                //untuk menampilkan keterangan login
                JOptionPane.showMessageDialog(null, "Berhasil Login admin!");
                
                MenuPegawai_1 fh = new MenuPegawai_1();
           
                fh.addWindowListener(new WindowAdapter(){      
                    public void windowClosing(WindowEvent e){
                        ((Component) window).setEnabled(true);
                    }
                });
                    
                ((Component) window).setVisible(false);
                fh.setSize(430, 812);
                fh.setLocationRelativeTo(null);
                fh.setResizable(false);
                fh.setVisible(true);
                    
 
            } 
            
            else {
                    //untuk menampilkan keterangan login
                    JOptionPane.showMessageDialog(null, "Gagal Login Pastikan ID Admin dan Password Benar!");
                    
            }
         
        }
        
        //Check box to view Password
        if(cb.isSelected()){
            txt_PASSWORD.setEchoChar((char)0);
        }
        else{
            txt_PASSWORD.setEchoChar('*');
        }
        
        //RESET
        if(e.getSource().equals(btn_RESET)){
            reset();            
        }
        
        else if(e.getSource().equals(btn_Back)){
        setVisible(false);
            LoginAdmin fh = new LoginAdmin();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    }
    
 //GHOST TEXT
    public void focusGained(FocusEvent fe){
        if(txt_PASSWORD.hasFocus()){
            if (txt_PASSWORD.getText().equals("Enter Your Password!")){
                txt_PASSWORD.setText("");
                txt_PASSWORD.setForeground(Color.BLACK);
            }
        }
        if(txt_id_pegawainame.hasFocus()){
                txt_id_pegawainame.setText("");
                txt_id_pegawainame.setForeground(Color.BLACK);
            
        } 
    }   
    
//GHOST TEXT (Membuat pengisian password menjadi disamarkan) 
    public void focusLost(FocusEvent fe){
        if(txt_PASSWORD.getText().equals("")){
            txt_PASSWORD.setText("Enter Your Password!");
            txt_PASSWORD.setForeground(Color.GRAY);
        }
        if (txt_id_pegawainame.getText().equals("")){
                txt_id_pegawainame.setText("Enter Your ID!");
                txt_id_pegawainame.setForeground(Color.BLACK);
        }
    }
}

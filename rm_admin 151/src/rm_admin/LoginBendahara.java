package rm_admin;

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

public class LoginBendahara extends JFrame implements ActionListener, FocusListener{
   
    
    
    //DEKLARASI        
    JLabel lbl_MASUKAN = new JLabel();
    JLabel lbl_id_pegawainame = new JLabel();
    JTextField txt_id_pegawainame = new JTextField(); 
    JLabel lbl_password = new JLabel();
    JCheckBox cb = new JCheckBox("Show Password");
    JPasswordField txt_PASSWORD = new JPasswordField ();
    JButton btn_LOGIN = new JButton(); /*tombol enter atau OK*/
    JButton btn_RESET = new JButton(); /*tombol delete*/
    JLabel lbl_WALLPAPER = new JLabel();
    JLabel lbl_kata = new JLabel();
    JButton btn_signup = new JButton();
    JLabel lbl_bg = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Group 46.png");
    
    

  //DEKLARASI OBJEK
    int login = 0;
    String pass;
    public static String namaAkun;
    Object window = this;
    String admin = "Bendahara";
    String admin1 = "Bendahara";
    
    public LoginBendahara (){
      //TITLE BAR
        this.getContentPane().setLayout(null);
        this.setTitle ("Rumah Makan");
        
      //MASUKAN PASS
        lbl_MASUKAN.setFont (new Font("Market Deco", Font.BOLD,30));
        lbl_MASUKAN.setText ("Sign In Owner");
        lbl_MASUKAN.setForeground(Color.black);
        lbl_MASUKAN.setBounds(30, 20, 300, 60);
        this.getContentPane().add(lbl_MASUKAN);
        
      //LOGIN
        btn_LOGIN.setText("E N T E R");
        btn_LOGIN.setFont(new Font("CONSOLAS",Font.BOLD,15));
        btn_LOGIN.setBounds(124, 530, 183, 42);
        btn_LOGIN.setBackground(Color.BLACK);
        btn_LOGIN.setForeground(Color.WHITE);
        this.getContentPane().add(btn_LOGIN);
        btn_LOGIN.addActionListener (this);
        
      //RESET
        btn_RESET.setText("R E S E T");
        btn_RESET.setFont(new Font("CONSOLAS",Font.BOLD,15));
        btn_RESET.setBounds(30, 350, 350, 30);
        btn_RESET.setBackground(Color.BLACK);
        btn_RESET.setForeground(Color.WHITE);
        //this.getContentPane().add(btn_RESET);
        btn_RESET.addActionListener(this);
        
        lbl_kata.setFont (new Font("Market Deco", Font.BOLD,12));
        lbl_kata.setText ("Anda belum punya akun?");
        lbl_kata.setForeground(Color.black);
        lbl_kata.setBounds(148, 623, 200, 60);
        //this.getContentPane().add(lbl_kata);
        
//        btn_signup.setText("Tambah Pegawai");
//        btn_signup.setFont(new Font("CONSOLAS",Font.BOLD,15));
//        btn_signup.setBounds(124, 623, 183, 39);
//        btn_signup.setBackground(Color.BLACK);
//        btn_signup.setForeground(Color.WHITE);
//        this.getContentPane().add(btn_signup);
//        btn_signup.addActionListener(this);
        
        
        //COLOR BACKGROUND

        lbl_id_pegawainame.setFont (new Font("Market Deco", Font.BOLD,20));
        lbl_id_pegawainame.setText ("ID Pegawai");
        lbl_id_pegawainame.setForeground(Color.black);
        lbl_id_pegawainame.setBounds(60, 80, 200, 60);
        //this.getContentPane().add(lbl_id_pegawainame);

        //id_pegawainame
        txt_id_pegawainame.setFont (new Font("CONSOLAS", Font.BOLD,12));
        //txt_id_pegawainame.setForeground(Color.GRAY);
        txt_id_pegawainame.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        txt_id_pegawainame.setBounds(141,341,167,18);
        txt_id_pegawainame.setText("");
        this.getContentPane().add(txt_id_pegawainame);
        txt_id_pegawainame.addFocusListener(this);
        
        lbl_password.setFont (new Font("Market Deco", Font.BOLD,20));
        lbl_password.setText ("Password");
        lbl_password.setForeground(Color.black);
        lbl_password.setBounds(60, 170, 200, 60);
        //this.getContentPane().add(lbl_password);
        
        cb.setBounds(103,478,340,30);
        cb.setBackground(new Color(255,248,220));
        cb.addActionListener(this);
        this.getContentPane().add(cb);
        
         //PASSWORD
        txt_PASSWORD.setFont (new Font("CONSOLAS", Font.BOLD,12));
        txt_PASSWORD.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        txt_PASSWORD.setBounds(141,428,167,18);
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
                //untuk membuat nomer pesanan
                //Akun.jumlahPesanan++;
                // isi di txt
                // txt_nopesanan.setText(Integer.toString(Akun.jumlahPesanan));
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
                    SignUp fh = new SignUp();
           
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
                    
                    
                    //untuk menghapus isi pesanan dan kosong lagi
                           Akun.akunYangSedangLogin.arrayPesanan.clear();
                    
                } else {
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
        
//        else if(e.getSource().equals(btn_signup)){
//        setVisible(false);
//            SignUp fh = new SignUp();            
//            fh.setSize(430, 812);
//            fh.setLocationRelativeTo(null);
//            fh.setResizable(false);
//            fh.setVisible(true);
//        }
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
                txt_id_pegawainame.setText("Enter Your Username!");
                txt_id_pegawainame.setForeground(Color.BLACK);
        }
    }
}

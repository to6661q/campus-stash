package rumahmakan;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.JTextField;
import java.awt.Image;
import java.awt.Toolkit;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Login extends JFrame implements ActionListener, FocusListener{
   
    
    
    //DEKLARASI
    JLabel lbl_MASUKAN = new JLabel();
    JLabel lbl_username = new JLabel();
    JTextField txt_username = new JTextField(); 
    JLabel lbl_password = new JLabel();
    JPasswordField txt_PASSWORD = new JPasswordField ();
    JButton btn_LOGIN = new JButton(); /*tombol enter atau OK*/
    JButton btn_RESET = new JButton(); /*tombol delete*/
    JLabel lbl_WALLPAPER = new JLabel();
    JLabel lbl_kata = new JLabel();
    JButton btn_signup = new JButton();
    
    
    

  //DEKLARASI OBJEK
    int login = 0;
    String pass;
    public static String namaAkun;
    
    public Login (){
      //TITLE BAR
        this.getContentPane().setLayout(null);
        this.setTitle ("Rumah Makan");
        
      //MASUKAN PASS
        lbl_MASUKAN.setFont (new Font("Market Deco", Font.BOLD,30));
        lbl_MASUKAN.setText ("Sign In");
        lbl_MASUKAN.setForeground(Color.black);
        lbl_MASUKAN.setBounds(140, 20, 200, 60);
        this.getContentPane().add(lbl_MASUKAN);
        
      //LOGIN
        btn_LOGIN.setText("E N T E R");
        btn_LOGIN.setFont(new Font("CONSOLAS",Font.BOLD,15));
        btn_LOGIN.setBounds(30, 290, 350, 30);
        btn_LOGIN.setBackground(Color.BLACK);
        btn_LOGIN.setForeground(Color.WHITE);
        this.getContentPane().add(btn_LOGIN);
        btn_LOGIN.addActionListener (this);
        
      //RESET
        btn_RESET.setText("R E S E T");
        btn_RESET.setFont(new Font("CONSOLAS",Font.BOLD,15));
        btn_RESET.setBounds(30, 330, 350, 30);
        btn_RESET.setBackground(Color.BLACK);
        btn_RESET.setForeground(Color.WHITE);
        this.getContentPane().add(btn_RESET);
        btn_RESET.addActionListener(this);
        
        lbl_kata.setFont (new Font("Market Deco", Font.BOLD,12));
        lbl_kata.setText ("Anda belum punya akun?");
        lbl_kata.setForeground(Color.black);
        lbl_kata.setBounds(70, 390, 200, 60);
        this.getContentPane().add(lbl_kata);
        
        btn_signup.setText("Sign Up");
        btn_signup.setFont(new Font("CONSOLAS",Font.BOLD,15));
        btn_signup.setBounds(240, 410, 100, 30);
        btn_signup.setBackground(Color.BLACK);
        btn_signup.setForeground(Color.WHITE);
        this.getContentPane().add(btn_signup);
        btn_signup.addActionListener(this);
        
        
        //COLOR BACKGROUND

        lbl_username.setFont (new Font("Market Deco", Font.BOLD,20));
        lbl_username.setText ("Username");
        lbl_username.setForeground(Color.black);
        lbl_username.setBounds(60, 80, 200, 60);
        this.getContentPane().add(lbl_username);

        //username
        txt_username.setFont (new Font("CONSOLAS", Font.BOLD,12));
        txt_username.setForeground(Color.GRAY);
        txt_username.setBounds(40,130,340,30);
        txt_username.setText("Enter Your Username!");
        this.getContentPane().add(txt_username);
        txt_username.addFocusListener(this);
        
        lbl_password.setFont (new Font("Market Deco", Font.BOLD,20));
        lbl_password.setText ("Password");
        lbl_password.setForeground(Color.black);
        lbl_password.setBounds(60, 170, 200, 60);
        this.getContentPane().add(lbl_password);
        
         //PASSWORD
        txt_PASSWORD.setFont (new Font("CONSOLAS", Font.BOLD,12));
        txt_PASSWORD.setForeground(Color.GRAY);
        txt_PASSWORD.setBounds(40,220,340,30);
        txt_PASSWORD.setText("Enter Your Password!");
        this.getContentPane().add(txt_PASSWORD);
        txt_PASSWORD.addFocusListener(this);
    }
    
    //RESET
    public void reset(){
        txt_PASSWORD.setText("Enter Your Password!");
        txt_username.setText("Enter Your Username!");
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
            
                String cek = cek_kosong();
                String pass = txt_PASSWORD.getText().trim();
                ArrayList<Akun> arrayAkun = Akun.arrayAkun;
                
                Boolean apakahBerhasil = false;
                for(int i = 0; i < arrayAkun.size(); i++ ) {
                    Akun akun = arrayAkun.get(i);
                    if(akun.user.equals(txt_username.getText())) {
                        if(akun.password.equals(txt_PASSWORD.getText())) {
                            Akun.akunYangSedangLogin = akun;
                            apakahBerhasil = true;
                            break;
                        }
                    }
                }
                if(apakahBerhasil == true) {
                    //untuk menampilkan keterangan login
                    JOptionPane.showMessageDialog(null, "Berhasil Login!");
                    MenuUtama fh = new MenuUtama();
                    fh.setSize(430, 500);
                    fh.setLocationRelativeTo(null);
                    fh.setResizable(false);
                    fh.setVisible(true);
                    
                } else {
                    //untuk menampilkan keterangan login
                    JOptionPane.showMessageDialog(null, "Gagal Login Pastikan Ussername dan Password Benar!");
                    
                }
         
        }
        
        //RESET
        if(e.getSource().equals(btn_RESET)){
            reset();            
        }
        
        else if(e.getSource().equals(btn_signup)){
        setVisible(false);
            SignUp fh = new SignUp();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }
    }
    
 //GHOST TEXT
    public void focusGained(FocusEvent fe){
        if(txt_PASSWORD.hasFocus()){
            if (txt_PASSWORD.getText().equals("Password")){
                txt_PASSWORD.setText("");
                txt_PASSWORD.setForeground(Color.BLACK);
            }
        }
    }   
    
//GHOST TEXT (Membuat pengisian password menjadi disamarkan) 
    public void focusLost(FocusEvent fe){
        if(txt_PASSWORD.getText().equals("")){
            txt_PASSWORD.setText("Password");
            txt_PASSWORD.setForeground(Color.GRAY);
        }
    }
   
    public static void main(String[] args) throws IOException,UnsupportedLookAndFeelException, IllegalAccessException, ClassNotFoundException, InstantiationException {
        try{
            UIManager.setLookAndFeel("com.jtattoo.plaf.texture.TextureLookAndFeel");
            com.jtattoo.plaf.texture.TextureLookAndFeel.setTheme("Default","Java Swing","FROOQ");
            SwingUtilities.updateComponentTreeUI(new JMenuBar());
        } finally{
            new JMenuBar().setVisible(true);

        }
        Login edfh = new Login ();
        edfh.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        edfh.setSize (430, 500);
        edfh.setLocationRelativeTo (null);
        edfh.setVisible(true);
    }
}

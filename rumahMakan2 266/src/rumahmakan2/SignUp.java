
package rumahmakan2;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.event.*;
import java.util.Arrays;
import java.util.List;
import javax.swing.border.CompoundBorder;
import javax.swing.border.EmptyBorder;
import javax.swing.border.Border;


public class SignUp extends JFrame implements ActionListener{
    
    public static String user;
    
    JLabel lbl_SignUp = new JLabel();
    
    JLabel lbl_daftarbaru = new JLabel();
    JLabel lbl_nama = new JLabel();
    JTextField txt_nama = new JTextField();
    JLabel lbl_password = new JLabel();
    JTextField txt_password = new JTextField();
    JLabel lbl_alamat = new JLabel();
    JTextArea txt_alamat = new JTextArea();
    
    JButton btn_kembali = new JButton();
    ImageIcon background1 = new ImageIcon("src/asetImage/Group 24.png");
    JButton btn_lanjut = new JButton();
    ImageIcon background2 = new ImageIcon("src/asetImage/Group 23.png");
    JLabel lbl_bg = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Group 45_1.png");
    
    public SignUp(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_SignUp.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_SignUp.setText("Sign Up");
        lbl_SignUp.setForeground(Color.black);
        lbl_SignUp.setBounds(140, 20, 200, 60);
        //this.getContentPane().add(lbl_SignUp);
        
        lbl_nama.setFont(new Font("Tahoma", Font.BOLD,12));
        lbl_nama.setText("USERNAME");
        lbl_nama.setForeground(Color.black);
        lbl_nama.setBounds(30, 90, 90, 42);
        //this.getContentPane().add(lbl_nama);
        //nama
        txt_nama.setBounds(new Rectangle(162,336,167,18));
        txt_nama.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        txt_nama.setDocument(new onlyLetter().getOnlyLetter());
        this.getContentPane().add(txt_nama);
        
        lbl_password.setFont(new Font("Tahoma", Font.BOLD,12));
        lbl_password.setText("PASSWORD");
        lbl_password.setForeground(Color.black);
        lbl_password.setBounds(30, 115, 90, 42);
        //this.getContentPane().add(lbl_password);
        
        txt_password.setBounds(new Rectangle(162,406,167,18));
        txt_password.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        this.getContentPane().add(txt_password);
        
        //Button kembali
        btn_kembali .setIcon(background1);
        btn_kembali .setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali .setText("<");
        btn_kembali .setBounds(120, 390, 58, 42);
        //this.getContentPane().add(btn_kembali );
        btn_kembali.addActionListener(this);
        
        //Button lanjut
//        btn_lanjut.setIcon(background2);
        btn_lanjut.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_lanjut.setText("REGISTER");
        btn_lanjut.setBounds(124, 696, 183, 42);
        Border empty = new EmptyBorder(0, 10, 0, 2); // (atas, kanan, bawah, kiri)
        btn_lanjut.setBorder(new CompoundBorder(null, empty));
        btn_lanjut.setBackground(new Color(252, 197, 0));
        //MOuse Listener
        btn_lanjut.addMouseListener(new java.awt.event.MouseAdapter() {
            //Masuk mouse
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_lanjut.setBackground(new Color(255, 196, 0));
            }
            //Keluar Mouse
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_lanjut.setBackground(new Color(252, 197, 0));
            }
        });
        this.getContentPane().add(btn_lanjut);
        btn_lanjut.addActionListener(this);
        
        lbl_alamat.setFont(new Font("Tahoma", Font.BOLD,12));
        lbl_alamat.setText("Alamat :");
        lbl_alamat.setForeground(Color.black);
        lbl_alamat.setBounds(30, 160, 90, 42);
        //this.getContentPane().add(lbl_alamat);
        
        JPanel content = new JPanel();
        
        JScrollPane Spane = new JScrollPane(txt_alamat,
        JScrollPane.VERTICAL_SCROLLBAR_ALWAYS,
        JScrollPane.HORIZONTAL_SCROLLBAR_NEVER);
        Spane.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        
        txt_alamat.setFont(new Font("Tahoma", Font.BOLD,12));
        txt_alamat.setText("");
       
        txt_alamat.setLineWrap(true);
        txt_alamat.setWrapStyleWord(true);
        txt_alamat.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        content.setLayout(new BorderLayout());
        
        content.add(Spane);
        
        content.setBounds(124, 505, 205, 85);
        
        this.getContentPane().add(content);
        
         //background
        lbl_bg.setIcon(background);
        lbl_bg.setSize(430,812);
        this.getContentPane().add(lbl_bg);
    }
    
    public void actionPerformed(ActionEvent ae){   
   
    if(ae.getSource().equals(btn_kembali)){
         String cek = cek_kosong();
            if(cek.equals("Berhasil Sign Up")){
                String simpan = null;
                JOptionPane.showMessageDialog(null,simpan);
                kosong_text();
                    setVisible(false);
                    Login fh = new Login();            
                    fh.setSize(430, 812);
                    fh.setLocationRelativeTo(null);
                    fh.setResizable(false);
                    fh.setVisible(true);
                        
                         //input data ke array
                        Akun akunBaru = new Akun();
                        akunBaru.user = txt_nama.getText();
                        akunBaru.password = txt_password.getText().trim();
                        akunBaru.alamat = txt_alamat.getText();
            
                        //static data akan diakses di rincian
                        Rincianlama.nama = akunBaru.user;
                        Rincianlama.alamat = akunBaru.alamat;
            
                        //dimasukkan ke arrayAkun
                        Akun.arrayAkun.add(akunBaru);
            }
            else
            {
                JOptionPane.showMessageDialog(null, cek);
            }
        }   
    else if(ae.getSource().equals(btn_lanjut)){
            String cek = cek_kosong();
            if(cek.equals("Berhasil Sign Up")){
                String simpan = null;
             
                JOptionPane.showMessageDialog(null, "Berhasil Sign Up!");
                kosong_text();
                    setVisible(false);
                    Login fh = new Login();            
                    fh.setSize(430, 812);
                    fh.setLocationRelativeTo(null);
                    fh.setResizable(false);
                    fh.setVisible(true);
                        
                         //input data ke array
                        Akun akunBaru = new Akun();
                        akunBaru.user = txt_nama.getText();
                        akunBaru.password = txt_password.getText().trim();
                        akunBaru.alamat = txt_alamat.getText();
            
                        //static data akan diakses di rincian
                        Rincianlama.nama = akunBaru.user;
                        Rincianlama.alamat = akunBaru.alamat;
            
                        //dimasukkan ke arrayAkun
                        Akun.arrayAkun.add(akunBaru);
            }
            else
            {
                JOptionPane.showMessageDialog(null, cek);
            }
        }   
    }
    public void kosong_text(){
        txt_nama.setText("");
        txt_password.setText("");
        txt_alamat.setText("");

    }
    
    public void set_data(){
            Akun akunBaru = new Akun();
            akunBaru.user = txt_nama.getText();
            akunBaru.password = txt_password.getText().trim();
            akunBaru.alamat = txt_alamat.getText();
    
            Rincianlama.nama = akunBaru.user;
            Rincianlama.alamat = akunBaru.alamat;
            
            Akun.arrayAkun.add(akunBaru);
    }
    
  //CEK KOSONG PADA FIELDS  
    public String cek_kosong(){
        set_data();
        String hasil = "Berhasil Sign Up";
        
        if(txt_nama.getText().trim().equals("")){
            hasil = "Username masih kosong";
        }
        else if(txt_password.getText().trim().equals("")){
            hasil = "Password masih kosong";
        }
        else if(txt_alamat.getText().trim().equals("")){
            hasil = "Alamat masih kosong";
        }
        else{
            hasil = "Berhasil Sign Up";
        }
        
        return hasil;
    }
}

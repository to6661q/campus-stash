
package rumahmakan;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.event.*;
import java.util.Arrays;
import java.util.List;

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
    
    public SignUp(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_SignUp.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_SignUp.setText("Sign Up");
        lbl_SignUp.setForeground(Color.black);
        lbl_SignUp.setBounds(140, 20, 200, 60);
        this.getContentPane().add(lbl_SignUp);
        
        lbl_nama.setFont(new Font("Tahoma", Font.BOLD,12));
        lbl_nama.setText("USERNAME");
        lbl_nama.setForeground(Color.black);
        lbl_nama.setBounds(30, 90, 90, 42);
        this.getContentPane().add(lbl_nama);
        
        txt_nama.setBounds(new Rectangle(125,100,225,22));
        this.getContentPane().add(txt_nama);
        
        lbl_password.setFont(new Font("Tahoma", Font.BOLD,12));
        lbl_password.setText("PASSWORD");
        lbl_password.setForeground(Color.black);
        lbl_password.setBounds(30, 115, 90, 42);
        this.getContentPane().add(lbl_password);
        
        txt_password.setBounds(new Rectangle(125,125,225,22));
        this.getContentPane().add(txt_password);
        
        //Button kembali
        btn_kembali .setIcon(background1);
        btn_kembali .setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali .setText("<");
        btn_kembali .setBounds(120, 390, 58, 42);
        this.getContentPane().add(btn_kembali );
        btn_kembali.addActionListener(this);
        
        //Button lanjut
        btn_lanjut.setIcon(background2);
        btn_lanjut.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_lanjut.setText(">");
        btn_lanjut.setBounds(230, 390, 58, 42);
        this.getContentPane().add(btn_lanjut);
        btn_lanjut.addActionListener(this);
        
        lbl_alamat.setFont(new Font("Tahoma", Font.BOLD,12));
        lbl_alamat.setText("Alamat :");
        lbl_alamat.setForeground(Color.black);
        lbl_alamat.setBounds(30, 160, 90, 42);
        this.getContentPane().add(lbl_alamat);
        
        JPanel content = new JPanel();
        
        JScrollPane Spane = new JScrollPane(txt_alamat,
        JScrollPane.VERTICAL_SCROLLBAR_ALWAYS,
        JScrollPane.HORIZONTAL_SCROLLBAR_NEVER);
        
        txt_alamat.setFont(new Font("Tahoma", Font.BOLD,12));
        txt_alamat.setText("");
       
        txt_alamat.setLineWrap(true);
        txt_alamat.setWrapStyleWord(true);
        
        content.setLayout(new BorderLayout());
        
        content.add(Spane);
        
        content.setBounds(15, 190, 400, 150);
        
        this.getContentPane().add(content);
    }
    
    public void actionPerformed(ActionEvent ae){   
   
    if(ae.getSource().equals(btn_kembali)){
        setVisible(false);
            Login fh = new Login();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    else if(ae.getSource().equals(btn_lanjut)){
        setVisible(false);
            Login fh = new Login();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
            
            Akun akunBaru = new Akun();
            akunBaru.user = txt_nama.getText();
            akunBaru.password = txt_password.getText().trim();
            akunBaru.alamat = txt_alamat.getText();
            
            //dimasukkan ke arrayAkun
            Akun.arrayAkun.add(akunBaru);
        }   
    }
}

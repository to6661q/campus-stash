
package rumahmakan2;

import java.util.*;
import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import javax.swing.event.*;
import java.util.Calendar;
import java.util.Date;


public class SignUp extends JFrame implements ActionListener, ChangeListener, FocusListener{
    JLabel lbl_data = new JLabel ();
    
    JLabel lbl_nama = new JLabel ();
    JTextField txt_nama = new JTextField ();
    
    JLabel lbl_password = new JLabel ();
    JTextField txt_password = new JTextField ();
    
    JLabel lbl_jabatan = new JLabel();
    JTextField txt_jabatan = new JTextField(); 
    
    //Alamat
    JLabel lbl_alamat = new JLabel();
    JTextArea txt_alamat = new JTextArea();
    
    JLabel lbl_telepon = new JLabel();
    JTextField txt_telepon = new JTextField();
    
    JButton btn_back = new JButton();
    
    JButton btn_save = new JButton();
    JButton btn_refresh = new JButton();
    
    
    JLabel warning = new JLabel();
    //Deklarasi String
    String  nama_pelanggan, password, alamat_pelanggan, telepon; 
    
        public SignUp(){
        
        getContentPane().setBackground(Color.DARK_GRAY);
        this.getContentPane().setLayout(null);
        this.setTitle("Tambah Pelanggan");
        //set_id();
        
        // Label Judul
        lbl_data.setFont(new Font("Book Antiqua", Font.PLAIN,16));
        lbl_data.setText("Tambah Data Pelanggan");
        lbl_data.setBounds(30,15,250,20);
        lbl_data.setForeground(Color.white);
        this.getContentPane().add(lbl_data);
        
        // Label ID
        lbl_nama.setFont(new Font("Segoe UI", Font.PLAIN,12));
        lbl_nama.setText("Nama Pelanggan");
        lbl_nama.setBounds(30, 50, 150, 25);
        lbl_nama.setForeground(Color.white);
        this.getContentPane().add(lbl_nama);
        
        // Textfield ID
        txt_nama.setText("Masukan Nama");
        txt_nama.setForeground(Color.DARK_GRAY);
        txt_nama.setFont(new Font("Segoe UI", Font.PLAIN,12));
        txt_nama.setBounds(180, 50, 235, 25);
        txt_nama.addFocusListener(this);
        this.getContentPane().add(txt_nama);

        // Label Nama
        lbl_password.setFont(new Font("Segoe UI", Font.PLAIN,12));
        lbl_password.setText("Password");
        lbl_password.setBounds(30, 95, 150, 25);
        lbl_password.setForeground(Color.white);
        this.getContentPane().add(lbl_password);
        
        // Textfield Nama
        txt_password.setText("Masukan Password");
        txt_password.setForeground(Color.DARK_GRAY);
        txt_password.setFont(new Font("Segoe UI", Font.PLAIN,12));
        txt_password.setBounds(180, 95, 235, 25);
        txt_password.addFocusListener(this);
        this.getContentPane().add(txt_password);
        txt_password.addFocusListener(this);
        
        //Jabatan
        lbl_jabatan.setFont (new Font("Market Deco", Font.BOLD,20));
        lbl_jabatan.setText ("Username");
        lbl_jabatan.setForeground(Color.black);
        lbl_jabatan.setBounds(60, 80, 200, 60);
        this.getContentPane().add(lbl_jabatan);

        //Jabatan
        txt_jabatan.setFont (new Font("CONSOLAS", Font.BOLD,12));
        //txt_jabatan.setForeground(Color.GRAY);
        txt_jabatan.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        txt_jabatan.setBounds(141,341,167,18);
        txt_jabatan.setText("");
        this.getContentPane().add(txt_jabatan);
        txt_jabatan.addFocusListener(this);
        
        
        lbl_telepon.setFont (new Font("Market Deco", Font.BOLD,20));
        lbl_telepon.setText ("Username");
        lbl_telepon.setForeground(Color.black);
        lbl_telepon.setBounds(60, 80, 200, 60);
        //this.getContentPane().add(lbl_telepon);

        //username
        txt_telepon.setFont (new Font("CONSOLAS", Font.BOLD,12));
        //txt_telepon.setForeground(Color.GRAY);
        txt_telepon.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        txt_telepon.setBounds(141,341,167,18);
        txt_telepon.setText("");
        this.getContentPane().add(txt_telepon);
        txt_telepon.addFocusListener(this);
        
        
        
        // Label peringatan kesalahan pengetikan
        warning.setBounds(180, 113, 200, 30);
        warning.setFont(new Font("Segoe UI", Font.PLAIN,12));
        warning.setForeground(new Color(255, 0, 0));
        this.getContentPane().add(warning);
        
        // Syarat pengetikan pada Textfield Nama
        txt_nama.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
            String nama = txt_nama.getText().toString();
                if(Character.isLetter(evt.getKeyChar()) || Character.isISOControl(evt.getKeyChar()) || Character.isWhitespace(evt.getKeyChar())){
                    evt=evt;
                    warning.setText("");
                }
                else {
                    warning.setText("Nama hanya berupa Huruf!");
                    evt.consume();
                }
            }
        });
        
        
      
        
        btn_save.setFont(new Font("Segoe UI", Font.PLAIN,14));
        btn_save.setText("Simpan");
        btn_save.setBounds(120, 285, 90, 30);
        btn_save.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_save.setBackground(Color.DARK_GRAY);
        btn_save.setForeground(Color.white);
        btn_save.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_save.setBorder(null);
                btn_save.setBackground(Color.RED);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_save.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_save.setBackground(Color.DARK_GRAY);
            }
        });
        this.getContentPane().add(btn_save);
        btn_save.addActionListener(this);
        
        btn_refresh.setFont(new Font("Segoe UI", Font.PLAIN,14));
        btn_refresh.setText("Refresh");
        btn_refresh.setBounds(250, 285, 90, 30);
        btn_refresh.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_refresh.setBackground(Color.DARK_GRAY);
        btn_refresh.setForeground(Color.white);
        btn_refresh.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_refresh.setBorder(null);
                btn_refresh.setBackground(Color.RED);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_refresh.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_refresh.setBackground(Color.DARK_GRAY);
            }
        });
        this.getContentPane().add(btn_refresh);
        btn_refresh.addActionListener(this);
        
        
         //Alamat
        lbl_alamat.setFont(new Font ("calibri", Font.BOLD, 17));
        lbl_alamat.setText("Alamat :");
        lbl_alamat.setBounds(30,430,225,33);
        this.getContentPane().add(lbl_alamat);
        
        JPanel content = new JPanel();
        
        JScrollPane Spane = new JScrollPane(txt_alamat,
        JScrollPane.VERTICAL_SCROLLBAR_ALWAYS,
        JScrollPane.HORIZONTAL_SCROLLBAR_NEVER);
        
        txt_alamat.setFont(new Font("Tahoma", Font.BOLD,12));

        txt_alamat.setLineWrap(true);
        txt_alamat.setWrapStyleWord(true);
        
        content.setLayout(new BorderLayout());
        
        content.add(Spane);
        
        content.setBounds(15, 480, 400, 100);
        
        this.getContentPane().add(content);
        
        
        //Button Makanan
        btn_back.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_back.setText("Makanan");
        btn_back.setBounds(59, 390, 312, 64);
        this.getContentPane().add(btn_back);
        btn_back.addActionListener(this);
    }
    
    
    public void set_data(){
       
       
        
        nama_pelanggan = txt_nama.getText().trim();
        password = txt_password.getText().trim();
        alamat_pelanggan = txt_alamat.getText().trim();
        
        telepon = txt_telepon.getText().trim();
    }
    
    public void kosong_text(){
        
        //set_id();
        txt_nama.setText("");
        txt_password.setText("");
    }
    
    public String cek_kosong(){
        set_data();
        String hasil = "";
        if(txt_nama.getText().trim().equals("")){
            hasil = "Nama masih kosong";
        }
        else if(txt_password.getText() == null){
            hasil = "Buku masih kosong";
        }
       
        else{
            hasil = "valid";
        }
        return hasil;
    }

    public void actionPerformed(ActionEvent ae){
        if(ae.getSource().equals(btn_save)){
            String cek = cek_kosong();
            if(cek.equals("valid")){
            
                String simpan = new koneksi_pelanggan().tambah_data(nama_pelanggan, alamat_pelanggan, telepon, password);
                JOptionPane.showMessageDialog(null, simpan);
            
                kosong_text();
               
            }
            else{
                JOptionPane.showMessageDialog(null, cek);
            }
        }
        if(ae.getSource().equals(btn_refresh)){
            kosong_text();
        }
        if(ae.getSource().equals(btn_back)){
        setVisible(false);
            Login fh = new Login();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    }
    
    @Override
    public void focusGained(FocusEvent e) {
        if(txt_nama.hasFocus()){
            if(txt_nama.getText().equals("Masukan ID")){
                txt_nama.setText("");
                txt_nama.setForeground(Color.DARK_GRAY);
                
            }
        }
        if(txt_password.hasFocus()){
            if(txt_password.getText().equals("Masukan Nama")){
                txt_password.setText("");
                txt_password.setForeground(Color.DARK_GRAY);
                
            }
        }
        if(txt_alamat.hasFocus()){
            if(txt_alamat.getText().equals("Masukan Judul Buku")){
                txt_alamat.setText("");
                txt_alamat.setForeground(Color.DARK_GRAY);
                
            }
        }
    }

    @Override
    public void focusLost(FocusEvent e) {
        if(txt_nama.getText().equals("")){
            txt_nama.setText("Masukan Nama");
            txt_nama.setForeground(Color.DARK_GRAY);
        }
        if(txt_password.getText().equals("")){
            txt_password.setText("Masukan Password");
            txt_password.setForeground(Color.DARK_GRAY);
        }
        if(txt_alamat.getText().equals("")){
            txt_alamat.setText("Masukan Judul Alamat");
            txt_alamat.setForeground(Color.DARK_GRAY);
        }
    }

    @Override
    public void stateChanged(ChangeEvent e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}

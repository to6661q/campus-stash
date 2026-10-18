/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package subMenu;

import java.awt.*;
import java.awt.event.*;
import java.util.Calendar;
import javax.swing.*;
import java.util.*;
import javax.swing.event.*;
import java.text.DateFormat;
import java.text.SimpleDateFormat;


public class FrameHapusPegawai extends JFrame implements ActionListener, ChangeListener, FocusListener{
    JLabel lbl_data = new JLabel();
       JLabel label1 = new JLabel("", JLabel.CENTER);
    ImageIcon background = new ImageIcon("src/image/polos.jpg");
    JLabel lbl_id = new JLabel();
    JTextField txt_id = new JTextField();
    
    JLabel lbl_nama = new JLabel();
    JTextField txt_nama = new JTextField();
    
    JLabel lbl_buku1 = new JLabel();
    JTextField txt_buku1 = new JTextField();
    
    JLabel lbl_denda = new JLabel();
    JTextField txt_denda = new JTextField();
    
    JLabel lbl_tgl1 = new JLabel();
    
    JLabel lbl_tgl2 = new JLabel();
    
    JButton btn_cari = new JButton();
    JButton btn_hapus = new JButton();
    JButton btn_refresh = new JButton();
    
    JLabel warning = new JLabel();
    String id, nama, buku1, tglpinjam, tglkembali, pinjam, kembali;
    
    
    
    public FrameHapusPegawai(){
        getContentPane().setBackground(Color.DARK_GRAY);
        this.getContentPane().setLayout(null);
        this.setTitle("Hapus Data");
        
        //Judul
        lbl_data.setFont(new Font("Book Antiqua", Font.PLAIN,16));
        lbl_data.setText("Hapus Data Peminjaman");
        lbl_data.setBounds(30,15,250,20);
        lbl_data.setForeground(Color.white);
        this.getContentPane().add(lbl_data);
        
        //Label ID
        lbl_id.setFont(new Font("Segoe UI", Font.PLAIN,12));
        lbl_id.setText("ID Peminjaman");
        lbl_id.setBounds(30, 50, 150, 25);
        lbl_id.setForeground(Color.white);
        this.getContentPane().add(lbl_id);
        
        //Textfield ID
        txt_id.setText("Masukan ID");
        txt_id.setFont(new Font("Segoe UI", Font.PLAIN,12));
        txt_id.setForeground(Color.DARK_GRAY);
        txt_id.setBounds(180, 50, 212, 25);
        this.getContentPane().add(txt_id);
        txt_id.addFocusListener(this);
        
        //Button Cari
        btn_cari.addActionListener(this);
        btn_cari.setFont(new Font("Segoe UI", Font.PLAIN,12));
        btn_cari.setBackground(new Color(51, 51, 51));
        btn_cari.setForeground(new Color(255, 255, 255));
        btn_cari.setBorder(null);
        
        btn_cari.setIcon(new ImageIcon(this.getClass().getResource("/icon/SearchIcon.png")));
        btn_cari.setBounds(390, 50, 25, 25);
        this.getContentPane().add(btn_cari);
        
        //Label Nama
        lbl_nama.setFont(new Font("Segoe UI", Font.PLAIN,12));
        lbl_nama.setText("Nama Peminjam");
        lbl_nama.setBounds(30, 95, 150, 25);
        lbl_nama.setForeground(Color.white);
        this.getContentPane().add(lbl_nama);
        
        txt_nama.setText("Masukan Nama");
        txt_nama.setForeground(Color.DARK_GRAY);
        txt_nama.setFont(new Font("Segoe UI", Font.PLAIN,12));
        txt_nama.setBounds(180, 95, 235, 25);
        this.getContentPane().add(txt_nama);
        txt_nama.addFocusListener(this);
        
        warning.setFont(new Font("Segoe UI", Font.PLAIN,12));
        warning.setForeground(new Color(255, 0, 0));
        this.getContentPane().add(warning);
        
        // Syarat pengetikan pada Texfield
        txt_id.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
            String nama = txt_id.getText().toString();
                if(Character.isDigit(evt.getKeyChar()) || Character.isISOControl(evt.getKeyChar())){
                    evt=evt;
                    warning.setText("");
                }
                else {
                    warning.setBounds(180, 68, 200, 30);
                    warning.setText("Nama hanya terdiri dari 4 angka dan tidak mengandung spasi!");
                    evt.consume();
                }
            }
        });
        
        lbl_buku1.setFont(new Font("Segoe UI", Font.PLAIN,12));
        lbl_buku1.setText("Buku");
        lbl_buku1.setBounds(30, 140, 100, 25);
        lbl_buku1.setForeground(Color.white);
        this.getContentPane().add(lbl_buku1);
        
        txt_buku1.setText("Masukan Judul Buku ");
        txt_buku1.setForeground(Color.DARK_GRAY);
        txt_buku1.setFont(new Font("Segoe UI", Font.PLAIN,12));
        txt_buku1.setBounds(180, 140, 235, 25);
        this.getContentPane().add(txt_buku1);
        txt_buku1.addFocusListener(this);
        
        //----------------------------------------------------------------------
        
        lbl_tgl1.setFont(new Font("Segoe UI", Font.PLAIN,12));
        lbl_tgl1.setText("Tanggal Peminjaman");
        lbl_tgl1.setBounds(30, 185, 235, 25);
        lbl_tgl1.setForeground(Color.white);
        this.getContentPane().add(lbl_tgl1);
        
        lbl_tgl2.setFont(new Font("Segoe UI", Font.PLAIN,12));
        lbl_tgl2.setText("Tanggal Pengembalian");
        lbl_tgl2.setBounds(30, 230, 235, 25);
        lbl_tgl2.setForeground(Color.white);
        this.getContentPane().add(lbl_tgl2);
       
        
        lbl_denda.setFont(new Font("Segoe UI", Font.PLAIN,12));
        lbl_denda.setText("Denda");
        lbl_denda.setBounds(30, 270, 150, 25);
        lbl_denda.setForeground(Color.white);
       // this.getContentPane().add(lbl_denda);
        
        txt_denda.setText("Masukan Denda");
        txt_denda.setForeground(Color.DARK_GRAY);
        txt_denda.setFont(new Font("Segoe UI", Font.PLAIN,12));
        txt_denda.setBounds(180, 275, 235, 25);
        txt_denda.addFocusListener(this);
       // this.getContentPane().add(txt_denda);
        
        btn_hapus.setFont(new Font("Segoe UI", Font.PLAIN,14));
        btn_hapus.setText("Hapus");
        btn_hapus.setBounds(120, 325, 90, 30);
        btn_hapus.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
        btn_hapus.setBackground(Color.DARK_GRAY);
        btn_hapus.setForeground(Color.white);
        btn_hapus.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                btn_hapus.setBorder(null);
                btn_hapus.setBackground(Color.RED);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                btn_hapus.setBorder(BorderFactory.createLineBorder(Color.DARK_GRAY, 2));
                btn_hapus.setBackground(Color.DARK_GRAY);
            }
        });
        this.getContentPane().add(btn_hapus);
        btn_hapus.addActionListener(this);
        
        btn_refresh.setFont(new Font("Segoe UI", Font.PLAIN,14));
        btn_refresh.setText("Refresh");
        btn_refresh.setBounds(250, 325, 90, 30);
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
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1); 
        
    }
    
    
    
    
    @Override
    public void actionPerformed(ActionEvent e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public void stateChanged(ChangeEvent e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public void focusGained(FocusEvent e) {
        if(txt_id.hasFocus()){
            if(txt_id.getText().equals("Masukan ID")){
                txt_id.setText("");
                txt_id.setForeground(Color.DARK_GRAY);
                
            }
        }
        if(txt_nama.hasFocus()){
            if(txt_nama.getText().equals("Masukan Nama")){
                txt_nama.setText("");
                txt_nama.setForeground(Color.DARK_GRAY);
                
            }
        }
        if(txt_buku1.hasFocus()){
            if(txt_buku1.getText().equals("Masukan Judul Buku")){
                txt_buku1.setText("");
                txt_buku1.setForeground(Color.DARK_GRAY);
                
            }
        }
        if(txt_denda.hasFocus()){
            if(txt_denda.getText().equals("Masukan Denda")){
                txt_denda.setText("");
                txt_denda.setForeground(Color.DARK_GRAY);
                
            }
        }
        
    }

    @Override
    public void focusLost(FocusEvent e) {
        if(txt_id.getText().equals("")){
            txt_id.setText("Masukan ID");
            txt_id.setForeground(Color.DARK_GRAY);
        }
        if(txt_nama.getText().equals("")){
            txt_nama.setText("Masukan Nama");
            txt_nama.setForeground(Color.DARK_GRAY);
        }
        if(txt_buku1.getText().equals("")){
            txt_buku1.setText("Masukan Judul Buku");
            txt_buku1.setForeground(Color.DARK_GRAY);
        }
        if(txt_denda.getText().equals("")){
            txt_denda.setText("Masukan Denda");
            txt_denda.setForeground(Color.DARK_GRAY);
        }
    }
    
}

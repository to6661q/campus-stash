package rumahmakan2;

import java.awt.*;
import javax.swing.*;
import java.awt.SystemColor;
import java.awt.event.*;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.Arrays;
import java.util.List;
import javax.swing.table.DefaultTableModel;

public class DetailJumlah extends JFrame implements ActionListener{
    Connection con = null;
    
    
   
    
    public static String pilihan;
    
    public static double hargaporsi;
    
    public static String idProduk1;
    
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
    ImageIcon background = new ImageIcon("src/asetImage/Detail.png");
    
    String id_pesanan, nama_pelanggan, id_produk, jumlah, totalbiaya; 
    
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
        //menampilkan data pesanan 
        lbl_pesanan.setText(DetailJumlah.pilihan);  
        lbl_pesanan.setForeground(Color.black);
        lbl_pesanan.setBounds(new Rectangle(81,168,150,50));
        this.getContentPane().add(lbl_pesanan);   
        
        //JUMLAH MAKANAN YANG DI PESAN
        txt_jmlpesanan.setBounds(new Rectangle(91,236,249,21));
        txt_jmlpesanan.setBorder(javax.swing.BorderFactory.createEmptyBorder());
        txt_jmlpesanan.setDocument(new onlyDigit().getOnlyDigit());
        this.getContentPane().add(txt_jmlpesanan);
        
        //Button keluar
        btn_keluar.setIcon(background1);
        btn_keluar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar.setText("lo");
        btn_keluar.setBounds(376, 67, 18, 22);
        this.getContentPane().add(btn_keluar);
        btn_keluar.addActionListener(this);
        
        //Button kembali
        btn_kembali.setIcon(background2);
        btn_kembali .setFont(new Font("Tahoma", Font.BOLD,12));
        btn_kembali .setText("<");
        btn_kembali .setBounds(39, 69, 58, 42);
        this.getContentPane().add(btn_kembali );
        btn_kembali .addActionListener(this);
        
        //Button lanjut
        //btn_lanjut.setIcon(background3);
        btn_lanjut.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_lanjut.setText(">");
        btn_lanjut.setBounds(139, 721, 153, 48);
        this.getContentPane().add(btn_lanjut);
        btn_lanjut.addActionListener(this);
        
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
            MenuUtama fh = new MenuUtama();            
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   

    else if(ae.getSource().equals(btn_lanjut)){
        
        
        setVisible(false);
            Rincianlama fh = new Rincianlama();            
            fh.setSize(450, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
            
            tambah_data(id_pesanan, nama_pelanggan, id_produk, txt_jmlpesanan.getText(), Double.toString(hargaporsi * Integer.parseInt(txt_jmlpesanan.getText())));
            
            set_data();
            
            String simpan = new koneksi_pesanan ().tambah_data(id_pesanan, nama_pelanggan, id_produk, txt_jmlpesanan.getText(), Double.toString(hargaporsi * Integer.parseInt(txt_jmlpesanan.getText())));
            JOptionPane.showMessageDialog(null, simpan);
            
        }   
    }
    
    public void set_data(){
       
        id_produk = idProduk1;
        id_pesanan = id_pesanan;
        jumlah = txt_jmlpesanan.getText();
        nama_pelanggan = customer.yangSedangLogin;
        totalbiaya = totalbiaya;
    }
    
    public String tambah_data( String id_pesanan, String id_produk, String jumlah, String nama_pelanggan, String totalbiaya){
        String result = "";
        try{
            con = new koneksi().getkoneksi();
            String str = "INSERT INTO pesanancustomer( nama_pelanggan, id_produk, jumlah, totalbiaya) VALUES(?,?,?,?)";
            PreparedStatement pr = con.prepareStatement(str);
            
            pr.setString(1, nama_pelanggan);
            pr.setString(2, id_produk);
            pr.setString(3, jumlah);
            pr.setString(4, totalbiaya);
            
            int i = pr.executeUpdate();
            if(i != 0){
                result = "Data Berhasil Disimpan";
            }
            else{
                result = "Data Gagal Disimpan";
            }
            
            con.close();
        }
        catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return result;
    }

    private void tambah_data(String nama_pelanggan, String text, String toString) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    
}

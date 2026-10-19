
package rm_admin;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.table.*;
import javax.swing.event.*;
import java.util.Arrays;
import java.util.List;
import java.util.Vector;
import java.awt.SystemColor;
import java.io.IOException;
import java.util.ArrayList;

public class aset extends JFrame implements ActionListener {

    public static String nama, alamat;
    
    
    JLabel lbl_Rincian = new JLabel();
    
    DefaultTableModel DftTabMode;
    JTable tbl_pesanan = new JTable();
    JScrollPane jspane = new JScrollPane();
    JLabel lbl_Total = new JLabel();
    JTextField txt_Total = new JTextField();
    
    
    //Deklarasi Gui
    JLabel lbl_title = new JLabel();
    

    //Alamat auto isi sesuai akun
    JButton btn_Alamatakun = new JButton();
    
    //Button
   
    JButton btn_next = new JButton();
    JButton btn_close = new JButton();
    JLabel label1 = new JLabel();
    ImageIcon background = new ImageIcon("src/asetImage/Splash screen – 2.png");
    Object currentWindow = this;

    public aset(){
        hitungTotalHarga();
        
        System.out.println("___________________________________");
        //pesanan sama aja kaya arrayPesanan.get(i) atau namaArray[i]
        //keyword searching : foreach java
        for(Pesanan pesanan : Akun.akunYangSedangLogin.arrayPesanan) {
            System.out.println(pesanan.namaMakanan + " " + pesanan.hargaporsi + " " + pesanan.porsi + " " + pesanan.totalharga); 
        }
        
//      for (int i = 0; i<Akun.akunYangSedangLogin.arrayPesanan.size();i++ ){
//            k = i;
//        }
                
                
        this.getContentPane().setLayout(null);
        this.setTitle("Rincian");
        
        //Judul Frame
        lbl_title.setFont(new Font("CALIBRI", Font.BOLD,40));
        lbl_title.setText("Rincian :");
        lbl_title.setBounds( 20,40,158,30);
        this.getContentPane().add(lbl_title);
       
        
        Object[] baris = {"ID", "Nama", "Jabatan", "Alamat","Telepon"};
        
        DftTabMode = new DefaultTableModel (null, baris);
        tbl_pesanan.setModel(DftTabMode);
        
        tbl_pesanan.setModel(new ListTableModel<>());
        
        tbl_pesanan.setAutoResizeMode(JTable.AUTO_RESIZE_OFF);
        tbl_pesanan.getColumnModel().getColumn(0).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(1).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(2).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(3).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(3).setPreferredWidth(100);
       
        
        jspane.setBounds(new Rectangle(20, 180, 400, 564));
        jspane.getViewport().add(tbl_pesanan, null);
        this.getContentPane().add(jspane);
        
        
        
        //Total Biaya
        lbl_Total.setFont(new Font ("Calibri", Font.BOLD, 17));
        lbl_Total.setText("Total Biaya :");
        lbl_Total.setBounds(30,400,225,22);
        this.getContentPane().add(lbl_Total);
        
        txt_Total.setBounds(new Rectangle(130,405,225,28));
        txt_Total.setText("");
        this.getContentPane().add(txt_Total);
        

        
        JPanel content = new JPanel();
        
        
        

        
        content.setBounds(15, 480, 400, 100);
        
        this.getContentPane().add(content);
        
        
        btn_next.setFont(new Font("Lucida Bright", Font.BOLD,20));
        btn_next.setText("N");
        btn_next.setBounds(190,600,58,42);
        this.getContentPane().add(btn_next);
        btn_next.addActionListener(this);
        
        btn_close.setFont(new Font("Lucida Bright", Font.BOLD,9));
        btn_close.setText("C");
        btn_close.setBounds(370,30,40,30);
        this.getContentPane().add(btn_close);
        btn_close.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1); 
    }
    
    //untuk cek jalan atau tidak
   public void total_1(){
        for(int i = 0; i < tbl_pesanan.getRowCount(); i++){
            int total = 0;
            
            // deklarasi memasukkan nilai yang diinput di DetailJumlah
            int amount = Integer.parseInt(tbl_pesanan.getValueAt(i, 3)+"");
            total = amount + total;
            System.out.println(total);
       }
   }
   
   public void total_semua(){
        for(int i = 0; i < tbl_pesanan.getRowCount();i++){
           int total = 0;
           
           
       }
   }
   
   public void akun(){
       //untuk memasukkan nama dan alamat dirincian
       ArrayList<Akun> arrayAkun = Akun.arrayAkun;    
            for(int i = 0; i < arrayAkun.size(); i++ ){
                Akun akun = arrayAkun.get(i);
                nama = akun.id_pegawai;
                alamat = akun.alamat;              
        }
    }
   
   
    
    public void actionPerformed(ActionEvent ae){
       
//        if(ae.getSource().equals(btn_tambah)){
////        setVisible(false);
//            MenuUtama fh = new MenuUtama();         
//            fh.setSize(430, 812);
//            fh.setLocationRelativeTo(null);
//            fh.setResizable(false);
//            fh.setVisible(true);
//            
//            
//            
//        }   
    
        if(ae.getSource().equals(btn_close)){
        setVisible(false);
            Login fh = new Login();         
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
        
        
     else if(ae.getSource().equals(btn_Alamatakun)){
        setVisible(false);
            Rincianlama fh = new Rincianlama();     
            fh.txt_alamat.setText(alamat);
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
//     
//    else if(ae.getSource().equals(btn_hapus)){
//        setVisible(false);
//            Rincianlama fh = new Rincianlama();            
//            fh.setSize(430, 812);
//            fh.setLocationRelativeTo(null);
//            fh.setResizable(false);
//            fh.setVisible(true);
//            
//            //jika kliw baris tabel
//            int index = tbl_pesanan.getSelectedRow();
//            String Makanan = (String) tbl_pesanan.getValueAt(index, 0);
//            
//            
//            //cari cara dapetin index tabel yang diklik;
//            Pesanan.hapusPesanan(index);
//            fh.hitungTotalHarga();
//        }   
       
    else if(ae.getSource().equals(btn_next)){
//        setVisible(false);
//            Pembayaran fh = new Pembayaran();            
//            fh.setSize(430, 812);
//            fh.setLocationRelativeTo(null);
//            fh.setResizable(false);
//            fh.setVisible(true);
}   
    }
    
    //Hitung Total semua pesanan
    public void hitungTotalHarga(){
        double total = 0;
        for(int i = 0; i < Akun.akunYangSedangLogin.arrayPesanan.size(); i++) {
            total += Akun.akunYangSedangLogin.arrayPesanan.get(i).totalharga;
        }
        //text field Total 
        txt_Total.setText(Double.toString(total));
    }
}
    
   
    

package rumahmakan;

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

public class Rincianlama extends JFrame implements ActionListener {

    public static String nama, alamat;
   
    
    JLabel lbl_Rincian = new JLabel();
    
    DefaultTableModel DftTabMode;
    JTable tbl_pesanan = new JTable();
    JScrollPane jspane = new JScrollPane();
    JLabel lbl_Total = new JLabel();
    JTextField txt_Total = new JTextField();
    
    
    //Deklarasi Gui
    JLabel lbl_title = new JLabel();
    
    //Nomer Pesanan
    JLabel lbl_noPesanan = new JLabel();
    JLabel txt_noPesanan = new JLabel();
    
    //Nama Pemesan
    JLabel lbl_nama = new JLabel();
    JLabel txt_nama = new JLabel();
    
    //Daftar Pesanan
    JLabel lbl_makanan = new JLabel();
   
    
    
    //Pajak
    JLabel lbl_aturan = new JLabel();
    
    
    //Alamat
    JLabel lbl_alamat = new JLabel();
    JTextArea txt_alamat = new JTextArea();
    
    //Alamat auto isi sesuai akun
    JButton btn_Alamatakun = new JButton();
    
    //Button
    JButton btn_tambah = new JButton();
    JButton btn_hapus = new JButton();
    JButton btn_next = new JButton();
    JButton btn_close = new JButton();
    
    Object currentWindow = this;

    public Rincianlama(){
        
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
        
        //no pesanan
        lbl_noPesanan.setFont(new Font("CALIBRI", Font.BOLD,20));
        lbl_noPesanan.setText("No Pesanan : ");
        lbl_noPesanan.setBounds(30,90,200,22);
        this.getContentPane().add(lbl_noPesanan);
        
        txt_noPesanan.setFont(new Font("Tahoma", Font.BOLD,20));    
        txt_noPesanan.setText("");  
        txt_noPesanan.setForeground(Color.black);
        txt_noPesanan.setBounds(new Rectangle(150,90,225,22));
        this.getContentPane().add(txt_noPesanan);  
        
        //nama pemesan
        lbl_nama.setFont(new Font("CALIBRI", Font.BOLD,20));
        lbl_nama.setText("Nama :");
        lbl_nama.setBounds(30,120,200,22);
        this.getContentPane().add(lbl_nama);
        
        txt_nama.setFont(new Font("Tahoma", Font.BOLD,20));    
        txt_nama.setText(nama);  
        txt_nama.setForeground(Color.black);
        txt_nama.setBounds(new Rectangle(100,120,225,22));
        this.getContentPane().add(txt_nama);   
        
        //makanan atau minuman yang dipesan
        lbl_makanan.setFont(new Font("CALIBRI", Font.BOLD, 25));
        lbl_makanan.setText("Pesanan:");
        lbl_makanan.setBounds( 30,150,158,22);
        this.getContentPane().add(lbl_makanan);
        
        
        Object[] baris = {"Makanan", "harga/porsi","porsi","total"};
        
        DftTabMode = new DefaultTableModel (null, baris);
        tbl_pesanan.setModel(DftTabMode);
        
        tbl_pesanan.setModel(new ListTableModel<>());
        
        tbl_pesanan.setAutoResizeMode(JTable.AUTO_RESIZE_OFF);
        tbl_pesanan.getColumnModel().getColumn(0).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(1).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(2).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(3).setPreferredWidth(100);
       
        
        jspane.setBounds(new Rectangle(15, 180, 400, 200));
        jspane.getViewport().add(tbl_pesanan, null);
        this.getContentPane().add(jspane);
        
        
        //Aturan
        lbl_aturan.setFont(new Font("CALIBRI", Font.BOLD, 17));
        lbl_aturan.setText("Pajak 5% ditanggung pembeli");
        lbl_aturan.setBounds( 30,380,300,22);
        this.getContentPane().add(lbl_aturan);
        
        //Total Biaya
        lbl_Total.setFont(new Font ("Calibri", Font.BOLD, 17));
        lbl_Total.setText("Total Biaya :");
        lbl_Total.setBounds(30,400,225,22);
        this.getContentPane().add(lbl_Total);
        
        txt_Total.setBounds(new Rectangle(130,405,225,28));
        txt_Total.setText("");
        this.getContentPane().add(txt_Total);
        
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
        txt_alamat.setText(alamat);
        
        txt_alamat.setLineWrap(true);
        txt_alamat.setWrapStyleWord(true);
        
        content.setLayout(new BorderLayout());
        
        content.add(Spane);
        
        content.setBounds(15, 480, 400, 100);
        
        this.getContentPane().add(content);
        
        //Button auto isi Alamatakun
        btn_Alamatakun.setFont(new Font("Lucida Bright", Font.BOLD,20));
        btn_Alamatakun.setText("Alamat Akun");
        btn_Alamatakun.setBounds(115,455,190,20);
        this.getContentPane().add(btn_Alamatakun);
        btn_Alamatakun.addActionListener(this);
        
        //Button Tambah
        btn_tambah.setFont(new Font("Lucida Bright", Font.BOLD,20));
        btn_tambah.setText("T");
        btn_tambah.setBounds(30,600,58,42);
        this.getContentPane().add(btn_tambah);   
        btn_tambah.addActionListener(this);
        
        btn_hapus.setFont(new Font("Lucida Bright", Font.BOLD,20));
        btn_hapus.setText("H");
        btn_hapus.setBounds(110,600,58,42);
        this.getContentPane().add(btn_hapus);   
        btn_hapus.addActionListener(this);
        
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
                nama = akun.user;
                alamat = akun.alamat;              
        }
    }
   
   
    
    public void actionPerformed(ActionEvent ae){
       
        if(ae.getSource().equals(btn_tambah)){
        setVisible(false);
            MenuUtama fh = new MenuUtama();         
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
            
            //nanti taro disini
            
        }   
    
     else if(ae.getSource().equals(btn_Alamatakun)){
        setVisible(false);
            Rincianlama fh = new Rincianlama();  
            Rincianlama.alamat = alamat;
            fh.setSize(430, 750);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
            
            
            
        }   
     
    else if(ae.getSource().equals(btn_hapus)){
        setVisible(false);
            Rincianlama fh = new Rincianlama();            
            fh.setSize(430, 750);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
            
          
            int index = tbl_pesanan.getSelectedRow();
            String Makanan = (String) tbl_pesanan.getValueAt(index, 0);
            
            
            //cari cara dapetin index tabel yang diklik;
            Pesanan.hapusPesanan(index);
        }   
       
    else if(ae.getSource().equals(btn_next)){
        setVisible(false);
            Pembayaran fh = new Pembayaran();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    }  
}
    
   
    
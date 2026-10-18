
package subMenu;

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
import java.sql.Statement;
import javax.swing.table.DefaultTableColumnModel;
import java.sql.ResultSet;
import java.sql.SQLException;

public class FramePegawai extends JFrame implements ActionListener {
    
    
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
   JLabel label1 = new JLabel("", JLabel.CENTER);
    ImageIcon background = new ImageIcon("src/image/polos.jpg");
    Object currentWindow = this;

    public FramePegawai(){
          
        this.getContentPane().setLayout(null);
        this.setTitle("Pegawai");
        
        //Judul Frame
        lbl_title.setFont(new Font("CALIBRI", Font.BOLD,40));
        lbl_title.setText("PEGAWAI");
        lbl_title.setBounds( 20,40,158,30);
        this.getContentPane().add(lbl_title);
       
        
        Object[] baris = {"id", "nama", "alamat", "jabatan","telepon"};
        
        DftTabMode = new DefaultTableModel (null, baris);
        tbl_pesanan.setModel(DftTabMode);
        
        //tbl_pesanan.setModel(new ListTableModel<>());
        
        tbl_pesanan.setAutoResizeMode(JTable.AUTO_RESIZE_OFF);
        tbl_pesanan.getColumnModel().getColumn(0).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(1).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(2).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(3).setPreferredWidth(100);
        tbl_pesanan.getColumnModel().getColumn(4).setPreferredWidth(100);
       
        
        jspane.setBounds(new Rectangle(18, 141, 387, 564));
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
        

        btn_next.setFont(new Font("Lucida Bright", Font.BOLD,20));
        btn_next.setText("N");
        btn_next.setBounds(190,600,58,42);
        this.getContentPane().add(btn_next);
        btn_next.addActionListener(this);
        
        btn_close.setFont(new Font("Lucida Bright", Font.BOLD,9));
        btn_close.setText("<");
        btn_close.setBounds(12, 12, 63, 20);
        this.getContentPane().add(btn_close);
        btn_close.addActionListener(this);
        
        //BACKGROUND
        label1.setIcon(background);
        label1.setSize(430,812);
        this.getContentPane().add(label1); 
        
                
        getData();
        
        
        
    }
    
    public void getData(){
        DftTabMode.getDataVector().removeAllElements();
        DftTabMode.fireTableDataChanged();
        
        
        try{
            Statement stat = (Statement) koneksi.getkoneksi().createStatement();
            String sql = "Select id,nama,alamat,jabatan,telepon from Pegawai";
            ResultSet res = stat.executeQuery(sql);
            
            while(res.next()){
                Object[] obj = new Object[5];
                obj[0]=res.getString("id");
                obj[1]=res.getString("nama");
                obj[2]=res.getString("alamat");
                obj[3]=res.getString("jabatan");
                obj[4]=res.getString("telepon");
                
                
                DftTabMode.addRow(obj);
            }
        }catch(SQLException err){
            JOptionPane.showMessageDialog(null,err.getMessage());
        }
    }
   
   
    
    public void actionPerformed(ActionEvent ae){
    
        if(ae.getSource().equals(btn_close)){
        setVisible(false);
           LoginAdmin fh = new LoginAdmin();
            fh.setSize(430, 812);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    }   
}
    
    
   

    
   
    
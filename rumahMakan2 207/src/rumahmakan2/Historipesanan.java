
package rumahmakan2;

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

public class Historipesanan extends JFrame implements ActionListener {
    
    DefaultTableModel DftTabMode;
    JTable tbl_historiPesan = new JTable();
    JScrollPane jspane = new JScrollPane();
    
  
    //Daftar Pesanan
    JLabel lbl_judul = new JLabel();
   
    //Button
    JButton btn_close = new JButton();
    
    Object currentWindow = this;

    public Historipesanan(){

        this.getContentPane().setLayout(null);
        this.setTitle("Histori Pesan");
        
        //makanan atau minuman yang dipesan
        lbl_judul.setFont(new Font("CALIBRI", Font.BOLD, 25));
        lbl_judul.setText("Histori Pesanan:");
        lbl_judul.setBounds( 30,30,190,22);
        this.getContentPane().add(lbl_judul);
        
        
        Object[] baris = {"user", "password","total","alamat"};
        
        DftTabMode = new DefaultTableModel (null, baris);
        tbl_historiPesan.setModel(DftTabMode);
        
        tbl_historiPesan.setModel(new ListTableModel<>());
        
        tbl_historiPesan.setAutoResizeMode(JTable.AUTO_RESIZE_OFF);
        tbl_historiPesan.getColumnModel().getColumn(0).setPreferredWidth(100);
        tbl_historiPesan.getColumnModel().getColumn(1).setPreferredWidth(100);
        tbl_historiPesan.getColumnModel().getColumn(2).setPreferredWidth(100);
        tbl_historiPesan.getColumnModel().getColumn(3).setPreferredWidth(100);
       
        
        jspane.setBounds(new Rectangle(15,80, 400, 360));
        jspane.getViewport().add(tbl_historiPesan, null);
        this.getContentPane().add(jspane);
        
        
        btn_close.setFont(new Font("Lucida Bright", Font.BOLD,9));
        btn_close.setText("C");
        btn_close.setBounds(370,30,40,30);
        this.getContentPane().add(btn_close);
        btn_close.addActionListener(this);
        
    }
    
    public void actionPerformed(ActionEvent ae){
       
        if(ae.getSource().equals(btn_close)){
        setVisible(false);
            Login fh = new Login();         
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
            
            //nanti taro disini
            
        }   
    }  
}
    
   
    
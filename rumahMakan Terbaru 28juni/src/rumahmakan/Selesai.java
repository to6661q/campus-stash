
package rumahmakan;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.event.*;
import java.util.Arrays;
import java.util.List;
import javax.swing.table.DefaultTableModel;

public class Selesai extends JFrame implements ActionListener{
   
    JLabel lbl_Selesai = new JLabel();
    
    JTextField txt_biayatotal = new JTextField();
        
        
    JButton btn_keluar = new JButton();
    JButton btn_kembali = new JButton();
    JButton btn_lanjut = new JButton();
    
    public Selesai(){
        this.getContentPane().setLayout(null);
        this.setTitle("Rumah Makan");
        
        lbl_Selesai.setFont(new Font("Tahoma", Font.BOLD,30));
        lbl_Selesai.setText("Terimakasih");
        lbl_Selesai.setForeground(Color.black);
        lbl_Selesai.setBounds(120, 60, 200, 60);
        this.getContentPane().add(lbl_Selesai);
        
        
        //Button keluar
        btn_keluar.setFont(new Font("Tahoma", Font.BOLD,12));
        btn_keluar.setText("LO");
        btn_keluar.setBounds(30, 350, 58, 42);
        this.getContentPane().add(btn_keluar);
        btn_keluar.addActionListener(this);
        
    }
    
    
    
    public void actionPerformed(ActionEvent ae){   
    
    if(ae.getSource().equals(btn_keluar)){
        setVisible(false);
            Login fh = new Login();            
            fh.setSize(430, 500);
            fh.setLocationRelativeTo(null);
            fh.setResizable(false);
            fh.setVisible(true);
        }   
    }
}

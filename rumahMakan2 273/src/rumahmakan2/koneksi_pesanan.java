/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package rumahmakan2;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import javax.swing.JOptionPane;

/**
 *
 * @author M Ammaridho
 */
public class koneksi_pesanan {
    
    Connection con = null;
    
    
    
    public String tambah_data( String id_pesanan, String nama_pelanggan, String id_produk, String jumlah, String totalbiaya){
        String result = "";
        try{
            con = new koneksi().getkoneksi();
            String str = "INSERT INTO pesanancustomer(id_pesanan, nama_pelanggan, id_produk, jumlah, totalbiaya) VALUES(?,?,?,?,?)";
            PreparedStatement pr = con.prepareStatement(str);
            
            pr.setString(1, id_pesanan);
            pr.setString(2, nama_pelanggan);
            pr.setString(3, id_produk);
            pr.setString(4, jumlah);
            pr.setString(5, totalbiaya);
            
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
    public List tampil_data(){
        List<String> assetList = new ArrayList<>();
        try{
            con = new koneksi().getkoneksi();
            PreparedStatement pr = con.prepareStatement("SELECT * FROM pesanancustomer ");
            ResultSet rs = pr.executeQuery();
            while (rs.next()){
            String id_pesanan = rs.getString("id_pesanan").trim();
            String nama_pelanggan = rs.getString("nama_pelanggan").trim();
            String id_produk = rs.getString("id_produk").trim();
            String jumlah = rs.getString("jumlah").trim();
            String totalbiaya = rs.getString("totalbiaya").trim();
            
            String[] dataField = {id_pesanan, nama_pelanggan, id_produk, jumlah, totalbiaya};
               Collections.addAll(assetList, dataField);
            }
        }
        catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return assetList;
    }
}

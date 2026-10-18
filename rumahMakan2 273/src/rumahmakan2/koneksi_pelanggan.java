package rumahmakan2;

import java.sql.*;
import javax.swing.*;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

public class koneksi_pelanggan {
    Connection con = null;
    
  //get data
    public List get_data(String str){
        List<String> assetList = new ArrayList<>();
        try{
            con = new koneksi().getkoneksi();
            PreparedStatement pr = con.prepareStatement("SELECT * FROM pelanggan WHERE nama_pelanggan = ?");
            pr.setString(1, str);
            
            ResultSet rs = pr.executeQuery();
            rs.next();
            
           
            String nama_pelanggan = rs.getString("nama_pelanggan").trim();
            String alamat_pelanggan = rs.getString("alamat_pelanggan").trim();
            String telepon = rs.getString("telepon").trim();
            String password = rs.getString("password").trim();
            
            String[] dataField = { nama_pelanggan, alamat_pelanggan, telepon, password};
            Collections.addAll(assetList, dataField);
        }
        catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return assetList;
    }
    
  //tampil data  
    public List tampil_data(){
        List<String> assetList = new ArrayList<>();
        try{
            con = new koneksi().getkoneksi();
            PreparedStatement pr = con.prepareStatement("SELECT * FROM pelanggan ORDER BY nama_pelanggan ASC");
            ResultSet rs = pr.executeQuery();
            while (rs.next()){
           
            String nama_pelanggan = rs.getString("nama_pelanggan").trim();
            String alamat_pelanggan = rs.getString("alamat_pelanggan").trim();
            String telepon = rs.getString("telepon").trim();
            String password = rs.getString("password").trim();
            
            
            String[] dataField = { nama_pelanggan, alamat_pelanggan, telepon, password};
            Collections.addAll(assetList, dataField);
            }
        }
        catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return assetList;
    }
    
  //cari data 
    public List cari_data(String str){
        List<String> assetList = new ArrayList<String>();
        try{
            con = new koneksi().getkoneksi();
            PreparedStatement pr = con.prepareStatement("SELECT * FROM pelanggan WHERE nama_pelanggan LIKE ? ORDER BY nama_pelanggan ASC");
            pr.setString(1,str + "%");
            ResultSet rs = pr.executeQuery();
            while (rs.next()){
        
            String nama_pelanggan = rs.getString("nama_pelanggan").trim();
            String alamat_pelanggan = rs.getString("alamat_pelanggan").trim();
            String telepon = rs.getString("telepon").trim();
            String password = rs.getString("password").trim();
            
            String[] dataField = { nama_pelanggan, alamat_pelanggan, telepon, password};
            Collections.addAll(assetList, dataField);
            }
        }
        catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return assetList;
    }
    
  //tambah data  
    public String tambah_data( String nama_pelanggan, String alamat_pelanggan, String telepon, String password){
        String result = "";
        try{
            con = new koneksi().getkoneksi();
            String str = "INSERT INTO pelanggan( nama_pelanggan, alamat_pelanggan, telepon, password) VALUES(?,?,?,?)";
            PreparedStatement pr = con.prepareStatement(str);
            
            pr.setString(1, nama_pelanggan);
            pr.setString(2, alamat_pelanggan);
            pr.setString(3, telepon);
            pr.setString(4, password);
            
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
    
  //ubah data 
    public String ubah_data( String nama_pelanggan, String alamat_pelanggan, String telepon, String password){
        String result = "";
        try{
            con = new koneksi().getkoneksi();
             String str = "INSERT INTO pelanggan(nama_pelanggan, alamat_pelanggan, telepon, password) VALUES(?,?,?,?)";
            PreparedStatement pr = con.prepareStatement(str);
            
      
            pr.setString(1, nama_pelanggan);
            pr.setString(2, alamat_pelanggan);
            pr.setString(3, telepon);
            pr.setString(4, password);
            
            
            
            int i = pr.executeUpdate();
            if(i!=0){
                result = "Data Berhasil Di Ubah";
            }
            else{
                result = "Data Gagal Di Ubah";
            }
            con.close();
        }
        catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return result;
    }
    
  //hapus data  
    public String hapus_data(String id){
        String result = "";
        try{
            con = new koneksi().getkoneksi();
            String str = "DELETE from pelanggan WHERE nama_pelanggan=?";
            PreparedStatement pr = con.prepareStatement(str);
            
            pr.setString(1,id);
            
            int i = pr.executeUpdate();
            if(i!=0){
                result = "Data Berhasil Di Hapus";
            }
            else{
                result = "Data Gagal Di Hapus";
            }
            con.close();
        }
        catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return result;
    }
    
}

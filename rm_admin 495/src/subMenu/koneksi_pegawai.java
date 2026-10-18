package subMenu;

import java.sql.*;
import javax.swing.*;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

public class koneksi_pegawai {
    Connection con = null;
    
  //get data
    public List get_data(String str){
        List<String> assetList = new ArrayList<>();
        try{
            con = new koneksi().getkoneksi();
            PreparedStatement pr = con.prepareStatement("SELECT * FROM pegawai WHERE id = ?");
            pr.setString(1, str);
            
            ResultSet rs = pr.executeQuery();
            rs.next();
            
            String id = rs.getString("id").trim();
            String nama = rs.getString("nama").trim();
            String password = rs.getString("password").trim();
            String alamat = rs.getString("alamat").trim();
            String jabatan = rs.getString("jabatan").trim();
            String telepon = rs.getString("telepon").trim();
            
            String[] dataField = {id, nama, password, alamat, jabatan};
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
            PreparedStatement pr = con.prepareStatement("SELECT * FROM pegawai ORDER BY nama ASC");
            ResultSet rs = pr.executeQuery();
            while (rs.next()){
            String id = rs.getString("id").trim();
            String nama = rs.getString("nama").trim();
            String password = rs.getString("password").trim();
            String alamat = rs.getString("alamat").trim();
            String jabatan = rs.getString("jabatan").trim(); 
            String telepon = rs.getString("telepon").trim();
            
            String[] dataField = {id, nama, password, alamat, jabatan};
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
            PreparedStatement pr = con.prepareStatement("SELECT * FROM pegawai WHERE nama LIKE ? ORDER BY nama ASC");
            pr.setString(1,str + "%");
            ResultSet rs = pr.executeQuery();
            while (rs.next()){
            String id = rs.getString("id").trim();
            String nama = rs.getString("nama").trim();
            String password = rs.getString("password").trim();
            String alamat = rs.getString("alamat").trim();
            String jabatan = rs.getString("jabatan").trim(); 
            String telepon = rs.getString("telepon").trim();
            
            String[] dataField = {id, nama, password, alamat, jabatan};
            Collections.addAll(assetList, dataField);
            }
        }
        catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return assetList;
    }
    
  //tambah data  
    public String tambah_data(String id, String nama, String password, String alamat, String jabatan, String telepon){
        String result = "";
        try{
            con = new koneksi().getkoneksi();
            String str = "INSERT INTO pegawai(id, nama, password, alamat, jabatan, telepon) VALUES(?,?,?,?,?,?)";
            PreparedStatement pr = con.prepareStatement(str);
            
            pr.setString(1, id);
            pr.setString(2, nama);
            pr.setString(3, password);
            pr.setString(4, alamat);
            pr.setString(5, jabatan);
            pr.setString(6, telepon);
            
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
    public String ubah_data(String id, String nama,String password, String alamat, String jabatan, String telepon){
        String result = "";
        try{
            con = new koneksi().getkoneksi();
            String str = "UPDATE pegawai SET nama=?, password=?, alamat=?, jabatan=?, telepon=?, WHERE id=?";
            PreparedStatement pr = con.prepareStatement(str);
            
            pr.setString(1, id);
            pr.setString(2, nama);
            pr.setString(3, password);
            pr.setString(4, alamat);
            pr.setString(5, jabatan);
            pr.setString(6, telepon);
            
            
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
            String str = "DELETE pegawai WHERE id=?";
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

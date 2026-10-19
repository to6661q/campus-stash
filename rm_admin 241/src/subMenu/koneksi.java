
package subMenu;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import javax.swing.JOptionPane;




//Classs Connection 
public class koneksi {
    public static Connection con;
    public static Connection getkoneksi(){
        String host = "jdbc:mysql://localhost/rumahmakan123", user = "admin", pass = "123";
        try{
            con = (Connection) DriverManager.getConnection(host,user,pass);
        } 
        catch(SQLException err){
                JOptionPane.showMessageDialog(null, err.getMessage());
        }
        return con;
    }     
}

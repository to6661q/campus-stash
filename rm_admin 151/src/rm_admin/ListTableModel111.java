/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package rm_admin;

import java.util.ArrayList;
import javax.swing.event.TableModelListener;
import javax.swing.table.TableModel;

//kita bukan pake array biasa, tapi kita pake Array List
//coba dibaca baca tentang array list
public class ListTableModel111 <T> implements TableModel {
    //jadi ini deklarasi untuk array list pesan, dari akun masuk ke array akun yang sedang login terus masuk ke akun array pesan, 
    //jadi array dalam array, terus jadinya ke arrayPesanan
    //arrayPesanan itu sama dengan Akun.akunYangSedangLogin.arrayPesanan
    
     
    ArrayList<Pesanan> arrayPesanan = Akun.akunYangSedangLogin.arrayPesanan;
   
    
    @Override
    public int getRowCount() {
        return arrayPesanan.size();
    }
    
//ngelag cukk :(
    
    @Override
    public int getColumnCount() {
        return 4;
    }

    //ini untuk di tabel
    @Override
    public String getColumnName(int columnIndex) {
        String col[] = {"Pesanan", "Harga", "Porsi", "Total"};
        return col[columnIndex];
    }

    
    @Override
    public Class<?> getColumnClass(int columnIndex) {
        String col[] = {"Pesanan", "Harga", "Porsi", "Total"};
        return col.getClass();
    }


    
    @Override
    public boolean isCellEditable(int rowIndex, int columnIndex) {
        return false;
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        Pesanan pesanan = arrayPesanan.get(rowIndex);
        switch(columnIndex) {
            case 0 :
                return pesanan.namaMakanan;
            case 1 :
                return pesanan.hargaporsi;
            case 2 :
                return pesanan.porsi;
            case 3 :
                return pesanan.totalharga;
            default :
                return "";
            
        }
    }

    @Override
    public void setValueAt(Object aValue, int rowIndex, int columnIndex) {
    }

    @Override
    public void addTableModelListener(TableModelListener l) {
        
    }

    @Override
    public void removeTableModelListener(TableModelListener l) {
    }

}
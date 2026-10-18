/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package rumahmakan2;

import java.util.ArrayList;
import javax.swing.event.TableModelListener;
import javax.swing.table.TableModel;

public class ListTabelHistori <T> implements TabelHistori {
    
//    ArrayList<Pesanan> arrayPesanan = Akun.akunYangSedangLogin.arrayPesanan;
//
//    @Override
//    public int getRowCount() {
//        return arrayPesanan.size();
//    }
//    
////ngelag cukk :(
//    
//    @Override
//    public int getColumnCount() {
//        return 4;
//    }
//
//    //ini untuk di tabel
//    @Override
    public String getColumnName(int columnIndex) {
        String col[] = {"user", "password", "total", "alamat"};
        return col[columnIndex];
    }
//
//    
//    @Override
    public Class<?> getColumnClass(int columnIndex) {
        String col[] = {"user", "password", "total", "alamat"};
        return col.getClass();
    }
//
//
//    
//    @Override
//    public boolean isCellEditable(int rowIndex, int columnIndex) {
//        return false;
//    }
//
//    @Override
//    public Object getValueAt(int rowIndex, int columnIndex) {
//        Pesanan pesanan = arrayPesanan.get(rowIndex);
//        switch(columnIndex) {
//            case 0 :
//                return pesanan.namaMakanan;
//            case 1 :
//                return pesanan.hargaporsi;
//            case 2 :
//                return pesanan.porsi;
//            case 3 :
//                return pesanan.totalharga;
//            default :
//                return "";
//            
//        }
//    }
//
//    @Override
//    public void setValueAt(Object aValue, int rowIndex, int columnIndex) {
//    }
//
//    @Override
//    public void addTableModelListener(TableModelListener l) {
//        
//    }
//
//    @Override
//    public void removeTableModelListener(TableModelListener l) {
//    }

}

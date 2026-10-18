
package rumahmakan;

//Biar ga pusing liatnya hehe..

//Deklarasi untuk Array pesanan

public class Pesanan {

    static void tambahPesanan(String pilihan, double hargaporsi, double parseDouble, double parseDouble0) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    public String namaMakanan;
    public double hargaporsi;
    public double porsi;
    public double totalharga;
    public double jumlahBayar;
    
    //ini untuk perhitungan sekaligus mempersingkat, jadi misalnya manggil 'pesananBaru.namaMakanan' cuma dengan 'namaMakanan';
    public static void tambahPesanan(String namaMakanan, double hargaporsi, double porsi ) {
        Pesanan pesananBaru = new Pesanan();
        pesananBaru.namaMakanan = namaMakanan;
        pesananBaru.hargaporsi = hargaporsi;
        pesananBaru.porsi = porsi;
       
        
        
        //ini perhitugan
        pesananBaru.totalharga = hargaporsi * porsi;


      //  Rincian rinci = new Rincian();
       // rinci.getSum();
        
        // ini untuk masukin ke pesananBaru, kalo lu bingun pesananBaru apaan bisa pake ctrl + klik tulisannya
        //jadi nilai dimasukin ke pesananBaru (pesananBaru ini variabel kosong)
        // kaya a, b, c
        Akun.akunYangSedangLogin.arrayPesanan.add(pesananBaru);
}
//  paham gaaaaa HAdehhh  
//    //Paham ga?
//    WOE HALLOO... WOEEEEEEEEE.............
    
    public static void bayar(double jumlahBayar) {
        
    }
    public static void hapusPesanan(int index) {
        Akun.akunYangSedangLogin.arrayPesanan.remove(index);
    }
    
    
    public static void editPesanan(int index, Pesanan element) {
        Akun.akunYangSedangLogin.arrayPesanan.set(index, element);
    }
}

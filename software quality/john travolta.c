#include<stdio.h>
#include<math.h>

//hitung gaji karyaawan

int jam_total;
int jam_lembur;
//int gaji = 15000; //perjam
int pengeluaran;
int gaji_lembur;
int gaji_total;

int main(){


	printf ("masukkan jam total kerja : " ); 
	scanf ("%d", &jam_total);
	printf ("masukkan jumlah pengeluaran : "); 
	scanf ("%d", &pengeluaran);

	gaji_lembur = (15*1500)*(jam_total-40);
	
	gajian();
	printf ("hasil gaji = %d", gaji_total);
	hasil();
	
}

int gajian (){
	if (jam_total > 40 ) {
		gaji_total = (40 * 15000) + gaji_lembur;
	}
	else {
		gaji_total = jam_total * 15000;
	}
}



int hasil(){

if (gajian > pengeluaran) {
	printf ("\nbisa menabung");
}
else if (gajian==pengeluaran){
	printf("\ntidak bisa menabung");
}
else {
	printf ("\ncari tambahan");
}
}



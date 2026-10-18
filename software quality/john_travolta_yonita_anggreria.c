#include<stdio.h>
#include<math.h>

//hitung gaji karyaawan
//yonita anggreria
//nim 11180910000007
// tugas mata kuliah software quality


int jamtot;
int jamlembur;
int pengeluaran;
int gajilembur;
int gajitotal;

int main(){


	printf ("masukkan jam total kerja : " ); 
	scanf ("%d", &jamtot);
	printf ("masukkan jumlah pengeluaran : "); 
	scanf ("%d", &pengeluaran);

	gajilembur = (15*1500)*(jamtot-40);
	
	gajian();
	printf ("hasil gaji = %d", gajitotal);
	hasil();
	
}

int gajian (){
	if (jamtot > 40 ) {
		gajitotal = (40 * 15000) + gajilembur;
	}
	else {
		gajitotal = jamtot * 15000;
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



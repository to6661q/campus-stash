/*Proses pengujian dengan metode statement coverage adalah
   menguji semua statement yang ada setidaknya sekali

  Dicontohkan pengujian dengan nilai
         x = 1 , y = 2
		 x = 2 , y = 1

  Pengujian dengan metode ini yang mengutamakan statement tidak 
  menjamin ditemukannya masalah karena terdapat jalur yang tidak
  diperiksa
  
  Jalur yang tidak diperiksa adalah apabila x == 0. padahal jika
  itu terjadi akan terjadi error dikarekan ada pembagian dengan
  nilai penyebut 0 (line32)
*/

#include<stdio.h>

int x,y;

int main(){
	
	printf("Masukkan nilai x : ");
	scanf("%d", &x);
	printf("Masukkan nilai y : ");
	scanf("%d", &y);
	
	if(x != 0){
		y += 10;
	}
	
	y = y / x;
	
	printf("%d + %d", x, y);
}

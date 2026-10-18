/*Proses pengujian dengan metode branch coverage adalah
   menguji semua cabang yang ada pada decision setidaknya sekali

  Dicontohkan pengujian dengan nilai
         x = 1 , y = 2
		 x = 0 , y = 1

  Karena metode ini menguji semua cabang yang ada pada decision
  maka ia berhasil menemukan error ada pada line 32 yg
  disebabkan oleh pembagian dengan nilai penyebut 0
  
  Jadi dapat disimpulkan metode ini lebih baik dibandingkan
  metode statement coverage
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

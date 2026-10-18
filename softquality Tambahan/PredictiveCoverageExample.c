/*Ketidakefektifan branch coverage diperbaiki dengan metode
  predictive coverage atau condition coverage dimana metode ini 
  memiliki 2 tahapan yaitu :
  
  1. mencoba kedua cabang dari decision (benar dan salah)
  2. condition pada decision juga diberlakukan benar sekali dan
     salah sekali
  
  Inputan bernilai:
  x = 0 y = 6 z = 0 (test pertama)
  x = 5 y = -5 z = 0 (test kedua)
  
  Sesuai dengan tahapan maka test pertama akan mengambil cabang
  true dan dikenakan juga true pada setiap kondisinya. sedangkan
  pada test kedua diambil jalur cabang false dan dikenakan juga
  kondisi bernilai false
*/

#include<stdio.h>

int x,y,z;

int main(){
	
	printf("Masukkan nilai x : ");
	scanf("%d", &x);
	printf("Masukkan nilai y : ");
	scanf("%d", &y);
	printf("Masukkan nilai z : ");
	scanf("%d", &z);
	
	if(x == 0 || y > 5){
		y = y / x;
	}
	
	else{
		y = y + (2/z);	
	}
	
	printf("%d + %d + %d", x, y, z);
}

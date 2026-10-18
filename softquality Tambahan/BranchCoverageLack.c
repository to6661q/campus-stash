/*Berikut ini adalah contoh ketidakefektifan branch coverage
  ketika decision statement memiliki local condition seperti
  AND,OR
  
  Inputan bernilai:
  x = 5 y = 5 z = 0
  x = 5 y = -5 z = 0
  
  Ketidakefektifan hasil terlihat dari error pada line (27) yang
  tidak terdeteksi disebabkan pembagian dengan 0
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

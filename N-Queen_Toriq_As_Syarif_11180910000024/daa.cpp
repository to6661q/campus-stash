#include<stdio.h>
#include<math.h>
 
int board[10],count;
int main()
{
	int n,i,j;
	void queen(int baris,int n);
	printf("=========  program N-Queen dengan Metode Backtracking =======\n");
 	printf(" Nama : TORIQ AS SYARIF \n");
 	printf(" NIM  : 1118091000024 \n");
 	printf("\nMasukkan n angka program N-Queen:");
 	scanf("%d",&n);
 	queen(1,n);
 	return 0;
}
 
//Fungsi yang digunakan untuk menampilkan program
void print(int n)
{
 	int i,j;
 	printf("\n\nHasil Solusi ke-%d:\n\n",++count);
 	for(i=1;i<=n;++i)
  		printf("\t%d",i);
 	for(i=1;i<=n;++i)
 	{
		printf("\n\n%d",i);
  		for(j=1;j<=n;++j)
	  		{
   				if(board[i]==j)
    				printf("\tQ");
   				else
    				printf("\t-");
  			}
 	}
}

//Fungsi untuk  mengecek problem yang terjadi
int place(int baris,int kolom)
{
 	int i;
 	for(i=1;i<=baris-1;++i)
 	{
  		if(board[i]==kolom)
   		return 0;
  		else
   			if(abs(board[i]-kolom)==abs(i-baris))
    	return 0;
 	}	
 
 	return 1;
}
 
//Fungsi yang digunakan untuk memeriksa posisi N-Queen secara benar atau sesuai
void queen(int baris,int n)
{
 	int kolom;
 	for(kolom=1;kolom<=n;++kolom)
 		{
  			if(place(baris,kolom))
 				{
   					board[baris]=kolom; 
   					if(baris==n)
    				print(n);
   			else
    			queen(baris+1,n);
  				}
 		}
}

/*	Tugas Implementasi Kompleksitas Algoritma Binary Search
	
	Kelompok 3
	Faturrachman (11180910000014)
	Ahmad Rustdi Harahap (11180910000023)
	Toriq As Syarif (11180910000024)
	Mutia Salsabila (11180910000113)
	Nabila Malika Amalia (11180910000128)
	
	Kelas 4 D 
*/
#include <stdio.h>
 
int main()
{
    int array[100];
    int i, j, num, temp, angkacari;
    int angkaawal, angkatengah, angkaakhir; 
    printf("Masukkan elemen angka interval : ");
    scanf("%d", &num);
    printf("Masukkan elemen angka :\n");
    for (i = 0; i < num; i++)
    {
        scanf("%d", &array[i]);
    }
    printf("Data elemen angka yang diinput : \n");
    for (i = 0; i < num; i++)
    {
        printf("%d\n", array[i]);
    }

    for (i = 0; i < num; i++)
    {
        for (j = 0; j < (num - i - 1); j++)
        {
            if (array[j] > array[j + 1])
            {
                temp = array[j];
                array[j] = array[j + 1];
                array[j + 1] = temp;
            }
        }
    }
    printf("Data input an yang sudah diurutkan : \n");
    for (i = 0; i < num; i++)
    {
        printf("%d\n", array[i]);
    }
    printf("Masukkan elemen yang ingin dicari : ");
    scanf("%d", &angkacari);

    angkaawal = 1;
    angkaakhir = num;
    do
    {
        angkatengah = (angkaawal + angkaakhir) / 2;
        if (angkacari < array[angkatengah])
            angkaakhir = angkatengah - 1;
        else if (angkacari > array[angkatengah])
            angkaawal = angkatengah + 1;
    } while (angkacari != array[angkatengah] && angkaawal <= angkaakhir);
    if (angkacari == array[angkatengah])
    {
		for (i=0;i<=num;i++)
		{
			if (array[i]==angkacari)
			{
        	 printf("Elemen angka yang dicari berada di array ke : %d\n", i+1);
     		}
    	 }	
    }
    else
    {
        printf(" Hasil pencarian elemen angka tidak ada \n");
    }
}

#include<iostream> 
using namespace std; 

/*
Program Binary Search
Dibuat oleh kelompok 3 :
	Fathurrachman 				(11180910000019)
	Ahmad Rusydi Said Harahap	(11180910000023)
	Toriq As Syarif				(11180910000024)
	Mutia Salsabila				(11180910000113)
	Nabila Lailika Amalia		(11180910000128)

*/


int binarySearch(string lst[], int low, int up, string search);

int main() 
{ 
	string search;
	int result;
	
//Deklarasi Array	
	string kata[]= {"au", "marbada", "makkatai" , "lului" , "ro", "dalam", "madabu","mangan","maridi","mangalo"};
	string arti[]={"aku", "berantam", "bicara", "cari", "datang", "jalan","jatuh","makan","mandi","melawan"};
	
	for(int i=0;i<=9;i++)
   	{
   	cout<<"kata -"<<i<<" : "<<kata[i]<<endl;
   	cout<<"arti\t: "<<arti[i]<<endl;
   	}
   	
   	cout<<"kata yang ingin dicari : ";
   	cin>>search;
	
    
    int i = sizeof(kata) / sizeof(kata[0]); 
    
    result = binarySearch(kata, 0, i - 1, search); 
    if(result == -1)
	{
		cout << "Not Found";
	}
	else
	{
		cout << "Element "<<search<<" in index "<< result<<" arti: "<<arti[result]<<endl;; 
	}	
                   
    return 0; 
}

int binarySearch(string lst[], int low, int up, string search) 
{ 
    if (up >= low) { 
        int mid = low + (up - low) / 2; 
  
        if (lst[mid] == search) 
            return mid; 

        if (lst[mid] > search) 
            return binarySearch(lst, low, mid - 1, search); 
  
        return binarySearch(lst, mid + 1, up, search); 
    } 
  
    return -1; 
} 
  
 


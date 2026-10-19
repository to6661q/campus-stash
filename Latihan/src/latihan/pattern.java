/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package latihan;

/**
 *
 * @author win10
 */
class pattern {
    static int[] generatePrefixTable(String pattern){
        int[] table = new int [pattern.length()];
        int j = 0;
        table[0]=0;
        
        for (int i = 1; i < pattern.length();){
            if(pattern.charAt(i) == pattern.charAt(j)){
                
                j++;
                table[i] = j;
                i++;
            }else {
                if (j != 0){
                    j = table[j-i];
                    
                } else{
                    table[i] = 0;
                    i++;
                }
            }
        }
        return table;
    }
    
    static void searchMethod(String pattern, String txt){
        int table[] = generatePrefixTable(pattern);
        
        boolean status = false;
        
        int txtPos = 0;
        int patternPos = 0;
        
        while (txtPos < txt.length()){
            
            if (pattern.charAt(patternPos) == txt.charAt(txtPos)){
                patternPos++;
                txtPos++;
            }
            if(patternPos == pattern.length()){
                status = true;
                System.out.println("angka ketemu" + (txtPos - patternPos));
                return;
            } else if (pattern.charAt(patternPos)!= txt.charAt(txtPos)){
               status = false;
               if  (patternPos !=0)
               patternPos = table[patternPos-1];
               
               else
               txtPos++;
        }
        }
        if (status == false){
            System.out.println("data tidak ditemukan");
        }
    }
}

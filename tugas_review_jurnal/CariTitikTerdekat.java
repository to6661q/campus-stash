import java.util.Scanner;
import java.lang.Math;

public class CariTitikTerdekat
{
    public static void main(String[] args)
    {
        Scanner scan = new Scanner(System.in);

        System.out.print("Masukkan interval titik sebaran: ");
        final int numtitik = scan.nextInt();

        double[][] titik = new double[numtitik][2];
        double shortestDistance=0;
        double distance=0;
        String titikdekat1="";
        String titikdekat2="";

        for (int i=0; i<numtitik; i++)
        {
                System.out.print("Masukkan Titik x" + i + ": ");
                titik[i][0] = scan.nextDouble();
                System.out.print("Masukkan Titik y" + i + ": ");
                titik[i][1] = scan.nextDouble();
        }

        for (int i=0; i<numtitik; i++)
        {
            for (int m=i; m<numtitik-1;m++)
            {
                double dx = titik[i][0] - titik[m+1][0];
                double dy = titik[i][1] - titik[m+1][1];
                distance = Math.sqrt(dx*dx + dy*dy);

                if (m == 0 && i == 0)
                {
                    shortestDistance = distance;
                    titikdekat1 = "(" + titik[0][0] + "," + titik[0][1] + ")";
                    titikdekat2 = "(" + titik[1][0] + "," + titik[1][1] + ")";
                }

                else if (distance < shortestDistance)
                {
                    shortestDistance = distance;
                    titikdekat1 = "(" + titik[i][0] + "," + titik[i][1] + ")";
                    titikdekat2 = "(" + titik[m+1][0] + "," + titik[m+1][1] + ")";
                }
            }
        }
        System.out.println("Jarak terdekat yaitu: " + shortestDistance);
        System.out.println("Titik yang terdekat yaitu " + titikdekat1 + " and " + titikdekat2);
    }   
}
package amazeproject;
import gui.aMazeGUI;
import java.awt.Color;
import java.awt.Graphics;
import java.util.ArrayList;
import java.util.EmptyStackException;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.Stack;
import java.util.Vector;
import javax.swing.JPanel;

public class Maze extends JPanel 
//Class untuk representasi Maze 
{
    public int sizeX = 15;
    public int sizeY = 15;
    
    private Cell cells[][] = null;
    private Stack cellStack = new Stack();
    private int visitedCells = 1;
    private int totalCells = sizeX * sizeY;
    private Cell currentCell = null;
    private Stack steps; 
    private boolean drawRoute = false;
    private int routingMap[][];
    public boolean debugMode = false;
    
    public Maze() 
    //Digunakan untuk membuat contoh/instance Maze baru
    {
        init(10,10);
    }
    public void init(int width, int height)
    //Digunakan untuk menginisiasi struktur  Maze
    {    
        sizeX = width;
        sizeY = height;
        cells = new Cell[sizeX][sizeY];
        totalCells = sizeX * sizeY;
        for (int i = 0; i < sizeX; i++)
                for (int j = 0; j < sizeY; j++)
                {
                        cells[i][j] =  new Cell(this);
                        cells[i][j].row = i;
                        cells[i][j].col = j;
                }
        currentCell = cells[0][0];
        visitedCells = 1;
        cellStack.clear(); 
    }
    private ArrayList getNeighborsWithWalls(Cell cCell)
    //Membalikan semua Cell tetangga/sekitar yang memiliki semua wall dengan mengarahkan Cell tetangga/sekitar dicari
    {
        ArrayList neighbors = new ArrayList();
        int count = 0;        
        for (int countRow = -1; countRow <= 1; countRow++)
                for (int countCol = -1; countCol <= 1; countCol++)
                {
                        if ( (cCell.row + countRow < sizeX) &&  
                                 (cCell.col+countCol < sizeY) &&
                                 (cCell.row+countRow >= 0) &&
                                 (cCell.col+countCol >= 0) &&
                                 ((countCol == 0) || (countRow == 0)) &&
                                 (countRow != countCol)
                                )
                        {
                                if (cells[cCell.row+countRow][cCell.col+countCol].hasAllWalls())
                                {
                                        neighbors.add( cells[cCell.row+countRow][cCell.col+countCol]);
                                }
                        }
                }
        return neighbors;
    }
    public void  generate()
    //Digunakan untuk generator otomastis Maze
    {  
        drawRoute = false;
        while (visitedCells < totalCells)
        {
                ArrayList adjacentCells = getNeighborsWithWalls(currentCell);
                if (adjacentCells.size() > 0)
                {
                        int randomCell = (int)Math.floor(Math.random() * adjacentCells.size());
                        Cell cell = ((Cell)adjacentCells.get(randomCell));
                        currentCell.knockDownWall(cell);
                        cellStack.push(currentCell);
                        currentCell = cell;
                        visitedCells++;
                }
                else
                {
                        currentCell = (Cell)cellStack.pop();
                }
        }
        cells[0][0].isStart = true;
        cells[sizeX-1][sizeY-1].isEnd = true;
        cells[sizeX-1][sizeY-1].weight = sizeX * sizeY - 1;        
        repaint();
    }
    public void trace() 
    //Fungsi yang digunakan untuk memulai proses pelacakan (memilih cara yang tepat dari routingMap)
    {
        steps = new Stack();        
        Cell currentCell = cells[sizeX-1][sizeY-1];
        cells[sizeX-1][sizeY-1].visited = true;
        trace(currentCell);
        drawRoute = true;
    }
    public void trace(Cell currentCell) 
//Fungsi yang digunakan untuk mengikuti jalur yang diberikan dari currentCell
//menggunakan routingMap untuk memilih cara yang tepat dan jalur terpendek
    {
        int smallestWeight = 1;
        int endpoint = sizeX * sizeY - 1;
        while ( currentCell.weight != endpoint ) 
        {
            Vector adjCells = currentCell.findPath();
            // Memilih semua jalur yang berdekatan
            Iterator  it = adjCells.iterator();
            boolean backtrack = true;
            while ( it.hasNext() ) 
            {
                Cell c = (Cell)it.next();
                // Jika Cell dilewati untuk pertama kalinya
                if ( !c.visited ) 
                {
                    c.weight = this.routingMap[c.row][c.col]; 
                    if ( debugMode )
                        System.out.println("C.weight: " + c.weight + " smallest weight: " + smallestWeight);
                    if (  c.weight == endpoint ) 
                    //Keadaan endpoint/titik akhir terdeteksi
                    {
                        steps.push(c);    
                        backtrack = false;
                    } 
                    else if  ( c.weight == smallestWeight ) 
                    {
                        steps.push(c);
                        backtrack = false;
                    }
                }
            }
            if ( backtrack )
            //Digunakan untuk mengatasi backtracking
            {
                if ( debugMode ) 
                {        
                    System.out.println("Backtracking");
                    System.out.println("Weight:" + smallestWeight);
                }
                if ( !steps.isEmpty() ) 
                //Digunakan untuk pop langkah terakhir
                {
                    steps.pop();
                    smallestWeight--;
                    //Digunakan untuk decrement/penurunan weight
                }
            }
            try 
            {
                Cell tmp = (Cell)steps.peek();
                //Berfungsi mengintip langkah untuk memproses
                if ( !tmp.visited ) 
                {
                    if ( debugMode )
                        System.out.println("Going to : row: " + tmp.row + " col: " + tmp.col );
                    currentCell = tmp;
                    currentCell.visited = true;
                    this.cells[currentCell.row][currentCell.col].visited = true;;
                    smallestWeight++;
                    // Digunakan untuk increment/penambahan weight
                }
            }
            catch (EmptyStackException e ) {
            }
        }       
    };
    public void solve(aMazeGUI parent)
    //Menjalankan algoritma pemecahan berdasarkan tabel routing
    {
            LinkedList frontier = new LinkedList();
            routingMap = new int[sizeX][sizeY];
            //Mengalokasikan memori untuk proses routing map
            for ( int i = 0; i < sizeX; i++ )
                for ( int j = 0; j < sizeY; j++ )
                    routingMap[i][j] = -1;
            int currentWeight = 0;
            int targetX = sizeX -1;
            int targetY = sizeY -1;  
            int startX = 0;
            int startY = 0;
            routingMap[startX][startY] = sizeX * sizeY -1;
            //Digunakan untuk memberikan weight tertinggi ke titik awal
            if ( debugMode ) 
            {
                System.out.println("Start: " + startX + " " +  startY);
                System.out.println("Target: " + targetX + " " +  targetY);
            }
            routingMap[targetX][targetY] = currentWeight;   
            Cell nC = cells[targetX][targetY];
            nC.weight = currentWeight;
            frontier.addLast(nC);
            while ( !frontier.isEmpty() )
            //Keadaan dimana jika antrian tidak nol atau kosong
            {
                boolean changed = false;
                Cell currentCell = (Cell)frontier.removeFirst();
                int mapValue = routingMap[currentCell.row][currentCell.col];
                if ( mapValue != sizeX * sizeY - 1 ) 
                {
                    Vector vct = currentCell.findPath(); 
                    //Menemukan semua jalur yang mungkin dari Cel
                    if (debugMode)
                        System.out.println(vct);                    
                    Iterator it = vct.iterator();
                    while (it.hasNext() ) 
                    {
                        Cell c = (Cell)it.next();
                        if ( routingMap[c.row][c.col] == -1 ) 
                        //Keadaan dimana jika Cell tidak dilewatisebelumnya
                        {
                            c.weight = currentCell.weight + 1;
                            routingMap[c.row][c.col] = c.weight;  
                            if ( debugMode )
                                System.out.println(c.row + " " + c.col + " weight: " + c.weight);
                            frontier.addLast(c);         
                        }
                    }   
                    currentWeight++;
                }
            }            
            if ( debugMode ) 
            {
                printRoutingMap();
                System.out.println("--------------Trace----------------");
            }
            trace();
            //Memulai tracing - proses pemilihan jalur berdasarkan jarak dalam routingMap 
            if ( debugMode )
                printTrace();
            try 
            {
                Thread.currentThread().sleep(500);
            } catch (InterruptedException ex) 
            {
                ex.printStackTrace();
            }
            repaint();
            parent.disableSolveButton();
        }
    public void printTrace() 
    //Fungsi yang digunakan untuk mencetak atau print trace/jejak
    {
        System.out.println("STACK Content: \n");    
        Iterator it = steps.iterator();
        while ( it.hasNext() ) 
        {
            Cell tmp = (Cell)it.next();
            if ( tmp.visited )
                System.out.println(tmp);
        }       
    }
    public void drawTrace(Graphics g )
    //Fungsi yang digunakan untuk mewarnai trace/jejak
    {        
        g.setColor(Color.green);
        Iterator it = steps.iterator();
        while ( it.hasNext() ) 
        {
            Cell tmp = (Cell)it.next();
            if ( tmp.visited ) 
            {                
g.fillRect( tmp.row*tmp.cellSize + tmp.padding, tmp.col*tmp.cellSize + tmp.padding, tmp.cellSize, tmp.cellSize );
                
            }
        }
        g.setColor(Color.black);
    }
    public void printRoutingMap() 
    //Fungsi yang digunakan untuk mencetak atau print routing map
    {
        for ( int j = 0; j < sizeY; j++ ) 
        {
            for ( int i = 0; i < sizeX; i++ )      
               System.out.print(routingMap[i][j] + "\t");   
           System.out.println("");
        }
    }    
    public Cell getCell(int x, int y )
    //Fungsi yang digunakan untuk mengembalikan Cell yang diberikan
    //dengan cara mengarahkan Cell-Cell terkait dengan koordinat yang diberikan
    {
        return this.cells[x][y];
    }
     public void paintComponent(Graphics g)
    //Fungsi yang digunakan untuk mewarnai seluruh Maze
     {
        g.clearRect(0,0, this.getWidth(), this.getHeight() ); 
        if (drawRoute) 
        {
            this.drawTrace(g);
        }
        for (int i = 0; i < sizeX; i++) 
        {
                for (int j = 0; j < sizeY; j++)
                {
                        cells[i][j].paint(g);
                }
        }        
     }    
}
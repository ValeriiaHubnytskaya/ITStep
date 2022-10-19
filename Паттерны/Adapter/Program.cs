using System;

namespace Adapter
{
    class Archiver
    {
        virtual public void Compress()
        {
            Console.WriteLine("Compress ");
        }
    }

    class Zip : Archiver
    {
        public override void Compress()
        {
            Console.Write("Zip ");          
        }
    }

    class Rar : Archiver
    {
        public override void Compress()
        {
            Console.Write("RAR ");      
        }
    }

    class Arj
    {
        public void archive()
        {
            Console.WriteLine("Arj ");
        }
    }

    class Adapter : Archiver
    {
        Arj a = new Arj();
        public override void Compress()
        {
            Console.Write("Adapter ");
            a.archive();
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            int choice;
            Console.WriteLine("1.Adapter" + " 2.Zip" + " 3.Rar");
            choice = Convert.ToInt32(Console.ReadLine()); 
            
                switch (choice)
                {
                    case 1:
                        Adapter a = new Adapter();
                        a.Compress();
                        break;
                    case 2:
                         Zip z = new Zip();
                        z.Compress();
                        break;
                    case 3:
                         Rar r = new Rar();
                        r.Compress();
                        break;
                }                  
        }
    }
}

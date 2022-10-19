using System;

namespace Tuples
{
    struct TestStruct
    {
        public int X;
    }

    class TestClass
    {
        public int X;
    }
    class Program
    {
        static void Main(string[] args)
        {
            (int X, int Y) Point = (5, 10); //кортежи
            Console.WriteLine($"X = {Point.X}, Y = {Point.Y}");

            (int age, string name) Man = (25, "Batman");
            Console.WriteLine($"Hello! I am {Man.name}, I am {Man.age}");

            var Point3D = (X: 10, Y: 5, Z: 0);
            Console.WriteLine($"X = {Point3D.X}, Y = {Point3D.Y} , Z = {Point3D.Z}");

            (int x, int y, int z) = Point3D;
            Console.WriteLine($" x = {x}, y =  {y}, z = {z}");
            Test(x, y);

            TestStruct obj1 = new TestStruct();
            obj1.X = 10;
            TestStruct obj2 = obj1;
            Console.WriteLine($"obj2.X = {obj2.X}");

            TestClass obj3 = new TestClass();
            obj3.X = 10;
            TestClass obj4 = obj3;
            Console.WriteLine($"obj4.X = {obj4.X}");

            //(int, int) Quandrant = (1, -1);
            //switch(Quandrant)
            //{
            //    case (1, 1):
            //        Console.WriteLine("1");
            //        break;
            //    case (-1, 1):
            //        Console.WriteLine("2");
            //        break;
            //    case (-1, -1):
            //        Console.WriteLine("3");
            //        break;
            //    case (1, -1):
            //        Console.WriteLine("4");
            //        break;                    
            //}

            Object i = "Hello";
            Console.WriteLine($"{i}");

            i = 5;
            Console.WriteLine($"{i}");

            switch(i)
            {
                case int b:
                    Console.WriteLine("This is the number!!!");
                    break;
                case string s:
                    Console.WriteLine("This is a string!!");
                    break;
                default:
                    Console.WriteLine("=)");
                    break;
            }



        }

        static void Test(int a, int b)
        {
            Console.WriteLine($"A = {a}, B = {b}");
        }
    }
}

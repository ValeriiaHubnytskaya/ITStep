using System;

namespace Decorator
{
    class Program
    {
        static void Main(string[] args)
        {
            Shape s = new Rectangle();
            s = new Red();
            Console.WriteLine(s.getName());
        }
        interface Shape
        {
            string getName();
        }

        class Rectangle : Shape
        {
            public string getName()
            {
                return "Rectangle";
            }
        }

        class Triangle : Shape
        {
            public string getName()
            {
                return "Triangle";
            }
        }

        class Properties : Shape
        {
            protected Shape s;
            public string getName()
            {
                return s.getName();
            }
        }

        class Red : Properties
        {      
          
            public string Color()
            {
                return "Red" + s.getName();
            }
        }

        class Blue : Properties
        {
            public string Color()
            {
                return "Blue" + s.getName();
            }
        }
    }
}

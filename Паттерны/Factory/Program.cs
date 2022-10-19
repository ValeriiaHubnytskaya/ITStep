using System;
using System.Net;
using System.Collections.Generic;

namespace Fabric
{
abstract class House
{

}

class WoodenHouse : House
{
    public WoodenHouse()
        {
        Console.WriteLine( "Построен деревянный дом.");
        }
}

class BrickHouse: House
{
    public BrickHouse()
    {
        Console.WriteLine("Построен кирпичный дом.");
    }
}
 abstract class HouseFactory
 {
     private string Name { get; set; }

     public HouseFactory(string n)
     {
         Name = n;
         Console.WriteLine($"Вы работаете с застройщиком под названием: {Name} ");
     }
     abstract public House BuildHouse();
 }

    class WoodenHouseFactory : HouseFactory
    {
        public WoodenHouseFactory(string n) : base(n)
        {
           
        }

        public override House BuildHouse()
        {
            return new WoodenHouse();
        }
    }

    class BrickHouseFactory : HouseFactory
    {
        public BrickHouseFactory(string n) : base(n)
        {

        }

        public override House BuildHouse()
        {
            return new BrickHouse();
        }
    }


    class Program
    {
        static void Main(string[] args)
        {
            HouseFactory factory = new WoodenHouseFactory("7 небо");
            factory.BuildHouse();

            factory = new BrickHouseFactory("КиевБуд");
            factory.BuildHouse();
        }

        static public void HouseBuilderClient(HouseFactory factory)
        {
            factory.BuildHouse();
        }
    }
}

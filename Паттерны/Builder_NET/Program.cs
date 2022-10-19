using System;
using System.Collections.Generic;

namespace Builder_NET
{
    interface IBuilder
    {
        void StartBuildingProcess();
        void AddEngine();
        void AddTransmission();
        void AddWheels();
        void EndBuildingProcess();

        Product GetProduct();
    }

    class Product
    {
        LinkedList<string> parts;
        public Product()
        {
            parts = new LinkedList<string>();
        }
        public void Add(string component)
        {
            parts.AddLast(component);
        }
        public void Print()
        {
            Console.WriteLine("Printing components List:");
            foreach(string component in parts)
            {
                Console.WriteLine(component);
            }
        }
    }
    class CarBuilder : IBuilder
    {
        string carManufacturer;
        private Product product;
            public CarBuilder(string carName)
        {
            product = new Product();
            carManufacturer = carName;
        }

       public void StartBuildingProcess()
        {
            product.Add(string.Format($"Car named {carManufacturer}"));
        }

        public void AddEngine()
        {
            product.Add("Engine VS");
        }

        public void AddTransmission()
        {
            product.Add("Automatic transmmision");
        }

        public void AddWheels()
        {
            product.Add(" 4 wheels");
        }
           
        public void EndBuildingProcess()
        {
            Console.WriteLine("Car construction finished");
        }

         public Product GetProduct()
        {
            return product;
        }

    }

    class TruckBuilder : IBuilder
    {
        string carManufacturer;
        private Product product;
        public TruckBuilder(string carName)
        {
            product = new Product();
            carManufacturer = carName;
        }

        public void StartBuildingProcess()
        {
            product.Add(string.Format($"Car named created {carManufacturer}"));
        }

        public void AddEngine()
        {
            product.Add("Engine V12");
        }

        public void AddTransmission()
        {
            product.Add("Automatic 26 gears transmmision");
        }

        public void AddWheels()
        {
            product.Add(" 12 wheels");
        }

        public void EndBuildingProcess()
        {
            Console.WriteLine("Truck construction finished");
        }

        public Product GetProduct()
        {
            return product;
        }
    }

    class Director
    {
        IBuilder builder;
        public void Construct(IBuilder _builder)
        {
            this.builder = _builder;
            builder.StartBuildingProcess();
            builder.AddEngine();
            builder.AddTransmission();
            builder.AddWheels();
            builder.EndBuildingProcess();
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Director director = new Director();

            IBuilder carBuilder = new CarBuilder("BMW X5");
            IBuilder truckBuilder = new TruckBuilder("KAMAZ");

            director.Construct(carBuilder);
            Product car = carBuilder.GetProduct();
            car.Print();

            director.Construct(truckBuilder);
            Product truck = truckBuilder.GetProduct();
            truck.Print();

        }
    }
}

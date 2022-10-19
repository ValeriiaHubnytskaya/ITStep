using System;
using System.Collections.Generic;

namespace Observer
{
    public interface IObserver
    {
         void update(int temp, int pressure, int humidity);
    }
    public interface ISubject
    {
        void addObserver(IObserver obs);
         void removeObserver(IObserver obs);
         void notifyObserver();
    }

    public class WeatherStation : ISubject
    {
        private List<IObserver> observers;

        private int temperature;
        private int pressure;
        private int humidity;

        private readonly Random rand; 

        public WeatherStation()
        {
            observers = new List<IObserver>();

            rand = new Random();
            temperature = rand.Next(-25, 50);
            pressure = rand.Next(50, 150);
            humidity = rand.Next(0, 100);
        }
        public void updateData() {
            temperature = rand.Next(-25, 50);
            pressure = rand.Next(50, 150);
            humidity = rand.Next(0, 100);
            notifyObserver();
        }
        public void addObserver(IObserver observer)
        {
            observers.Add(observer); 
        }

        public void removeObserver(IObserver observer)
        {
            observers.Remove(observer);
        }

        public void notifyObserver()
        {
            foreach(IObserver observer in observers)
            {
                observer.update(temperature, pressure, humidity);
            }
        }
    }

   public class DigitalDisplay : IObserver
    {
        public void update(int temperature, int pressure, int humidity)
        {
            Console.WriteLine($"Temperature: {temperature}  \n Pressure: {pressure} \n Humidity: {humidity} \n" );
        }
    }

    public class Digital : IObserver
    {
        private int MinT = 50;
        private int MaxT = -25;
        private int MinP = 150;
        private int MaxP = 50;
        private int MinH = 100;
        private int MaxH = 0;
        public void update(int temperature, int pressure, int humidity)
        {
            if(MinT > temperature)
            {
                MinT = temperature;
                Console.WriteLine($"Min temp: {temperature}");
            }
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            WeatherStation ws = new WeatherStation();
            DigitalDisplay ds = new DigitalDisplay();
           

            ws.addObserver(ds);
            for (int i = 0; i < 5; i++)
            {
                ws.updateData();
            }
            

        }
    }
}

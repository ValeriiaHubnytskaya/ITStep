using System;
using System.Collections.Generic;
using System.Linq;
using System.Timers;

namespace Claaswork_5
{
     public interface IObserver
    {
        void update(int number);
    }

    public interface ISubject
    {
        void AddObserver(IObserver obs);
        void Remove(IObserver obs);
        void NotifyObserver();
    }
    public class RandomGenerator : ISubject
    {
        private List<IObserver> observers;

        private readonly Random _random = new Random();
        private readonly static System.Timers.Timer timer = new System.Timers.Timer(1000);
        private int currentRandomValue = -999;

        public RandomGenerator()
        {
            observers = new List<IObserver>();

            timer.Elapsed += GetNextNumber;
            timer.Enabled = true;
            timer.AutoReset = true;
            timer.Start();
        }
        private void GetNextNumber(Object source, ElapsedEventArgs e)
        {
            currentRandomValue = _random.Next(1, 100);
            NotifyObserver();
            Console.WriteLine("Timer event fired");
        }
        public int GetCurrentRandomValue()
        {
            return currentRandomValue;
        }
        public void StopTimer()
        {
            timer.Stop();
            timer.Dispose();
        }
        public void AddObserver(IObserver obs)
        {
            observers.Add(obs);
        }
        public void Remove(IObserver obs)
        {
            observers.Remove(obs);
        }
        public void NotifyObserver()
        {
            foreach (IObserver obs in observers)
            {
                obs.update(currentRandomValue);
            }
        }
    }

    class EvenNumberCounter : IObserver
    {
        private int counter = 0;
        public void CheckNumber(int number)
        {
            if(number % 2 == 0)
            {
                counter++;
            }
        }
        public int Counter { get; }

        public void update(int number)
        {
            CheckNumber(number);
            Console.WriteLine($"Even number counter: {counter} \t even number {number}");
        }
    }

    class NotEvenNumberCounter : IObserver
    {
        private int counter = 0;

        public void CheckNumber(int number)
        {
            if(number % 2 != 0)
            {
                counter++;
            }
        }
        public int Counter { get; }
        public void update(int number)
        {
            CheckNumber(number);
            Console.WriteLine($" Not Even number counter: {counter} \t not  even number {number}");
        }
    }

    class MultipleNumbers5 : IObserver
    {
        private int counter = 0;
        public void CheckNumber(int number)
        {
            if(number % 5 == 0)
            {
                counter++;
            }
        }

        public int Counter { get; }
        public void update(int number)
        {
            CheckNumber(number);
            Console.WriteLine($"Multiple number counter: {counter} \t multiple number {number}");
        }
    }

    public class Program
    {
        public RandomGenerator _rg = new RandomGenerator();

        public static void Main(string[] args)
        {
            var obj = new Program();
            EvenNumberCounter ENC = new EvenNumberCounter();

            obj._rg.AddObserver(ENC);
            for (int i = 0; i < 10; i++)
            {
                Console.WriteLine("Press any key...");
                Console.ReadKey();
                Console.WriteLine(obj._rg.GetCurrentRandomValue());
            }
            obj._rg.StopTimer();

        }

    }
}

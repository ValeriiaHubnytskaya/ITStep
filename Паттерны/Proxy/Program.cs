using System;

namespace Proxy
{
    // Структурный паттерн, который позволяет подставить более "легкий"
    //  объект вместо объекта, требующего большого количества ресурсов
    // С точки зрения клиента, прокси ведет себя также, как исходный объект
    // (имеет такой же интерфейс)

    interface IBankAccessProvider
    {
        int GetAccountNumber();
        int GetAccountBalance(int accountNumber);
    }

    class MonoBank : IBankAccessProvider
    {
        Random rand = new Random();

        public int GetAccountNumber()
        {
            return rand.Next(100000, 999999);
        }

        public int GetAccountBalance(int accountNumber)
        {
            return rand.Next(10, 1000000);
        }
    }

    class ProxyBank : IBankAccessProvider
    {
        IBankAccessProvider provider;

        public int GetAccountNumber()
        {
            if (provider == null)
            {
                provider = new MonoBank();
            }
             return provider.GetAccountNumber();
        }

        public int GetAccountBalance(int accountNumber)
        {
            return provider.GetAccountBalance(accountNumber);
        }
      
    }
    class Program
    {
        static void Main(string[] args)
        {
            ProxyBank bank = new ProxyBank();
            Console.WriteLine($"Bank Account: {bank.GetAccountNumber()}");
            Console.WriteLine($"Account balance: {bank.GetAccountBalance(123)}");
        }
    }
}

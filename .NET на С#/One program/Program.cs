using System;

//Начальный вклад в банке равен 1000 грн. Через каждый месяц размер вклада увеличивается на введенное количество процентов от имеющейся суммы. 
//По данному количеству процентов определить, через сколько месяцев размер вклада превысит 1500 грн., и вывести найденное количество месяцев и итоговый размер вклада.


namespace ConsoleApp1
{
    class Program
    {

        static void Main(string[] args)
        {
            decimal money = 1000;
            int month = 0;
            do
            {
                try
                {
                    Console.WriteLine("Enter tne percente: ");
                    int percente = Convert.ToInt32(Console.ReadLine());

                    while (money < 1500)
                    {                        
                        money += percente * 1000 / 100;
                        month++;
                    }

                    Console.WriteLine($"Month: {month} \t Sum: {money}");
                }
                catch (FormatException ex)
                {
                    Console.WriteLine(ex.Message);
                }

            } while (money > 1500);
        }
    }
}

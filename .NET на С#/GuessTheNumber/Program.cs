using System;

namespace GuessTheNumber
{
    class Program
    {
        static void Main(string[] args)
        {
          
            
            void GuessTneNumber()
             {
                int min = 0;
                int max = 100;
                while (true)
                {
                    int number = min + (max - min) / 2;
                    Console.WriteLine($"Guess the number!!! {number}");

                    char symbol = Convert.ToChar(Console.ReadLine());
                    if(number == 'y')
                    {
                        Console.WriteLine($"You guessed!! \t Number: {number}");
                        break;
                    }
                    if (number == 'l')
                    {
                        max = max - (max - min) / 2;
                    }
                    if (number == 'h')
                    {
                        min = min + (max - min) / 2;
                    }
                }
            }

            GuessTneNumber();
        }

        

    }
       

}

   


 



using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


//Приложение Украино-Русский словарь
//Меню:
//1.Добавить слово - (введите Укр:, введите Рус:)
//2.Просмотреть весь словарь 
//3. Найти по Укр слову
//4. Найти по Рус слову
//5. Удалить (введите Укр: а) удалено б) не найдено)

namespace Translator
{
    class Translator
    {
   

    public string RuWord { get; set; }        
        public string UkrWord { get; set; }

        

        Dictionary<string, string> words;
        public Translator()
        {
            words = new Dictionary<string, string>();
           
        }

        void NewWords(string ruWord,string ukrWord)
        {
            words.Add(ukrWord,ruWord);
        }
        public void InputWords()
        {

            Console.WriteLine("Enter a word in Ukrainian: ");
            UkrWord = Console.ReadLine();
            Console.WriteLine("Enter a word in Russian: ");
            RuWord = Console.ReadLine();
            NewWords(UkrWord,RuWord);           
        }

        public void DictionaryPrint()
        {
            foreach(var D in words)
            {
                Console.WriteLine(D.Key + " - " + D.Value);
            }
        }      

        public void FindRuWord()
        {
             string findRu;
            Console.WriteLine("Enter the find word:");
            findRu = Console.ReadLine();

            var res = words.Where((p) => p.Value == findRu).FirstOrDefault();
            Console.WriteLine($"Found!! Words: {res}");        

        }

        public void FindUkrWord()
        {
            string findUkr;
            Console.WriteLine("Enter the find word:");
            findUkr = Console.ReadLine();

            var  res1 = words.Where((p) => p.Key == findUkr).FirstOrDefault();
            Console.WriteLine($"Found!! Words: {res1}");                   
          
            }    
        
        public void RemoveUkrWords()
        {
            string deleteUkr;
            Console.WriteLine("Enter the  word you want to delete:");
            deleteUkr = Console.ReadLine();

            if (words.Remove(deleteUkr))
            {
                Console.WriteLine($"Delete: {deleteUkr}");
            }
            else 
            {
                Console.WriteLine("Not found!");
            }
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            var tr = new Translator();

            do
            {

                Console.WriteLine("=============MENU================");
                Console.WriteLine("1. Add words \n 2. See all words ");
                Console.WriteLine("3. Find by Ukrainian word \n 4. Find by Russian word");
                Console.WriteLine("5.Remove Ukrainian word");
                Console.WriteLine("\n=================================");
                Console.WriteLine("\t ENTER YOUR CHOICE: ");
                int choice = Convert.ToInt32(Console.ReadLine());
                Console.WriteLine("\n=================================");

                switch (choice)
                {
                    case 1:
                        tr.InputWords();
                        break;
                    case 2:
                        tr.DictionaryPrint();
                        break;
                    case 3:
                        tr.FindRuWord();
                        break;
                    case 4:
                        tr.FindUkrWord();
                        break;
                    case 5:
                        break;
                    default:
                        break;
                }
            } while (true);


            
        }
    }
}

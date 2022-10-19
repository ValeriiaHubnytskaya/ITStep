using System;

//Реализовать класс Bankomat, моделирующий работу банкомата. 
//В классе должны содержаться поля:
//•	для хранения идентификационного номера банкомата,
//•	информации о текущей сумме денег каждого номинала, оставшейся в банкомате,
//•	минимальной и максимальной суммах, которые позволяется снять клиенту в один день. 
//Реализовать методы:
//•	Метод инициализации банкомата.
//•	Метод загрузки купюр в банкомат.
//•	Метод снятия определенной суммы денег. 
//•	Метод ToString() должен преобразовать в строку сумму денег, оставшуюся в банкомате.

//Реализовать класс Account, представляющий собой банковский счет.
//В классе должны содержаться поля:
//•	ФИО владельца
//•	Номер счета
//•	Сумма на счету

//Метод снятия денег в банкомате должен принимать в качестве параметра объект Account и выполнять проверку на корректность снимаемой суммы:
//она не должна быть меньше минимального значения и не должна превышать максимальное значение, а также должна быть меньше суммы на счету.
//Можно так же создать структуру для хранения информации о купюрах определенного номинала.

namespace Bankomat
{
    class Program
    {
        static void Main(string[] args)
        {
            Bankomat bankomat = new Bankomat();
            Account account = new Account();

            bankomat.Replenishment();
            bankomat.WithDraw(account);           
        }
    }

    class Account
    {
        private string fullname;
        private int numberAccount;
        private decimal accountAmount;

        public void dataInput()
        {
            Console.WriteLine("Enter your fullname: ");
            fullname = Console.ReadLine();
            Console.WriteLine("Enter account number: ");
            numberAccount = Convert.ToInt32(Console.ReadLine());
            Console.WriteLine("Enter your balance: ");
            accountAmount = Convert.ToDecimal(Console.ReadLine());
        }

        public decimal AccountAmount
        {
            set
            {
                accountAmount = value;
            }
            get
            {
                return accountAmount;
            }

        }        

    }
    class Bankomat
    {
        private int numberBankomat;
        private decimal sumMoney;
        private decimal maxSum;
        private decimal minSum;
        private decimal money;
        private decimal result;

        public Bankomat()
        {
            numberBankomat = 8;
            sumMoney = 0;
            maxSum = 50000;
            minSum = 100;
            money = 0;

        }

        public void Replenishment()
        {
            Console.WriteLine("Enter the replenishment amount: ");
            sumMoney = Convert.ToDecimal(Console.ReadLine());
            Console.WriteLine($"Account amount: {sumMoney} ");
        }

        public void WithDraw(Account account)
        {
            try
            {
                Console.WriteLine($"Number bankomat: {numberBankomat}");
                account.dataInput();
                Console.WriteLine("Enter the amount you want to withdraw: ");
                money = Convert.ToDecimal(Console.ReadLine());
                
                if (money < maxSum && money > minSum && money < account.AccountAmount)
                {
                    result = account.AccountAmount;
                    sumMoney = sumMoney - money;
                    result -= money;
                    Console.WriteLine($"Account balance {result}");  
                    Console.WriteLine($"Balance of money in an ATM - {sumMoney}");
                }
            }
            catch (FormatException ex)
            {
                Console.WriteLine(ex.Message);
            }

        }     

    }
}

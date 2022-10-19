#include"Headers.h"

int main()
{	
	Graphic graphic;
	graphic.WriteField(2, 2);
	graphic.WriteField2(2, 2);	
	graphic.Menu(2, 2);

	Income income;
	Wallet wallet;
	BankAccount card;
	Expenses expenses;
	size_t choice = 0;
	
	do {
		GotoXY(90, 18);
		cin >> choice;
		
		switch(choice)
		{			
		
			break;
		case 1:	
			graphic.Choice(2, 2);
			income.AddIncome();						
			wallet.AddWallet(income);
			break;
		case 2:
			graphic.Choice(2, 2);
			card.AddBankAccount(wallet);
			break;
		case 3:
			graphic.Choice(2, 2);	
			expenses.Product(wallet,card);
			break;
		case 4:
			graphic.Choice(2, 2);
			expenses.EatingOut(wallet, card);
			break;
		case 5:
			graphic.Choice(2, 2);
			expenses.Transport(wallet, card);
			break;
		case 6:
			graphic.Choice(2, 2);
			expenses.Purchases(wallet, card);
			break;
		case 7:
			graphic.Choice(2, 2);
			expenses.Household(wallet, card);
			break;
		case 8:
			graphic.Choice(2, 2);
			expenses.Enternaintment(wallet, card);
			break;
		case 9:
			graphic.Choice(2, 2);
			expenses.Services(wallet, card);
			break;
		case 10:		
			expenses.TopExpenses();
			expenses.CreateFile();
			break;
		case 11:
			expenses.TopMaxSum();
			break;
		case 12:
			expenses.TopCategories();
			break;
		case 13:
			expenses.Percent(wallet, income);
			break;
		case 14:
			break;
		}
		

	} while (choice != 14);
	
	cout << "\n\n\n\n\n\n\n\n\n";
}



#include "Headers.h"

Expenses::Expenses()
{
	product = 0;
	eatingOut = 0;
	transport = 0;
	purchases = 0;
	household = 0;
	entertaintment = 0;
	services = 0;
	choice = 0;
	
}

void Expenses::Product(Wallet& wallet, BankAccount& card)
{
	Choice();
	if (choice == 1)
	{
		wallet.WithDraw();		
		GotoXY(7, 19);
		product += wallet.GetMoneyWallet();
		cout << product;
	}
	if (choice == 2)
	{
		card.WithDrawCard();
		GotoXY(7, 19);
		product += card.GetMoneyCard();
		cout << product;
	}

}

void Expenses::EatingOut(Wallet& wallet, BankAccount& card)
{
	Choice();
	if (choice == 1)
	{
		wallet.WithDraw();
		GotoXY(20, 19);
		eatingOut += wallet.GetMoneyWallet();
		cout << eatingOut;
	}
	if (choice == 2)
	{
		card.WithDrawCard();
		GotoXY(20, 19);
		eatingOut += card.GetMoneyCard();
		cout << eatingOut;
	}
}

void Expenses::Transport(Wallet& wallet, BankAccount& card)
{	
	Choice();
	if (choice == 1)
	{
		wallet.WithDraw();
		GotoXY(34, 19);
		transport += wallet.GetMoneyWallet();
		cout << transport;	
	}
	if (choice == 2)
	{
		card.WithDrawCard();
		GotoXY(34, 19);
		transport += card.GetMoneyCard();
		cout << transport;

	}

}

void Expenses::Purchases(Wallet& wallet, BankAccount& card)
{
	Choice();
	if (choice == 1)
	{
		wallet.WithDraw();
		GotoXY(48, 19);
		purchases += wallet.GetMoneyWallet();
		cout << purchases;
	}
	if (choice == 2)
	{
		card.WithDrawCard();
		GotoXY(48, 19);
		purchases += card.GetMoneyCard();
		cout << purchases;
	}

}

void Expenses::Household(Wallet& wallet, BankAccount& card)
{
	Choice();
	if (choice == 1)
	{
		wallet.WithDraw();
		GotoXY(7, 25);
		household += wallet.GetMoneyWallet();
		cout << household;	
	}
	if (choice == 2)
	{
		card.WithDrawCard();
		GotoXY(7, 25);
		household += card.GetMoneyCard();
		cout << household;
	}

}

void Expenses::Enternaintment(Wallet& wallet, BankAccount& card)
{
	Choice();
	if (choice == 1)
	{
		wallet.WithDraw();
		GotoXY(21, 25);
		entertaintment += wallet.GetMoneyWallet();
		cout << entertaintment;
	}
	if (choice == 2)
	{
		card.WithDrawCard();
		GotoXY(21, 25);
		entertaintment += card.GetMoneyCard();
		cout << entertaintment;
	}

}

void Expenses::Services(Wallet& wallet, BankAccount& card)
{
	Choice();
	if (choice == 1)
	{
		wallet.WithDraw();
		GotoXY(39, 25);
		services += wallet.GetMoneyWallet();
		cout << services;
	}
	if (choice == 2)
	{
		card.WithDrawCard();
		GotoXY(39, 25);
		services += card.GetMoneyCard();
		cout << services;
	}


}

void Expenses::Percent(Wallet& wallet, Income income)
{
	GotoXY(7, 20);
	product = (product / income.GetMoney()) * 100;
	cout << product;
	cout << "%";


	GotoXY(20, 20);
	eatingOut = (eatingOut / income.GetMoney()) * 100;
	cout << eatingOut;
	cout << "%";


	GotoXY(34, 20);
	transport = (transport / income.GetMoney()) * 100;
	cout << transport;
	cout << "%";

	GotoXY(48, 20);
	purchases = (purchases / income.GetMoney()) * 100;
	cout << purchases;
	cout << "%";


	GotoXY(7, 26);
	household = (household / income.GetMoney()) * 100;
	cout << household;
	cout << "%";

	GotoXY(21, 26);
	entertaintment = (entertaintment / income.GetMoney()) * 100;
	cout << entertaintment;
	cout << "%";


	GotoXY(39, 26);
	services = (services / income.GetMoney()) * 100;
	cout << services;
	cout << "%";
}

void Expenses::Choice()
{
	GotoXY(72, 24);
	SetColor(Black, Black);
	cout << "                       ";

	SetColor(LightGray, Black);
	GotoXY(72, 23);
	cout << " ENTER YOUR CHOICE:  1. CASH  2. CARD ";	
	GotoXY(72, 24);
	cin >> choice;

	SetColor(Black, Black);
	GotoXY(72, 23);
	cout << " ENTER YOUR CHOICE:  1. CASH  2. CARD ";
	GotoXY(72, 24);
	cout << "              ";
}

struct Category {
	string name;
	double sum;	
};

void Expenses::TopExpenses()
{
	Delete();

	const int SizeArray = 7;
	int arr[SizeArray] = { 1,2,3,4,5,6,7 };
	Category array[SizeArray] = {
		{"Product", product},
		{"Eating Out", eatingOut},
		{"Transport", transport},
		{"Purchases", purchases},
		{"Household", household},
		{"Entertaintment", entertaintment},
		{"Services", services} };
	
	
	for (size_t i = 0; i < SizeArray - 1; i++)
	{
		int minIndex = i;
		for (size_t j = i + 1; j < SizeArray; j++)
		{
			if (array[minIndex].sum < array[j].sum)
			{
				minIndex = j;
			}
		}
		if (minIndex != i)
		{
			Category tmp = array[i];
			array[i] = array[minIndex];
			array[minIndex] = tmp;
		}
	}	

	int posy = 22;

	for (size_t i = 0; i < SizeArray; i++)
	{
		GotoXY(72, posy);
		cout  << arr[i] << ". "<< array[i].name << " " << array[i].sum;
		posy += 1;
	}

	cout << endl;	
}

void Expenses::TopMaxSum()
{
	Delete();

	const int SizeArray = 7;
	int arr[3] = { 1,2,3 };	

	Category array[SizeArray] = {
		{"Product", product},
		{"Eating Out", eatingOut},
		{"Transport", transport},
		{"Purchases", purchases},
		{"Household", household},
		{"Entertaintment", entertaintment},
		{"Services", services} };


	for (int i = 0; i < SizeArray - 1; i++)
	{
		int minIndex = i;
		for (int j = i + 1; j < SizeArray; j++)
		{
			if (array[minIndex].sum < array[j].sum)
			{
				minIndex = j;
			}
		}
		if (minIndex != i)
		{
			Category tmp = array[i];
			array[i] = array[minIndex];
			array[minIndex] = tmp;
		}
	}

	int posy = 23;

	for (size_t i = 0; i < 3; i++)
	{
		GotoXY(72, posy);
		cout << arr[i] << ". " << array[i].sum << " UAH " ;
		posy += 1;
	}

	cout << endl;
}

void Expenses::TopCategories()
{
	Delete();

	const int SizeArray = 7;
	int arr[3] = { 1,2,3 };

	Category array[SizeArray] = {
		{"Product", product},
		{"Eating Out", eatingOut},
		{"Transport", transport},
		{"Purchases", purchases},
		{"Household", household},
		{"Entertaintment", entertaintment},
		{"Services", services} };


	for (size_t i = 0; i < SizeArray - 1; i++)
	{
		int minIndex = i;
		for (size_t j = i + 1; j < SizeArray; j++)
		{
			if (array[minIndex].sum < array[j].sum)
			{
				minIndex = j;
			}
		}
		if (minIndex != i)
		{
			Category tmp = array[i];
			array[i] = array[minIndex];
			array[minIndex] = tmp;
		}
	}

	int posy = 23;

	for (size_t i = 0; i < 3; i++)
	{
		GotoXY(72, posy);
		cout << arr[i] << ". " << array[i].name;
		posy += 1;
	}

	cout << endl;
}

void Expenses::CreateFile()
{

	const int SizeArray = 7;
	int arr[SizeArray] = { 1,2,3,4,5,6,7 };
	int arra[3] = { 1,2,3 };
	Category array[SizeArray] = {
		{"Product", product},
		{"Eating Out", eatingOut},
		{"Transport", transport},
		{"Purchases", purchases},
		{"Household", household},
		{"Entertaintment", entertaintment},
		{"Services", services} };

	ofstream fout("Report.txt");	
	if (!fout.is_open())
	{
		cerr << "file not opened" << endl;
		return;
	}
	for (size_t i = 0; i < SizeArray - 1; i++)
	{
		int minIndex = i;
		for (size_t j = i + 1; j < SizeArray; j++)
		{
			if (array[minIndex].sum < array[j].sum)
			{
				minIndex = j;
			}
		}
		if (minIndex != i)
		{
			Category tmp = array[i];
			array[i] = array[minIndex];
			array[minIndex] = tmp;
		}
	}
	
	for (size_t i = 0; i < SizeArray; i++)
	{		
		cout.precision(1);
		fout << setw(3) << left << arr[i] << ". " << array[i].name << " " << array[i].sum << endl;		
	}

	fout << setw(45) << setfill('-') << "" << endl << setfill(' ');

	for (size_t i = 0; i < 3; i++)
	{
		cout.precision(1);
		fout << setw(3) << left << arra[i] << ". " << array[i].sum << " UAH " << endl;		
	}

	fout << setw(45) << setfill('-') << "" << endl << setfill(' ');

	for (size_t i = 0; i < 3; i++)
	{	
		fout << setw(3) << left << arra[i] << ". " << array[i].name << endl;
	}

	cout << endl;
}

void Expenses::Delete()
{
	SetColor(Black, Black);
	GotoXY(72, 23);
	cout << " ENTER THE REPLENISHMENT AMOUNT:"; 

	int posy = 22;
	for (size_t i = 0; i < 7; i++)
	{
		GotoXY(72, posy);
		cout << "                      ";
		posy += 1;
	}
	SetColor(LightGray, Black);
}


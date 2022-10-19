#include "Headers.h"

void BankAccount::AddBankAccount(Wallet& wallet)
{
	Delete();
	Print();
	cin >> value;

	if (value > wallet.GetValue())
	{
		SetColor(LightRed, Black);
		GotoXY(72, 25);
		cerr << "Error: The amount is more than in the wallet. " << endl;
		SetColor(LightGray, Black);
		return;
	}
	else
	{
		GotoXY(22, 12);
		cout << value;
		GotoXY(7, 12);
		double tmp = wallet.GetValue() - value;	
		cout << tmp;
	}			
	
}
void BankAccount::WithDrawCard()
{
	Delete();
	Print();
	cin >> money;

	if (money > value)
	{
		SetColor(LightRed, Black);
		GotoXY(72, 25);
		cerr << "Error: The amount is more than in the wallet. " << endl;
		SetColor(LightGray, Black);
		return;
	}
	else
	{
		Delete();
		GotoXY(22, 12);
		value = value - money;
		cout << value;
	}	
}

void BankAccount::Print()
{
	SetColor(LightGray, Black);
	WriteStr(72, 23, " ENTER THE REPLENISHMENT AMOUNT:");
	GotoXY(72, 24);	
	cout << "                  ";
	GotoXY(72, 24);
}

void BankAccount::Delete()
{
	SetColor(Black, Black);
	GotoXY(22, 12);
	cout << "             ";
	WriteStr(72, 23, " ENTER THE REPLENISHMENT AMOUNT:");
	GotoXY(72, 24);
	cout << "                 " << endl;
	GotoXY(72, 25);
	cout << "Error: The amount is more than in the wallet. " << endl;
	SetColor(LightGray, Black);
}

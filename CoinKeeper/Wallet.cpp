#include "Headers.h"

void Wallet::AddWallet(Income& income)
{
	value = income.GetMoney() + GetMoneyWallet();

	GotoXY(7, 12);
	cout << value << endl;
}

void Wallet::WithDraw()
{	
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
		GotoXY(7, 12);
		value = value - money;
		cout << value;
	}

}

void Wallet::Print()
{
	SetColor(LightGray, Black);
	WriteStr(72, 23, " ENTER THE REPLENISHMENT AMOUNT:");
	GotoXY(72, 24);
	SetColor(Black, Black);
	cout << "                 " << endl;
	SetColor(LightGray, Black);
	GotoXY(72, 24);
}

void Wallet::Delete()
{
	SetColor(Black, Black);
	GotoXY(7, 12);
	cout << "         " << endl;
	GotoXY(72, 25);
	cerr << "Error: The amount is more than in the wallet. " << endl;
	GotoXY(72, 24);
	cout << "                     " << endl;
	SetColor(LightGray, Black);
}



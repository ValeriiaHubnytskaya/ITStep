#include "Headers.h"

void Income::SetMoney(double money)
{
	if (money == 0)
	{
		SetColor(LightRed, Black);
		GotoXY(72, 25);
		cerr << " Error: Enter the replenishment amount." << endl;
		return;
		SetColor(LightGray, Black);
	}
	 this->money = money; 
}

void Income::AddIncome()
{
	SetColor(LightGray, Black);
	double temp;
	WriteStr(72, 23, " ENTER THE REPLENISHMENT AMOUNT:");
	GotoXY(72, 24);

	cin >> temp;


	if (money > 1000000)
	{
		SetColor(LightRed, Black);
		GotoXY(72, 25);
		cerr << "Error: You ordered an amount greater" << endl;
		GotoXY(72, 26);
		cerr << "than the maximum." << endl;
		SetColor(LightGray, Black);
		return;
	}
	else
	{
		GotoXY(7, 6);
		this->money += temp;
		cout << this->money;
	}	
	
}

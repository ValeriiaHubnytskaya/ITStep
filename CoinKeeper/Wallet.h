#include "Headers.h"
class Wallet 
{
public:
	void AddWallet(Income& income);
	void WithDraw();
	void Print();
	void Delete();

	void SetMoneyWallet(double money) { this->money = money; }
	double GetMoneyWallet() { return money; }

	void SetValue(double value) { this->value = value; }
	double GetValue() { return value; }

private:
	double money = 0;
	double value = 0;
};


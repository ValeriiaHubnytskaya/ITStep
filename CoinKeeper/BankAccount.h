#include"Headers.h"

class BankAccount 
{
public:
	void AddBankAccount(Wallet& wallet);
	void WithDrawCard();
	void Print();
	void Delete();

	void SetMoneyCard(double money) { this->money = money; }
	void SetValueCard(double value) { this->value = value; }

	double GetMoneyCard() { return money; }
	double GetValueCard() { return value; }

private:
	double value;
	double money;	
};


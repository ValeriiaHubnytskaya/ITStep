#include"Headers.h"
class Expenses : public Wallet, public BankAccount
{
public:
	Expenses();
	
	void Product(Wallet& wallet, BankAccount &card);
	void EatingOut(Wallet& wallet, BankAccount& card);
	void Transport(Wallet& wallet, BankAccount& card);
	void Purchases(Wallet& wallet, BankAccount& card);
	void Household(Wallet& wallet, BankAccount& card);
	void Enternaintment(Wallet& wallet, BankAccount& card);
	void Services(Wallet& wallet, BankAccount& card);

	void Percent(Wallet& wallet, Income income);
	void Choice();

	void TopExpenses();
	void TopMaxSum();
	void TopCategories();

	void CreateFile();
	void Delete();
	

	
private:
	double product;
	double eatingOut;
	double transport;
	double purchases;
	double household;
	double entertaintment;
	double services;	
	int choice;
	
};


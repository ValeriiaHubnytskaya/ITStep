#include"Headers.h"
class Income
{
public:
	Income() = default;

	void SetMoney(double money);
	double GetMoney() { return this->money; }	
	
	void AddIncome();

private:
	double money = 0;
};


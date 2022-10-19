#include "Iterators.h"

void Iterators::StringIterator()
{
	str1 = "Standart Template Library";

	string::reverse_iterator it;
	for (it = str1.rbegin(); it != str1.rend(); it++)
	{
		cout << *it;
	}
	cout << endl << endl;	
	
}

void Iterators::StringIterators()
{
	string::reverse_iterator it;
	str2 = str1;
	for (it = str2.rbegin(); it != str2.rend() - 15; it++)
	{
		cout << *it;
	}
	cout << endl;

}

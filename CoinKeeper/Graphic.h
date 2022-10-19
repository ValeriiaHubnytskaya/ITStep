#include "Headers.h"
class Graphic
{
public:
	void WriteHorz(int x, int y, char ch, int lenght);
	void WriteField(int x, int y);
	void WriteField2(int x, int y);
	void Menu(int x, int y);
	void Choice(int x, int y);
private:
	const unsigned char dash = 196;
	const unsigned char vert_dash = 179;
	const unsigned char top_left = 218;
	const unsigned char top_right = 191;
	const unsigned char lower_left = 192;
	const unsigned char lower_right = 217;
	
};


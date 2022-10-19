#include "Headers.h"

void Graphic::WriteHorz(int x, int y, char ch, int lenght)
{   
        for (size_t i = y; i < lenght; i++)
            WriteChar(x, i, ch);    
}

void Graphic::WriteField(int x, int y)
{
    SetColor(LightGreen, Black);
    WriteStr(x + 30, y, "COINKEEPER");
    SetColor(DarkGray, Black);
    WriteStr(x + 5, y + 3, "INCOME");
    WriteStr(x + 5, y + 9, "WALLET");
    WriteStr(x + 19, y + 9, "BANK ACCOUNT");
    WriteStr(x + 5, y + 16, "PRODUCT");
    WriteStr(x + 17, y + 16, "EATING OUT");
    WriteStr(x + 32, y + 16, "TRANSPORT");
    WriteStr(x + 46, y + 16, "PURCHASES");
    WriteStr(x + 5, y + 22, "HOUSEHOLD");
    WriteStr(x + 19, y + 22, "ENTERTAINTMENT");
    WriteStr(x + 37, y + 22, "SERVICES");

    //углы поля
    SetColor(LightMagenta,Black);
    WriteChar(x + 3, y + 1, top_left);
    WriteChar(x + 63, y + 1, top_right);
    WriteChar(x + 3, y + 28, lower_left);
    WriteChar(x + 63, y + 28, lower_right);

    const int v_length = x + 57;
    const int ve_length = x + 58;
    const int h_length = y + 28;

    //горизонтальные
    WriteChars(x + 4, y + 1, dash, v_length);
    WriteChars(x + 4, y + 28, dash, v_length);
    WriteChars(x + 3, y + 7, dash, ve_length);
    WriteChars(x + 3, y + 14, dash, ve_length);
    //вертикальные
    WriteHorz(x + 3, y + 2, vert_dash, h_length);
    WriteHorz(x + 63, y + 2, vert_dash, h_length); 
}

void Graphic::WriteField2(int x, int y)
{
    SetColor(DarkGray, Black);
    WriteChar(x + 67, y + 1, top_left);
    WriteChar(x + 113, y + 1, top_right);
    WriteChar(x + 67, y + 11, lower_left);
    WriteChar(x + 113, y + 11, lower_right);

    const int v_length = x + 43;
    const int h_length = y + 11;

    //горизонтальные
    WriteChars(x + 68, y + 1, dash, v_length);
    WriteChars(x + 68, y + 11, dash, v_length);
    
    //вертикальные
    WriteHorz(x + 67, y + 2 , vert_dash, h_length);
    WriteHorz(x + 113, y + 2, vert_dash, h_length);

    SetColor(LightRed, Black);
    WriteStr(88, 2, "MENU"); 
}

void Graphic::Menu(int x, int y)
{
    SetColor(LightGray, Black);
   
    WriteStr(70, 4, "1. Enter your income.");
    WriteStr(70, 5, "2. Top up a bank account.");
    WriteStr(70, 6, "3. Product.");    
    WriteStr(70, 7, "4. Eating out.");
    WriteStr(70, 8, "5. Transport.");
    WriteStr(70, 9, "6. Purchases.");
    WriteStr(70, 10, "7. Household.");
    WriteStr(70, 11, "8. Entertainment.");
    WriteStr(70, 12, "9. Services.");
    WriteStr(95, 11, "14. Exit.");
    WriteStr(95, 7, "10. Top Expenses.");
    WriteStr(95, 8, "11. Top Max Sum.");
    WriteStr(95, 9, "12. Top Categories.");
    WriteStr(95, 10, "13. Percente.");

    SetColor(LightRed, Black);
    WriteStr(82, 16, "ENTER YOUR CHOICE: ");
    SetColor(DarkGray, Black);
    WriteChar(x + 83, y + 15, top_left);
    WriteChar(x + 93, y + 15, top_right);
    WriteChar(x + 83, y + 17, lower_left);
    WriteChar(x + 93, y + 17, lower_right);

    const int ve_length = x + 7;

    //горизонтальные
    WriteChars(x + 84, y + 15, dash, ve_length);
    WriteChars(x + 84, y + 17, dash, ve_length); 
}

void Graphic::Choice(int x, int y)
{
    SetColor(DarkGray, Black);
    WriteChar(x + 67, y + 19, top_left);
    WriteChar(x + 113, y + 19, top_right);
    WriteChar(x + 67, y + 27, lower_left);
    WriteChar(x + 113, y + 27, lower_right);

    const int v_length = x + 43;
    const int h_length = y + 4;

    //горизонтальные
    WriteChars(x + 68, y + 19, dash, v_length);
    WriteChars(x + 68, y + 27, dash, v_length);

    //вертикальные
    WriteHorz(x + 67, y + 20, vert_dash, h_length);
    WriteHorz(x + 113, y + 20, vert_dash, h_length);
}


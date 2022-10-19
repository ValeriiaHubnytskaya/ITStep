#include <iostream>
#include <time.h>
#include "ConsoleLib.h"
#include "Graphics.h"

using namespace std;

const unsigned char dash = 196;
const unsigned char vert_dash = 179;
const unsigned char top_left = 218;
const unsigned char top_right = 191;
const unsigned char lower_left = 192;
const unsigned char lower_right = 217;
 const unsigned char sun = 66;
 const unsigned char star = 42;

// рисуем 1 поле

void write_horz(int x, int y, char ch, unsigned int length)
{
    for (size_t i = y; i < length; i++)
        WriteChar(x, i, ch);
}

void get_quare1(int x, int y)
{
    //углы пол€
    WriteChar(x + 3, y, top_left);
    WriteChar(x + 43, y, top_right);
    WriteChar(x + 3, y + 20, lower_left);
    WriteChar(x + 43, y + 20, lower_right);

    const int v_length = x + 37;
    const int h_length = y + 20;

    //линии пол€ горизонталь

    write_chars(x + 4, y, dash, v_length);
    write_chars(x + 4, y + 2, dash, v_length);
    write_chars(x + 4, y + 4, dash, v_length);
    write_chars(x + 4, y + 6, dash, v_length);
    write_chars(x + 4, y + 8, dash, v_length);
    write_chars(x + 4, y + 10, dash, v_length);
    write_chars(x + 4, y + 12, dash, v_length);
    write_chars(x + 4, y + 14, dash, v_length);
    write_chars(x + 4, y + 16, dash, v_length);
    write_chars(x + 4, y + 18, dash, v_length);
    write_chars(x + 4, y + 20, dash, v_length);

    // линии пол€ вертикаль
    write_horz(x + 3, y + 1, vert_dash, h_length);
    write_horz(x + 7, y + 1, vert_dash, h_length);
    write_horz(x + 11, y + 1, vert_dash, h_length);
    write_horz(x + 15, y + 1, vert_dash, h_length);
    write_horz(x + 19, y + 1, vert_dash, h_length);
    write_horz(x + 23, y + 1, vert_dash, h_length);
    write_horz(x + 27, y + 1, vert_dash, h_length);
    write_horz(x + 31, y + 1, vert_dash, h_length);
    write_horz(x + 35, y + 1, vert_dash, h_length);
    write_horz(x + 39, y + 1, vert_dash, h_length);
    write_horz(x + 43, y + 1, vert_dash, h_length);
}

// рисуем символы дл€ 1 игрового пол€
void letter(int x, int y)
{
    write_char(x + 5,y,'A');
    write_char(x + 9, y, 'B');
    write_char(x + 13, y, 'C');
    write_char(x + 17, y, 'D');
    write_char(x + 21, y, 'E');
    write_char(x + 25, y, 'F');
    write_char(x + 29, y, 'G');
    write_char(x + 33, y, 'H');
    write_char(x + 37, y, 'I');
    write_char(x + 41, y, 'J');

    write_char(x + 1, y + 2, '1');
    write_char(x + 1, y + 4, '2');
    write_char(x + 1, y + 6, '3');
    write_char(x + 1, y + 8, '4');
    write_char(x + 1, y + 10, '5');
    write_char(x + 1, y + 12, '6');
    write_char(x + 1, y + 14, '7');
    write_char(x + 1, y + 16, '8');
    write_char(x + 1, y + 18, '9');
    write_char(x, y + 20, '1');
    write_char(x + 1, y + 20, '0');
}

void get_quare2(int x, int y)
{
    //углы пол€
    WriteChar(x + 53, y, top_left);
    WriteChar(x + 93, y, top_right);
    WriteChar(x + 53, y + 20, lower_left);
    WriteChar(x + 93, y + 20, lower_right);

    const int v_length = x + 37;
    const int h_length = y + 20;

    //линии пол€ горизонталь

    write_chars(x + 54, y, dash, v_length);
    write_chars(x + 54, y + 2, dash, v_length);
    write_chars(x + 54, y + 4, dash, v_length);
    write_chars(x + 54, y + 6, dash, v_length);
    write_chars(x + 54, y + 8, dash, v_length);
    write_chars(x + 54, y + 10, dash, v_length);
    write_chars(x + 54, y + 12, dash, v_length);
    write_chars(x + 54, y + 14, dash, v_length);
    write_chars(x + 54, y + 16, dash, v_length);
    write_chars(x + 54, y + 18, dash, v_length);
    write_chars(x + 54, y + 20, dash, v_length);

    // линии пол€ вертикаль
    write_horz(x + 53, y + 1, vert_dash, h_length);
    write_horz(x + 57, y + 1, vert_dash, h_length);
    write_horz(x + 61, y + 1, vert_dash, h_length);
    write_horz(x + 65, y + 1, vert_dash, h_length);
    write_horz(x + 69, y + 1, vert_dash, h_length);
    write_horz(x + 73, y + 1, vert_dash, h_length);
    write_horz(x + 77, y + 1, vert_dash, h_length);
    write_horz(x + 81, y + 1, vert_dash, h_length);
    write_horz(x + 85, y + 1, vert_dash, h_length);
    write_horz(x + 89, y + 1, vert_dash, h_length);
    write_horz(x + 93, y + 1, vert_dash, h_length);
}

void letter1(int x, int y)
{
    write_char(x + 55, y, 'A');
    write_char(x + 59, y, 'B');
    write_char(x + 63, y, 'C');
    write_char(x + 67, y, 'D');
    write_char(x + 71, y, 'E');
    write_char(x + 75, y, 'F');
    write_char(x + 79, y, 'G');
    write_char(x + 83, y, 'H');
    write_char(x + 87, y, 'I');
    write_char(x + 91, y, 'J');

    write_char(x + 51, y + 2, '1');
    write_char(x + 51, y + 4, '2');
    write_char(x + 51, y + 6, '3');
    write_char(x + 51, y + 8, '4');
    write_char(x + 51, y + 10, '5');
    write_char(x + 51, y + 12, '6');
    write_char(x + 51, y + 14, '7');
    write_char(x + 51, y + 16, '8');
    write_char(x + 51, y + 18, '9');
    write_char(x + 51, y + 20, '1');
    write_char(x + 52, y + 20, '0');
}

//кнопка автоматической расстановки кораблей
int button_random(int x, int y)
{
    //углы кнопки
    WriteChar(x - 7, y - 1, top_left);
    WriteChar(x + 7, y - 1, top_right);
    WriteChar(x - 7, y + 1, lower_left);
    WriteChar(x + 7, y + 1, lower_right);

    const int v_length = 13;
    const int h_length = 4;

    //горизонтальные линии
    write_chars(x - 6, y - 1, dash, v_length);
    write_chars(x - 6, y + 1, dash, v_length);

    set_color(LightRed, Black);
    write_str(x - 3, y, " RANDOM ");

    set_color(Yellow, Black);

    return(0);
}

// кнопка расстановки кораблей вручную
int button_manually(int x, int y)
{
    //углы кнопки
    WriteChar(x - 7, y - 1, top_left);
    WriteChar(x + 7, y - 1, top_right);
    WriteChar(x - 7, y + 1, lower_left);
    WriteChar(x + 7, y + 1, lower_right);

    const int v_length = 13;
    const int h_length = 4;

    //горизонтальные линии
    write_chars(x - 6, y - 1, dash, v_length);
    write_chars(x - 6, y + 1, dash, v_length);

    set_color(LightRed, Black);
    write_str(x - 3, y, "MANUALLY");

    set_color(Yellow, Black);

    return(0);
}

//красна€ кнопкa
int brown_button1(int x, int y)
{
    //углы кнопки
    WriteChar(x - 7, y - 1, top_left);
    WriteChar(x + 7, y - 1, top_right);
    WriteChar(x - 7, y + 1, lower_left);
    WriteChar(x + 7, y + 1, lower_right);

    const int v_length = 13;
    const int h_length = 4;

    //горизонтальные линии
    write_chars(x - 6, y - 1, dash, v_length);
    write_chars(x - 6, y + 1, dash, v_length);

    set_color(Black, Brown);
    write_str(x - 3, y, " RANDOM ");
    set_color(Yellow, Black);     
       
    return(0);
}

// «елена€ кнопкa 
int brown_button2(int x, int y)
{
    //углы кнопки
    WriteChar(x - 7, y - 1, top_left);
    WriteChar(x + 7, y - 1, top_right);
    WriteChar(x - 7, y + 1, lower_left);
    WriteChar(x + 7, y + 1, lower_right);

    const int v_length = 13;
    const int h_length = 4;

    //горизонтальные линии
    write_chars(x - 6, y - 1, dash, v_length);
    write_chars(x - 6, y + 1, dash, v_length);
       
    set_color(Black, Brown);
    write_str(x - 3, y, "MANUALLY");

    set_color(Yellow, Black);

    return(0);
}

int button_start(int x, int y)
{
    //углы кнопки
    WriteChar(x - 7, y - 1, top_left);
    WriteChar(x + 7, y - 1, top_right);
    WriteChar(x - 7, y + 1, lower_left);
    WriteChar(x + 7, y + 1, lower_right);

    const int v_length = 13;
    const int h_length = 4;

    //горизонтальные линии
    write_chars(x - 6, y - 1, dash, v_length);
    write_chars(x - 6, y + 1, dash, v_length);

    set_color(LightRed, Black);
    write_str(x - 3, y, "START");

    set_color(Yellow, Black);

    return(0);
}

int button_start_green(int x, int y)
{
    //углы кнопки
    WriteChar(x - 7, y - 1, top_left);
    WriteChar(x + 7, y - 1, top_right);
    WriteChar(x - 7, y + 1, lower_left);
    WriteChar(x + 7, y + 1, lower_right);

    const int v_length = 13;
    const int h_length = 4;

    //горизонтальные линии
    write_chars(x - 6, y - 1, dash, v_length);
    write_chars(x - 6, y + 1, dash, v_length);

    set_color(Black, Brown);
    write_str(x - 3, y, "START");

    set_color(Yellow, Black);

    return(0);
}

// первый вариант расстановки автоматически кораблей

void random_ship1(int x, int y)
{   
    set_color(Cyan, Cyan);
    write_chars(x, y, sun, 3);
    set_color(Yellow, Black);
}

 //2 вариант расстановки автоматически кораблей
void random_ship2(int x, int y)
{
    set_color(Cyan, Cyan);
    // 4    
    write_chars(x + 8, y + 5, sun, 3);
    write_chars(x + 8, y + 7, sun, 3);
    write_chars(x + 8, y + 9, sun, 3);
    write_chars(x + 8, y + 11, sun, 3);

    // 3 - 1
    write_chars(x + 4, y + 1, sun, 3);
    write_chars(x + 8, y + 1, sun, 3);
    write_chars(x + 12, y + 1, sun, 3);

    // 3 - 2
    write_chars(x + 20, y + 5, sun, 3);
    write_chars(x + 20, y + 7, sun, 3);
    write_chars(x + 20, y + 9, sun, 3);

    // 2 - 1
    write_chars(x + 32, y + 3, sun, 3);
    write_chars(x + 36, y + 3, sun, 3);

    // 2 - 2
    write_chars(x + 28, y + 13, sun, 3);
    write_chars(x + 32, y + 13, sun, 3);

    // 2  - 3
    write_chars(x + 12, y + 15, sun, 3);
    write_chars(x + 16, y + 15, sun, 3);

    // 1 - 1
    write_chars(x + 24, y + 1, sun, 3);

    // 1 - 2
    write_chars(x + 28, y + 7, sun, 3);

    // 1 - 3
    write_chars(x + 24, y + 17, sun, 3);

    // 1 - 4
    write_chars(x + 36, y + 17, sun, 3);

    set_color(Yellow, Black);
}
   

void random_ship3(int x, int y)
{
    set_color(Cyan, Cyan);
    // 4    
    write_chars(x + 28, y + 19, sun, 3);
    write_chars(x + 32, y + 19, sun, 3);
    write_chars(x + 36, y + 19, sun, 3);
    write_chars(x + 40, y + 19, sun, 3);

    // 3 - 1
    write_chars(x + 8, y + 3, sun, 3);
    write_chars(x + 8, y + 5, sun, 3);
    write_chars(x + 8, y + 7, sun, 3);

    // 3 - 2
    write_chars(x + 24, y + 3, sun, 3);
    write_chars(x + 28, y + 3, sun, 3);
    write_chars(x + 32, y + 3, sun, 3);

    // 2 - 1
    write_chars(x + 20, y + 7, sun, 3);
    write_chars(x + 24, y + 7, sun, 3);

    // 2 - 2
    write_chars(x + 12, y + 11, sun, 3);
    write_chars(x + 16, y + 11, sun, 3);

    // 2  - 3
    write_chars(x + 28, y + 13, sun, 3);
    write_chars(x + 32, y + 13, sun, 3);

    // 1 - 1
    write_chars(x + 36, y + 7, sun, 3);

    // 1 - 2
    write_chars(x + 8, y + 15, sun, 3);

    // 1 - 3
    write_chars(x + 20, y + 15, sun, 3);

    // 1 - 4
    write_chars(x + 12, y + 19, sun, 3);

    set_color(Yellow, Black);
  
}

void random_ship1_2(int x, int y)
{
    set_color(Black, Black);   
    write_chars(x, y, sun, 3);    
    set_color(Yellow, Black);
}

void random_ship2_2(int x,  int y)
{
    set_color(Black, Black);      
    write_chars(x, y, sun, 3);  
    set_color(Yellow, Black);
}

void random_ship3_2(int x,  int y)
{
    set_color(Black, Black);    
    write_chars(x, y, sun, 3);   
}



// закрашиваем пол€ вариации
void draw1(int x, int y)
{
    set_color(Black, Black);
    // 4    
    write_chars(x + 4, y + 1, ' ', 3);
    write_chars(x + 4, y + 3, ' ', 3);
    write_chars(x + 4, y + 5, ' ', 3);
    write_chars(x + 4, y + 7, ' ', 3);

    // 3 - 1
    write_chars(x + 12, y + 3, ' ', 3);
    write_chars(x + 16, y + 3, ' ', 3);
    write_chars(x + 20, y + 3, ' ', 3);

    // 3 - 2
    write_chars(x + 12, y + 7, ' ', 3);
    write_chars(x + 16, y + 7, ' ', 3);
    write_chars(x + 20, y + 7, ' ', 3);

    // 2 - 1
    write_chars(x + 12, y + 11, ' ', 3);
    write_chars(x + 16, y + 11, ' ', 3);

    // 2 - 2
    write_chars(x + 28, y + 11, ' ', 3);
    write_chars(x + 32, y + 11, ' ', 3);

    // 2  - 3
    write_chars(x + 20, y + 15, ' ', 3);
    write_chars(x + 24, y + 15, ' ', 3);

    // 1 - 1
    write_chars(x + 32, y + 3, ' ', 3);

    // 1 - 2
    write_chars(x + 32, y + 7, ' ', 3);

    // 1 - 3
    write_chars(x + 8, y + 15, ' ', 3);

    // 1 - 4
    write_chars(x + 36, y + 17, ' ', 3);        
   
    // 4    
    write_chars(x + 8, y + 5, ' ', 3);
    write_chars(x + 8, y + 7, ' ', 3);
    write_chars(x + 8, y + 9, ' ', 3);
    write_chars(x + 8, y + 11, ' ', 3);

    // 3 - 1
    write_chars(x + 4, y + 1, ' ', 3);
    write_chars(x + 8, y + 1, ' ', 3);
    write_chars(x + 12, y + 1, ' ', 3);

    // 3 - 2
    write_chars(x + 20, y + 5, ' ', 3);
    write_chars(x + 20, y + 7, ' ', 3);
    write_chars(x + 20, y + 9, ' ', 3);

    // 2 - 1
    write_chars(x + 32, y + 3, ' ', 3);
    write_chars(x + 36, y + 3, ' ', 3);

    // 2 - 2
    write_chars(x + 28, y + 13, ' ', 3);
    write_chars(x + 32, y + 13, ' ', 3);

    // 2  - 3
    write_chars(x + 12, y + 15, ' ', 3);
    write_chars(x + 16, y + 15, ' ', 3);

    // 1 - 1
    write_chars(x + 24, y + 1, ' ', 3);

    // 1 - 2
    write_chars(x + 28, y + 7, ' ', 3);

    // 1 - 3
    write_chars(x + 24, y + 17, ' ', 3);

    // 1 - 4
    write_chars(x + 36, y + 17, ' ', 3);

    
    // 4    
    write_chars(x + 28, y + 19, ' ', 3);
    write_chars(x + 32, y + 19, ' ', 3);
    write_chars(x + 36, y + 19, ' ', 3);
    write_chars(x + 40, y + 19, ' ', 3);

    // 3 - 1
    write_chars(x + 8, y + 3, ' ', 3);
    write_chars(x + 8, y + 5, ' ', 3);
    write_chars(x + 8, y + 7, ' ', 3);

    // 3 - 2
    write_chars(x + 24, y + 3, ' ', 3);
    write_chars(x + 28, y + 3, ' ', 3);
    write_chars(x + 32, y + 3, ' ', 3);

    // 2 - 1
    write_chars(x + 20, y + 7, ' ', 3);
    write_chars(x + 24, y + 7, ' ', 3);

    // 2 - 2
    write_chars(x + 12, y + 11, ' ', 3);
    write_chars(x + 16, y + 11, ' ', 3);

    // 2  - 3
    write_chars(x + 28, y + 13, ' ', 3);
    write_chars(x + 32, y + 13, ' ', 3);

    // 1 - 1
    write_chars(x + 36, y + 7, ' ', 3);

    // 1 - 2
    write_chars(x + 8, y + 15, ' ', 3);

    // 1 - 3
    write_chars(x + 20, y + 15, ' ', 3);

    // 1 - 4
    write_chars(x + 12, y + 19, ' ', 3);

    set_color(Yellow, Black); 
}

// выбор пользовател€ €чейки дл€ стрельбы
void draw_green_square(int x, int y)
{
    ChangeTextAttr(x, y, Black, Green, 3);       
   /* set_color(Green, Black);
    const int v_length = 3;
    const int h_length = 4;

    write_chars(x - 4, y - 1, dash, v_length);
    write_chars(x - 4, y + 1, dash, v_length);*/
}

void draw_black_square(int x, int y)
{
    /*set_color(Black, Black);*/
    ChangeTextAttr(x, y, Black, Black, 3);
}
 //выстрел, попал
void shot(int x, int y)
{
    set_color(LightRed, Black);
    write_str(x + 99, y + 11, " HIT");
    
}

//выстрел, мимо
void miss(int x, int y)
{
    set_color(LightRed, Black);
    write_str(x + 99, y + 11, " Miss");
   
}

// очистка кнопок при игре
void button_clear(int x, int y)
{
    set_color(Black, Black);
    WriteChar(x - 7, y - 1, top_left);
    WriteChar(x + 7, y - 1, top_right);
    WriteChar(x - 7, y + 1, lower_left);
    WriteChar(x + 7, y + 1, lower_right);
    const int v_length = 13;
    const int h_length = 4;    
    write_chars(x - 6, y - 1, dash, v_length);
    write_chars(x - 6, y + 1, dash, v_length);   
    write_str(x - 3, y, "                 ");
}

void red_field(int x, int y)
{
    change_text_attr(x, y, LightRed, LightRed, 3);
}

void txt(int x, int y)
{
    setlocale(LC_ALL, "ru");
    set_color(Red, Black);
    write_str(x + 4, 25, " »спользуйте стрелки дл€ выбора €чейки на поле противника!");
    write_str(x + 4, 26, " »спользуйте Enter дл€ выстрела!");
}











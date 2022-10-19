#include <iostream>
#include <cstdlib>
#include "ConsoleLib.h"
#include "Graphics.h"
#include <conio.h>
#include <Windows.h>
#include <time.h>
using namespace std;

int main()
{
    srand((unsigned)time(0));
    int xs = 56;
    int ys = 3;
    // сохранения координат
    int x1 = 56;
    int x2 = 60;
    int x3 = 64;
    int x4 = 68;
    int x5 = 72;
    int x6 = 76;
    int x7 = 80;
    int x8 = 84;
    int x9 = 88;
    int x10 = 92;
    int x11 = 6;
    int x12 = 10;
    int x13 = 14;
    int x14 = 18;
    int x15 = 22;
    int x16 = 26;
    int x17 = 30;
    int x18 = 34;
    int x19 = 38;
    int x20 = 42;

    int y1 = 3;
    int y2 = 5;
    int y3 = 7;
    int y4 = 9;
    int y5 = 11;
    int y6 = 13;
    int y7 = 15;
    int y8 = 17;
    int y9 = 19;
    int y10 = 21;


    int xx = 6;
    int yy = 3;
    int x = 2;
    int y = 2;
    const int Esc = 27;
    const int Up = 72;
    const int Left = 75;
    const int Right = 77;
    const int Down = 80;
    const int Spacebar = 32;    
    const int Enter = 13;
    const unsigned char sun = 15;
    const int arr_horisontal[10]{ 56, 60, 64, 68, 72, 76, 80, 84, 88, 92 };
    const int arr_vertical[10]{ 3, 5, 7, 9, 11, 13, 15, 17, 19, 21 };
        
    show_cursor(false);

    // рисуем 1 игровое поле
    set_color(Yellow, Black);
    get_quare1(x, y);

    // рисуем символы для 1 игрового поля
    letter(x, y - 1);

    // рисуем 2 игровое поле
    get_quare2(x, y);

    // рисуем символы для 2 игрового поля
    letter1(x, y - 1);

    // рисуем кнопку для автоматической расстановки кораблей
    button_random(20, 25);

    // рисуем кнопку для ручной расстановки кораблей
    /*button_manually(40, 25);*/

    // рисуем кнопку для автоматической расстановки кораблей
    brown_button1(20, 25);

    // рисуем кнопку старт
    button_start(45, 25);
    
    int key = 0;
    int button = 1;
    int option_x = 0;
    int option_y = 0;
   
    while (true)
    {
        do
        {           
            key = _getch();            
                // вправо 
                if (button == 1 && key == Right)
                {
                   button_start_green(45, 25);
                    button_random(20, 25);
                    button++;
                }
                //// вправо
                //else if (button == 2 && key == Right)
                //{
                //    button_start_green(60, 25);
                //    button_manually(40, 25);
                //    button++;
                //}
                //else if (button == 2 && key == Left)
                //{
                //    button_manually(40, 25);
                //    brown_button1(20, 25);
                //    button--;
                //}
                //влево
                else if (button == 2 && key == Left)
                {
                    button_start(45, 25);
                    brown_button1(20, 25);
                    button--;
                }            
        } while (key != Enter);

        // для запуска по нажатию на 1 кнопку (random) автоматически расставит корабли на первом поле
        if (button == 1)
        {
            do {
                unsigned option = rand() % 3 + 1;
                switch (option)
                {
                case 1: // 1 вариант расстановки автоматически кораблей
                    draw1(x, y);
                    random_ship1(x11, y1);
                    random_ship1(x11, y2);
                    random_ship1(x11, y3);
                    random_ship1(x11, y4);

                    random_ship1(x13, y2);
                    random_ship1(x14, y2);
                    random_ship1(x15, y2);

                    random_ship1(x13, y2);
                    random_ship1(x14, y2);
                    random_ship1(x15, y2);

                    random_ship1(x13, y6);
                    random_ship1(x14, y6);

                    random_ship1(x17, y6);
                    random_ship1(x18, y6);

                    random_ship1(x15, y8);
                    random_ship1(x16, y8);

                    random_ship1(x18, y2);

                    random_ship1(x18, y4);

                    random_ship1(x19, y9);

                    random_ship1(x12, y8);                   
                    break;
                //case 2: // 2 вариант расстановки автоматически кораблей
                //    draw1(x, y);
                //    random_ship2(x, y);
                //    set_color(Yellow, Black);
                //    get_quare1(x, y);
                //    break;
                //case 3:  // 3 вариант расстановки автоматически кораблей
                //    draw1(x, y);
                //    random_ship3(x, y);
                //    set_color(LightMagenta, Black);
                //    get_quare1(x, y);
                //    break;
                }

            } while (key != Enter);

            //автоматически расставляет корабли на 2 поле

            do {
                unsigned option = rand() % 3 + 1;
                switch (option)
                {
                case 1: // 1 вариант расстановки автоматически кораблей              
                    // 4 
                    random_ship1_2(x2, y2);
                    random_ship1_2(x2, y3);
                    random_ship1_2(x2, y4);
                    random_ship1_2(x2, y5);

                    //3-1
                    random_ship1_2(x9, y1);
                    random_ship1_2(x9, y2);
                    random_ship1_2(x9, y3);

                    //3-2
                    random_ship1_2(x8, y10);
                    random_ship1_2(x9, y10);
                    random_ship1_2(x10, y10);

                    //2-1
                    random_ship1_2(x4, y2);
                    random_ship1_2(x4, y3);

                    //2-2
                    random_ship1_2(x7, y6);
                    random_ship1_2(x8, y6);

                    //2-3
                    random_ship1_2(x2, y9);
                    random_ship1_2(x3, y9);

                    //1-1
                    random_ship1_2(x7, y2);

                    //1-2
                    random_ship1_2(x6, y4);

                    //1-3
                    random_ship1_2(x4, y6);

                    //1-4
                    random_ship1_2(x6, y8);
                    break;
                case 2: // 2 вариант расстановки автоматически кораблей   
                    //4
                    random_ship2_2(x1, y10);
                    random_ship2_2(x2, y10);
                    random_ship2_2(x3, y10);
                    random_ship2_2(x4, y10);

                    //3
                    random_ship2_2(x2, y2);
                    random_ship2_2(x3, y2);
                    random_ship2_2(x4, y2);

                    //3
                    random_ship2_2(x7, y5);
                    random_ship2_2(x7, y6);
                    random_ship2_2(x7, y7);

                    //2
                    random_ship2_2(x8, y2);
                    random_ship2_2(x9, y2);

                    //2
                    random_ship2_2(x2, y5);
                    random_ship2_2(x3, y5);

                    //2
                    random_ship2_2(x8, y9);
                    random_ship2_2(x9, y9);

                    //1
                    random_ship2_2(x6, y2);

                    //1
                    random_ship2_2(x9, y4);

                    //1
                    random_ship2_2(x3, y7);

                    //1
                    random_ship2_2(x6, y9);
                    break;
                case 3:  // 3 вариант расстановки автоматически кораблей         
                    //4
                    random_ship3_2(x7, y10);
                    random_ship3_2(x8, y10);
                    random_ship3_2(x9, y10);
                    random_ship3_2(x10, y10);

                    //3
                    random_ship3_2(x1, y10);
                    random_ship3_2(x2, y10);
                    random_ship3_2(x3, y10);

                    //3
                    random_ship3_2(x4, y2);
                    random_ship3_2(x5, y2);
                    random_ship3_2(x6, y2);

                    //2
                    random_ship3_2(x9, y1);
                    random_ship3_2(x10, y1);

                    //2
                    random_ship3_2(x3, y5);
                    random_ship3_2(x4, y5);

                    //2
                    random_ship3_2(x7, y7);
                    random_ship3_2(x8, y7);

                    //1
                    random_ship3_2(x2, y3);

                    //1
                    random_ship3_2(x8, y4);

                    //1
                    random_ship3_2(x1, y1);

                    //1
                    random_ship3_2(x3, y7);
                    break;
                }
            } while (key != Enter);
        }

        // нажатие на кнопку старт
        if(button == 2)
        {

            button_clear(20, 25);            
            button_clear(45, 25);   
            txt(x, y);
           
                //рисуем зеленый квадрат в начальной позиции
            
                change_text_attr(xs, ys, Green, Green, 3);
                do
                {                   
                    key = _getch();
                        switch (key)
                        {
                        case Up:                            
                            change_text_attr(xs, ys - 2, Green, Green, 3);  
                             change_text_attr(xs, ys, Black, Black, 3);
                            ys -= 2;
                            break;

                        case Down:
                            change_text_attr(xs, ys + 2, Green, Green, 3);  
                           change_text_attr(xs, ys, Black, Black, 3);
                            ys += 2;
                            break;

                        case Left:
                            change_text_attr(xs - 4, ys, Green,Green, 3);  
                            change_text_attr(xs, ys, Black, Black, 3);
                            xs -= 4;
                            break;

                        case Right:
                            change_text_attr(xs + 4, ys, Green, Green, 3);   
                           change_text_attr(xs, ys, Black, Black, 3);
                            xs += 4;
                            break;
                        case Enter:    
                                      
                            if (xs == x2 && ys == y2 || xs == x2 && ys == y3 || xs == x2 && ys == y4 || xs == x2 && ys == y5
                             || xs == x9 && ys == y1 || xs == x9 && ys == y2 || xs == x9 && ys == y3 || xs == x4 && ys == y6
                             || xs == x8 && ys == y10 || xs == x9 && ys == y10 || xs == x10 && ys == y10 || xs == x6 && ys == y8
                             || xs == x4 && ys == y2 || xs == x4 && ys == y3 || xs == x7 && ys == y6 || xs == x8 && ys == y6
                             || xs == x2 && ys == y9 || xs == x3 && ys == y9 || xs == x7 && ys == y2 || xs == x6 && ys == y4)
                            { 
                                change_text_attr(xs, ys, LightRed, LightRed, 3);    
                                shot(x, y);
                                _kbhit();
                                key = _getch();                                  
                            }                           
                             else 
                             {
                             change_text_attr(xs, ys, Blue, Blue, 3); 
                             miss(x, y);
                             _kbhit();
                             key = _getch();                             
                             }
                        }                     
                } while (key != Enter);

                 // выбираем рандомно координаты моего игрового поля и проверяем условие
                bool miss_xy = false;
                do
                {    
                    if (x11 && y1 || x11 && y2 || x11 && y3 || x11 && y4
                     || x13 && y2 || x14 && y2 || x15 && y2 || x15 && y8
                     || x13 && y4 || x14 && y4 || x15 && y4 || x12 && y8
                     || x13 && y6 || x14 && y6 || x17 && y6 || x18 && y6
                     || x16 && y8 || x18 && y2 || x18 && y4 || x19 && y9)                        
                    {
                        change_text_attr(xs, ys, LightRed, LightRed, 3);
                        shot(x, y);
                    }
                    else
                        change_text_attr(xs, ys, Blue, Blue, 3);
                        miss(x, y);
                        bool miss_xy = true;

                } while (key != miss_xy);

        } 
    }
}

  /*else if (key == Enter)
                {
                    unsigned option = rand() % 3 + 1;
                    switch (option)
                    { 
                    case 1:
                        if (   x2 == arr_horisontal[option_x] && y2 == arr_vertical[option_y]
                            || x2 == arr_horisontal[option_x] && y3 == arr_vertical[option_y]
                            || x2 == arr_horisontal[option_x] && y4 == arr_vertical[option_y]
                            || x2 == arr_horisontal[option_x] && y5 == arr_vertical[option_y]                          
                            || x9 == arr_horisontal[option_x] && y1 == arr_vertical[option_y]
                            || x9 == arr_horisontal[option_x] && y2 == arr_vertical[option_y]
                            || x9 == arr_horisontal[option_x] && y3 == arr_vertical[option_y]                          
                            || x8 == arr_horisontal[option_x] && y10 == arr_vertical[option_y]
                            || x9 == arr_horisontal[option_x] && y10 == arr_vertical[option_y]
                            || x10 == arr_horisontal[option_x] && y10 == arr_vertical[option_y]                           
                            || x4 == arr_horisontal[option_x] && y2 == arr_vertical[option_y]
                            || x4 == arr_horisontal[option_x] && y3 == arr_vertical[option_y]                            
                            || x7 == arr_horisontal[option_x] && y6 == arr_vertical[option_y]
                            || x8 == arr_horisontal[option_x] && y6 == arr_vertical[option_y]                           
                            || x2 == arr_horisontal[option_x] && y9 == arr_vertical[option_y]
                            || x3 == arr_horisontal[option_x] && y9 == arr_vertical[option_y]                           
                            || x7 == arr_horisontal[option_x] && y2 == arr_vertical[option_y]                           
                            || x6 == arr_horisontal[option_x] && y4 == arr_vertical[option_y]                           
                            || x4 == arr_horisontal[option_x] && y6 == arr_vertical[option_y]                           
                            || x6 == arr_horisontal[option_x] && y8 == arr_vertical[option_y])
                        {
                            shot(arr_horisontal[option_x], arr_vertical[option_y]);
                        }*/
                       /* else if (x2 == arr_horisontal[option_x] && y3 == arr_vertical[option_y])
                            shot(arr_horisontal[option_x], arr_vertical[option_y]);
                        else if (x2 == arr_horisontal[option_x] && y4 == arr_vertical[option_y])
                        ///*    shot(arr_horisontal[option_x], arr_vertical[option_y]);*/
                        //else
                        //    miss(arr_horisontal[option_x], arr_vertical[option_y]);
                        //break;*/

                       

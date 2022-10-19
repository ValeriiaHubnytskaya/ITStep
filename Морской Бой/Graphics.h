#ifndef __GRAPHICS_H__
#define __GRAPHICS_H__

//рисуем поле 1
void get_quare1(int x, int y);

// рисуем символы для 1 игрового поля
void letter(int x, int y);

// рисуем поле 2
void get_quare2(int x, int y);

// рисуем символы для 2 игрового поля
void letter1(int x, int y);

// рисуем кнопку автоматической расстановки кораблей
int button_random(int x, int y);

// рисуем кнопку ручной расстановки кораблей
int button_manually(int x, int y);

// Красная рамка вокруг кнопки
int brown_button1(int x, int y);

// Зеленая рамка вокруг кнопки (если выбрал пользователь)
int brown_button2(int x, int y);

// кнопка старт
int button_start(int x, int y);

// кнопка старт зеленая
int button_start_green(int x, int y);

// первый вариант расстановки автоматически кораблей на 1 поле
void random_ship1(int x, int y);

// 2 вариант расстановки автоматически кораблей на 1 поле
  void random_ship2(int x, int y);

  // 3 вариант расстановки автоматически кораблей 1 поле
  void random_ship3(int x, int y);

  // первый вариант расстановки автоматически кораблей на 2 поле
  void random_ship1_2(int x, int y);

  // 2 вариант расстановки автоматически кораблей на 2 поле
  void random_ship2_2(int x, int y);

  // 3 вариант расстановки автоматически кораблей 2 поле
  void random_ship3_2(int x, int y);

  // закрашивает поля после вариации с кораблями 1 
  void draw1(int x, int y);

  //  выбор пользователя ячейки для стрельбы
  void draw_green_square(int x, int y);

  // черная для закрашивания ячейки
  void draw_black_square(int x, int y);

  // выстрел
  void shot(int x, int y);

  // мимо
  void miss(int x, int y);

  // затираем нижние кнопки
  void button_clear(int x, int y);

  void red_field(int x, int y);

  void txt(int x, int y);

#endif
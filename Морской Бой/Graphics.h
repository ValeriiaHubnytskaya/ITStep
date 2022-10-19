#ifndef __GRAPHICS_H__
#define __GRAPHICS_H__

//������ ���� 1
void get_quare1(int x, int y);

// ������ ������� ��� 1 �������� ����
void letter(int x, int y);

// ������ ���� 2
void get_quare2(int x, int y);

// ������ ������� ��� 2 �������� ����
void letter1(int x, int y);

// ������ ������ �������������� ����������� ��������
int button_random(int x, int y);

// ������ ������ ������ ����������� ��������
int button_manually(int x, int y);

// ������� ����� ������ ������
int brown_button1(int x, int y);

// ������� ����� ������ ������ (���� ������ ������������)
int brown_button2(int x, int y);

// ������ �����
int button_start(int x, int y);

// ������ ����� �������
int button_start_green(int x, int y);

// ������ ������� ����������� ������������� �������� �� 1 ����
void random_ship1(int x, int y);

// 2 ������� ����������� ������������� �������� �� 1 ����
  void random_ship2(int x, int y);

  // 3 ������� ����������� ������������� �������� 1 ����
  void random_ship3(int x, int y);

  // ������ ������� ����������� ������������� �������� �� 2 ����
  void random_ship1_2(int x, int y);

  // 2 ������� ����������� ������������� �������� �� 2 ����
  void random_ship2_2(int x, int y);

  // 3 ������� ����������� ������������� �������� 2 ����
  void random_ship3_2(int x, int y);

  // ����������� ���� ����� �������� � ��������� 1 
  void draw1(int x, int y);

  //  ����� ������������ ������ ��� ��������
  void draw_green_square(int x, int y);

  // ������ ��� ������������ ������
  void draw_black_square(int x, int y);

  // �������
  void shot(int x, int y);

  // ����
  void miss(int x, int y);

  // �������� ������ ������
  void button_clear(int x, int y);

  void red_field(int x, int y);

  void txt(int x, int y);

#endif